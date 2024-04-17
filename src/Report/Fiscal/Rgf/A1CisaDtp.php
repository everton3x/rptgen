<?php

namespace RptGen\Report\Fiscal\Rgf;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RFG Executivo, Anexo 1 - Despesa Total com Pessoal - CISA
 *
 * @author Everton
 */
final class A1CisaDtp extends RgfBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RGF A1 CISA', $con, $spreadsheet, $remessa);
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
            'C18' => $this->transferidoPorNdo('317170%'),
            'C19' => 0.0,
            'C21' => 0.0,
            'C22' => 0.0,
            'C23' => 0.0,
            'C24' => 0.0,
            
            'D18' => round($this->liquidadoPorNdo('319004%') + $this->liquidadoPorNdo('319011%')+$this->liquidadoPorNdo('319016%'), 2),
            'D19' => $this->liquidadoPorNdo('319013%'),
        ];
    }
    
    private function liquidadoPorNdo(string $ndo): float {
        $sql = "SELECT SUM(LIQUIDADO)::decimal
                FROM CONSORCIO.DESPESAS
                WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND CONSORCIO LIKE 'CISA'
                    AND NDO LIKE '%s'"
        ;
        $dt1 = $this->dataBase;
        $dt2 = clone $dt1;
        $dt2->modify('first day of -11 month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'), $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);        
    }
    
    private function transferidoPorNdo(string $ndo): float {
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND ENTIDADE IN ('pm', 'fpsm')
                        AND CREDOR = 8283
                        AND RUBRICA LIKE '%s'"
        ;
        $dt1 = $this->dataBase;
        $dt2 = clone $dt1;
        $dt2->modify('first day of -11 month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'), $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);        
    }
    
//    private function deducaoOutras(int $posicao): float {
//        return 0.0;
//    }
//    
//    private function deducaoEnfermagem(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND FONTE_RECURSO = 605
//                        AND RUBRICA LIKE '31%%'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function deducaoAcsAce(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND FONTE_RECURSO = 604
//                        AND RUBRICA LIKE '31%%'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function deducaoInativos(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND FONTE_RECURSO IN (800, 801, 802, 803)
//                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1111
//                        AND (
//                            RUBRICA LIKE '319001%%'
//                            OR RUBRICA LIKE '319003%%'
//                            OR RUBRICA LIKE '3191131201%%'
//                            OR RUBRICA LIKE '3191132101%%'
//                            OR RUBRICA LIKE '3191131202%%'
//                            OR RUBRICA LIKE '3191132102%%'
//                        )"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function deducaoExercicioAnterior(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND RUBRICA LIKE '31__92%%'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function deducaoJudicial(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND RUBRICA LIKE '319091%%'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function deducaoDemissao(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND RUBRICA LIKE '319094%%'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function outrasNaoOrcamentarias(int $posicao): float {
//        $sql = "SELECT SUM(LIQUIDADO)::decimal
//                FROM CONSORCIO.DESPESAS
//                WHERE NDO LIKE '31%%'
//                    AND DATA_BASE BETWEEN '%s' AND '%s'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $query = sprintf($sql, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function terceirizacao(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND RUBRICA LIKE '33__34%%'"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//        
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO L
//                INNER JOIN TMP.DTP_EMPENHOS_TERCEIRIZACAO E ON L.ANO_EMPENHO = E.ANO
//                AND L.NR_EMPENHO = E.EMPENHO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
//        ;
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        $vl2 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//        
//        return (float) round($vl1 + $vl2, 2);
//    }
//    
//    private function pensoes(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND (
//                            RUBRICA LIKE '319003%%'
//                            OR RUBRICA LIKE '3191131202%%'
//                            OR RUBRICA LIKE '3191132102%%'
//                        )
//                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1111"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function aposentadorias(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND (
//                            RUBRICA LIKE '319001%%'
//                            OR RUBRICA LIKE '3191131201%%'
//                            OR RUBRICA LIKE '3191132101%%'
//                        )
//                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1111"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function ativosObrigacoesPatronais(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND (
//                            RUBRICA LIKE '319013%%'
//                            OR RUBRICA LIKE '31911308%%'
//                            OR RUBRICA LIKE '31911320%%'
//                        )"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//    
//    private function ativosVencimentos(int $posicao): float {
//        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
//                FROM PAD.LIQUIDACAO
//                WHERE REMESSA = %s
//                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
//                        AND ENTIDADE IN ('pm', 'fpsm')
//                        AND (
//                            RUBRICA LIKE '319004%%'
//                            OR RUBRICA LIKE '319008%%'
//                            OR RUBRICA LIKE '319011%%'
//                            OR RUBRICA LIKE '319016%%'
//                            OR RUBRICA LIKE '31909101%%'
//                            OR RUBRICA LIKE '31909108%%'
//                            OR RUBRICA LIKE '31909126%%'
//                            OR RUBRICA LIKE '31909401%%'
//                        )"
//        ;
//        $dt1 = $this->getMesBase($posicao);
//        $dt2 = clone $dt1;
//        $dt2->modify('first day of this month');
//        $remessa = $this->getRemessa($dt1);
//        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
    
    private function getMesBase(int $posicao): DateTime {
        if ($posicao === 0) return $this->dataBase;
        $dt = clone $this->dataBase;
        for($i = 1; $i <= $posicao; $i++){
            $dt->modify('last day of previous month');
        }
        
        return $dt;
    }
    
    private function getRemessa(\DateTime $dt): int {
        $ano = $dt->format('Y');
        if($ano != $this->dataBase->format('Y')) {
            $mes = 12;
        }else{
            $mes = $this->dataBase->format('m');
        }
        return (int) sprintf('%s%s', $ano, str_pad($mes, 2, '0', STR_PAD_LEFT));
    }
}
