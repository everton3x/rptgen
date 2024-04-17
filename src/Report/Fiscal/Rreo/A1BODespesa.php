<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 1 - Balanço Orçamentário - Quadro da Despesa
 *
 * @author Everton
 */
final class A1BODespesa extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A1 BO Despesa', $con, $spreadsheet, $remessa);
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
            'C14' => $this->dotacaoInicial('31%'),
            'C15' => $this->dotacaoInicial('32%'),
            'C16' => $this->dotacaoInicial('33%'),
            'C18' => $this->dotacaoInicial('44%'),
            'C19' => $this->dotacaoInicial('45%'),
            'C20' => $this->dotacaoInicial('46%'),
            'C21' => $this->dotacaoInicialReservaContingencia(),
            'C34' => $this->dotacaoInicialReservaRpps(),
            
            'D14' => $this->dotacaoAtualizada('31%'),
            'D15' => $this->dotacaoAtualizada('32%'),
            'D16' => $this->dotacaoAtualizada('33%'),
            'D18' => $this->dotacaoAtualizada('44%'),
            'D19' => $this->dotacaoAtualizada('45%'),
            'D20' => $this->dotacaoAtualizada('46%'),
            'D21' => $this->dotacaoAtualizadaReservaContingencia(),
            'D34' => $this->dotacaoAtualizadaReservaRpps(),
            
            'E14' => $this->empenhadoNoBimestre('31%'),
            'E15' => $this->empenhadoNoBimestre('32%'),
            'E16' => $this->empenhadoNoBimestre('33%'),
            'E18' => $this->empenhadoNoBimestre('44%'),
            'E19' => $this->empenhadoNoBimestre('45%'),
            'E20' => $this->empenhadoNoBimestre('46%'),
            
            'F14' => $this->empenhadoAteBimestre('31%'),
            'F15' => $this->empenhadoAteBimestre('32%'),
            'F16' => $this->empenhadoAteBimestre('33%'),
            'F18' => $this->empenhadoAteBimestre('44%'),
            'F19' => $this->empenhadoAteBimestre('45%'),
            'F20' => $this->empenhadoAteBimestre('46%'),
            
            'H14' => $this->liquidadoNoBimestre('31%'),
            'H15' => $this->liquidadoNoBimestre('32%'),
            'H16' => $this->liquidadoNoBimestre('33%'),
            'H18' => $this->liquidadoNoBimestre('44%'),
            'H19' => $this->liquidadoNoBimestre('45%'),
            'H20' => $this->liquidadoNoBimestre('46%'),
            
            'I14' => $this->liquidadoAteBimestre('31%'),
            'I15' => $this->liquidadoAteBimestre('32%'),
            'I16' => $this->liquidadoAteBimestre('33%'),
            'I18' => $this->liquidadoAteBimestre('44%'),
            'I19' => $this->liquidadoAteBimestre('45%'),
            'I20' => $this->liquidadoAteBimestre('46%'),
            
            'K14' => $this->pagoAteBimestre('31%'),
            'K15' => $this->pagoAteBimestre('32%'),
            'K16' => $this->pagoAteBimestre('33%'),
            'K18' => $this->pagoAteBimestre('44%'),
            'K19' => $this->pagoAteBimestre('45%'),
            'K20' => $this->pagoAteBimestre('46%'),
        ];
    }
    
    private function pagoAteBimestre(string $ndo): float {
        $sql = "SELECT SUM(VALOR_PAGO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoAteBimestre(string $ndo): float {
        $sql = "SELECT SUM(VALOR_LIQUIDADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%');
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
                        AND RUBRICA NOT LIKE '%s'
                        AND ANO_EMPENHO = %d
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%', $ano, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoAteBimestre(string $ndo): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%');
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
                        AND RUBRICA NOT LIKE '%s'
                        AND ANO_EMPENHO = %d
                        AND DATA_EMPENHO BETWEEN '%s' AND '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%', $ano, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function dotacaoInicial(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizada(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '__91%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoInicialReservaContingencia(): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND FUNCAO = 99
                        AND SUBFUNCAO = 999"
        ;
        $query = sprintf($sql, $this->remessa, '9%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaReservaContingencia(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND FUNCAO = 99
                        AND SUBFUNCAO = 999"
        ;
        $query = sprintf($sql, $this->remessa, '9%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoInicialReservaRpps(): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND FUNCAO = 99
                        AND SUBFUNCAO = 997"
        ;
        $query = sprintf($sql, $this->remessa, '9%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaReservaRpps(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND FUNCAO = 99
                        AND SUBFUNCAO = 997"
        ;
        $query = sprintf($sql, $this->remessa, '9%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
}
