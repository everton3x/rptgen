<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 1 - Balanço Orçamentário - Quadro da Despesa Intra-Orçamentária
 *
 * @author Everton
 */
final class A1BODespesaIntra extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A1 BO Despesa Intra', $con, $spreadsheet, $remessa);
    }

    public function run(): void {
        printf("\t-> gerando planilha %s" . PHP_EOL, $this->sheetName);

        $sheet = $this->spreadsheet->setActiveSheetIndexByName($this->sheetName);

        foreach ($this->getCellMap() as $cellAddress => $cellValue) {
            $sheet->setCellValue($cellAddress, $cellValue);
        }
    }

    protected function getCellMap(): array {
        return [           
            'C14' => $this->dotacaoInicial('3191%'),
            'C15' => $this->dotacaoInicial('3291%'),
            'C16' => $this->dotacaoInicial('3391%'),
            'C18' => $this->dotacaoInicial('4491%'),
            'C19' => $this->dotacaoInicial('4591%'),
            'C20' => $this->dotacaoInicial('4691%'),
            
            'D14' => $this->dotacaoAtualizada('3191%'),
            'D15' => $this->dotacaoAtualizada('3291%'),
            'D16' => $this->dotacaoAtualizada('3391%'),
            'D18' => $this->dotacaoAtualizada('4491%'),
            'D19' => $this->dotacaoAtualizada('4591%'),
            'D20' => $this->dotacaoAtualizada('4691%'),
            
            'E14' => $this->empenhadoNoBimestre('3191%'),
            'E15' => $this->empenhadoNoBimestre('3291%'),
            'E16' => $this->empenhadoNoBimestre('3391%'),
            'E18' => $this->empenhadoNoBimestre('4491%'),
            'E19' => $this->empenhadoNoBimestre('4591%'),
            'E20' => $this->empenhadoNoBimestre('4691%'),
            
            'F14' => $this->empenhadoAteBimestre('3191%'),
            'F15' => $this->empenhadoAteBimestre('3291%'),
            'F16' => $this->empenhadoAteBimestre('3391%'),
            'F18' => $this->empenhadoAteBimestre('4491%'),
            'F19' => $this->empenhadoAteBimestre('4591%'),
            'F20' => $this->empenhadoAteBimestre('4691%'),
            
            'H14' => $this->liquidadoNoBimestre('3191%'),
            'H15' => $this->liquidadoNoBimestre('3291%'),
            'H16' => $this->liquidadoNoBimestre('3391%'),
            'H18' => $this->liquidadoNoBimestre('4491%'),
            'H19' => $this->liquidadoNoBimestre('4591%'),
            'H20' => $this->liquidadoNoBimestre('4691%'),
            
            'I14' => $this->liquidadoAteBimestre('3191%'),
            'I15' => $this->liquidadoAteBimestre('3291%'),
            'I16' => $this->liquidadoAteBimestre('3391%'),
            'I18' => $this->liquidadoAteBimestre('4491%'),
            'I19' => $this->liquidadoAteBimestre('4591%'),
            'I20' => $this->liquidadoAteBimestre('4691%'),
            
            'K14' => $this->pagoAteBimestre('3191%'),
            'K15' => $this->pagoAteBimestre('3291%'),
            'K16' => $this->pagoAteBimestre('3391%'),
            'K18' => $this->pagoAteBimestre('4491%'),
            'K19' => $this->pagoAteBimestre('4591%'),
            'K20' => $this->pagoAteBimestre('4691%'),
        ];
    }
    
    private function pagoAteBimestre(string $ndo): float {
        $sql = "SELECT SUM(VALOR_PAGO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoAteBimestre(string $ndo): float {
        $sql = "SELECT SUM(VALOR_LIQUIDADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    
    private function liquidadoNoBimestre(string $ndo): float {
        $ano = substr($this->remessa, 0, 4);
        $data_inicial = $this->getDataInicialBimestre()->format('Y-m-d');
        $data_final = $this->dataBase->format('Y-m-d');
        
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ANO_EMPENHO = %d
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoAteBimestre(string $ndo): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function getDataInicialBimestre(): \DateTime {
        $ano = substr($this->remessa, 0, 4);
        $mes_final = substr($this->remessa, 4, 2);
        $mes_inicial = $mes_final - 1;
        if($mes_inicial < 1){
            $mes_inicial = '01';//para evitar erro fatal ao usar a remessa AAAA01
        }else{
            $mes_inicial = str_pad($mes_inicial, 2, '0', STR_PAD_LEFT);//necessário porque quando subtrai 1 do mês final, trasnforma em int.
        }
        return date_create_from_format('Ymd', sprintf('%s%s%s', $ano, $mes_inicial, '01'));
    }
    
    private function empenhadoNoBimestre(string $ndo): float {
        $ano = substr($this->remessa, 0, 4);
        $data_inicial = $this->getDataInicialBimestre()->format('Y-m-d');
        $data_final = $this->dataBase->format('Y-m-d');
        
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                FROM PAD.EMPENHO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ANO_EMPENHO = %d
                        AND DATA_EMPENHO BETWEEN '%s' AND '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function dotacaoInicial(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizada(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
}
