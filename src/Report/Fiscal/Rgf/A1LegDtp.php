<?php

namespace RptGen\Report\Fiscal\Rgf;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RFG Legislativo, Anexo 1 - Despesa Total com Pessoal
 *
 * @author Everton
 */
final class A1LegDtp extends RgfBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RGF A1 Leg', $con, $spreadsheet, $remessa);
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
            'C15' => $this->getMesBase(11)->format('m/Y'),
            'D15' => $this->getMesBase(10)->format('m/Y'),
            'E15' => $this->getMesBase(9)->format('m/Y'),
            'F15' => $this->getMesBase(8)->format('m/Y'),
            'G15' => $this->getMesBase(7)->format('m/Y'),
            'H15' => $this->getMesBase(6)->format('m/Y'),
            'I15' => $this->getMesBase(5)->format('m/Y'),
            'J15' => $this->getMesBase(4)->format('m/Y'),
            'K15' => $this->getMesBase(3)->format('m/Y'),
            'L15' => $this->getMesBase(2)->format('m/Y'),
            'M15' => $this->getMesBase(1)->format('m/Y'),
            'N15' => $this->getMesBase(0)->format('m/Y'),
            
            'C18' => $this->ativosVencimentos(11),
            'D18' => $this->ativosVencimentos(10),
            'E18' => $this->ativosVencimentos(9),
            'F18' => $this->ativosVencimentos(8),
            'G18' => $this->ativosVencimentos(7),
            'H18' => $this->ativosVencimentos(6),
            'I18' => $this->ativosVencimentos(5),
            'J18' => $this->ativosVencimentos(4),
            'K18' => $this->ativosVencimentos(3),
            'L18' => $this->ativosVencimentos(2),
            'M18' => $this->ativosVencimentos(1),
            'N18' => $this->ativosVencimentos(0),
            
            'C19' => $this->ativosObrigacoesPatronais(11),
            'D19' => $this->ativosObrigacoesPatronais(10),
            'E19' => $this->ativosObrigacoesPatronais(9),
            'F19' => $this->ativosObrigacoesPatronais(8),
            'G19' => $this->ativosObrigacoesPatronais(7),
            'H19' => $this->ativosObrigacoesPatronais(6),
            'I19' => $this->ativosObrigacoesPatronais(5),
            'J19' => $this->ativosObrigacoesPatronais(4),
            'K19' => $this->ativosObrigacoesPatronais(3),
            'L19' => $this->ativosObrigacoesPatronais(2),
            'M19' => $this->ativosObrigacoesPatronais(1),
            'N19' => $this->ativosObrigacoesPatronais(0),
            
            'C21' => $this->aposentadorias(11),
            'D21' => $this->aposentadorias(10),
            'E21' => $this->aposentadorias(9),
            'F21' => $this->aposentadorias(8),
            'G21' => $this->aposentadorias(7),
            'H21' => $this->aposentadorias(6),
            'I21' => $this->aposentadorias(5),
            'J21' => $this->aposentadorias(4),
            'K21' => $this->aposentadorias(3),
            'L21' => $this->aposentadorias(2),
            'M21' => $this->aposentadorias(1),
            'N21' => $this->aposentadorias(0),
            
            'C22' => $this->pensoes(11),
            'D22' => $this->pensoes(10),
            'E22' => $this->pensoes(9),
            'F22' => $this->pensoes(8),
            'G22' => $this->pensoes(7),
            'H22' => $this->pensoes(6),
            'I22' => $this->pensoes(5),
            'J22' => $this->pensoes(4),
            'K22' => $this->pensoes(3),
            'L22' => $this->pensoes(2),
            'M22' => $this->pensoes(1),
            'N22' => $this->pensoes(0),
            
            'C23' => $this->terceirizacao(11),
            'D23' => $this->terceirizacao(10),
            'E23' => $this->terceirizacao(9),
            'F23' => $this->terceirizacao(8),
            'G23' => $this->terceirizacao(7),
            'H23' => $this->terceirizacao(6),
            'I23' => $this->terceirizacao(5),
            'J23' => $this->terceirizacao(4),
            'K23' => $this->terceirizacao(3),
            'L23' => $this->terceirizacao(2),
            'M23' => $this->terceirizacao(1),
            'N23' => $this->terceirizacao(0),
            
            'C24' => $this->outrasNaoOrcamentarias(11),
            'D24' => $this->outrasNaoOrcamentarias(10),
            'E24' => $this->outrasNaoOrcamentarias(9),
            'F24' => $this->outrasNaoOrcamentarias(8),
            'G24' => $this->outrasNaoOrcamentarias(7),
            'H24' => $this->outrasNaoOrcamentarias(6),
            'I24' => $this->outrasNaoOrcamentarias(5),
            'J24' => $this->outrasNaoOrcamentarias(4),
            'K24' => $this->outrasNaoOrcamentarias(3),
            'L24' => $this->outrasNaoOrcamentarias(2),
            'M24' => $this->outrasNaoOrcamentarias(1),
            'N24' => $this->outrasNaoOrcamentarias(0),
            
            'C26' => $this->deducaoDemissao(11),
            'D26' => $this->deducaoDemissao(10),
            'E26' => $this->deducaoDemissao(9),
            'F26' => $this->deducaoDemissao(8),
            'G26' => $this->deducaoDemissao(7),
            'H26' => $this->deducaoDemissao(6),
            'I26' => $this->deducaoDemissao(5),
            'J26' => $this->deducaoDemissao(4),
            'K26' => $this->deducaoDemissao(3),
            'L26' => $this->deducaoDemissao(2),
            'M26' => $this->deducaoDemissao(1),
            'N26' => $this->deducaoDemissao(0),
            
            'C27' => $this->deducaoJudicial(11),
            'D27' => $this->deducaoJudicial(10),
            'E27' => $this->deducaoJudicial(9),
            'F27' => $this->deducaoJudicial(8),
            'G27' => $this->deducaoJudicial(7),
            'H27' => $this->deducaoJudicial(6),
            'I27' => $this->deducaoJudicial(5),
            'J27' => $this->deducaoJudicial(4),
            'K27' => $this->deducaoJudicial(3),
            'L27' => $this->deducaoJudicial(2),
            'M27' => $this->deducaoJudicial(1),
            'N27' => $this->deducaoJudicial(0),
            
            'C28' => $this->deducaoExercicioAnterior(11),
            'D28' => $this->deducaoExercicioAnterior(10),
            'E28' => $this->deducaoExercicioAnterior(9),
            'F28' => $this->deducaoExercicioAnterior(8),
            'G28' => $this->deducaoExercicioAnterior(7),
            'H28' => $this->deducaoExercicioAnterior(6),
            'I28' => $this->deducaoExercicioAnterior(5),
            'J28' => $this->deducaoExercicioAnterior(4),
            'K28' => $this->deducaoExercicioAnterior(3),
            'L28' => $this->deducaoExercicioAnterior(2),
            'M28' => $this->deducaoExercicioAnterior(1),
            'N28' => $this->deducaoExercicioAnterior(0),
            
            'C29' => $this->deducaoInativos(11),
            'D29' => $this->deducaoInativos(10),
            'E29' => $this->deducaoInativos(9),
            'F29' => $this->deducaoInativos(8),
            'G29' => $this->deducaoInativos(7),
            'H29' => $this->deducaoInativos(6),
            'I29' => $this->deducaoInativos(5),
            'J29' => $this->deducaoInativos(4),
            'K29' => $this->deducaoInativos(3),
            'L29' => $this->deducaoInativos(2),
            'M29' => $this->deducaoInativos(1),
            'N29' => $this->deducaoInativos(0),
            
//            'C30' => $this->deducaoAcsAce(11),
//            'D30' => $this->deducaoAcsAce(10),
//            'E30' => $this->deducaoAcsAce(9),
//            'F30' => $this->deducaoAcsAce(8),
//            'G30' => $this->deducaoAcsAce(7),
//            'H30' => $this->deducaoAcsAce(6),
//            'I30' => $this->deducaoAcsAce(5),
//            'J30' => $this->deducaoAcsAce(4),
//            'K30' => $this->deducaoAcsAce(3),
//            'L30' => $this->deducaoAcsAce(2),
//            'M30' => $this->deducaoAcsAce(1),
//            'N30' => $this->deducaoAcsAce(0),
//            
//            'C31' => $this->deducaoEnfermagem(11),
//            'D31' => $this->deducaoEnfermagem(10),
//            'E31' => $this->deducaoEnfermagem(9),
//            'F31' => $this->deducaoEnfermagem(8),
//            'G31' => $this->deducaoEnfermagem(7),
//            'H31' => $this->deducaoEnfermagem(6),
//            'I31' => $this->deducaoEnfermagem(5),
//            'J31' => $this->deducaoEnfermagem(4),
//            'K31' => $this->deducaoEnfermagem(3),
//            'L31' => $this->deducaoEnfermagem(2),
//            'M31' => $this->deducaoEnfermagem(1),
//            'N31' => $this->deducaoEnfermagem(0),
//            
//            'C32' => $this->deducaoOutras(11),
//            'D32' => $this->deducaoOutras(10),
//            'E32' => $this->deducaoOutras(9),
//            'F32' => $this->deducaoOutras(8),
//            'G32' => $this->deducaoOutras(7),
//            'H32' => $this->deducaoOutras(6),
//            'I32' => $this->deducaoOutras(5),
//            'J32' => $this->deducaoOutras(4),
//            'K32' => $this->deducaoOutras(3),
//            'L32' => $this->deducaoOutras(2),
//            'M32' => $this->deducaoOutras(1),
//            'N32' => $this->deducaoOutras(0),
            
            'P18' => 0.0,
            'P19' => 0.0,
            'P21' => 0.0,
            'P22' => 0.0,
            'P23' => 0.0,
            'P24' => 0.0,
            'P26' => 0.0,
            'P27' => 0.0,
            'P28' => 0.0,
            'P29' => 0.0,
//            'P30' => 0.0,
//            'P31' => 0.0,
//            'P32' => 0.0,
        ];
    }
    
    private function deducaoOutras(int $posicao): float {
        return 0.0;
    }
    
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
    
    private function deducaoInativos(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'fpsm'
                        AND FONTE_RECURSO IN (800, 801, 802, 803)
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1121
                        AND (
                            RUBRICA LIKE '319001%%'
                            OR RUBRICA LIKE '319003%%'
                            OR RUBRICA LIKE '3191131201%%'
                            OR RUBRICA LIKE '3191132101%%'
                            OR RUBRICA LIKE '3191131202%%'
                            OR RUBRICA LIKE '3191132102%%'
                        )"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function deducaoExercicioAnterior(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'cm'
                        AND RUBRICA LIKE '31__92%%'"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function deducaoJudicial(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'cm'
                        AND RUBRICA LIKE '319091%%'"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function deducaoDemissao(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'cm'
                        AND RUBRICA LIKE '319094%%'"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function outrasNaoOrcamentarias(int $posicao): float {
        return 0.0;
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
    }
    
    private function terceirizacao(int $posicao): float {
        return 0.0;
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
    }
    
    private function pensoes(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'fpsm'
                        AND (
                            RUBRICA LIKE '319003%%'
                            OR RUBRICA LIKE '3191131202%%'
                            OR RUBRICA LIKE '3191132102%%'
                        )
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1121"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function aposentadorias(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'fpsm'
                        AND (
                            RUBRICA LIKE '319001%%'
                            OR RUBRICA LIKE '3191131201%%'
                            OR RUBRICA LIKE '3191132101%%'
                        )
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1121"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function ativosObrigacoesPatronais(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'cm'
                        AND (
                            RUBRICA LIKE '319013%%'
                            OR RUBRICA LIKE '31911308%%'
                            OR RUBRICA LIKE '31911320%%'
                        )"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function ativosVencimentos(int $posicao): float {
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND ENTIDADE LIKE 'cm'
                        AND (
                            RUBRICA LIKE '319004%%'
                            OR RUBRICA LIKE '319008%%'
                            OR RUBRICA LIKE '319011%%'
                            OR RUBRICA LIKE '319016%%'
                            OR RUBRICA LIKE '31909101%%'
                            OR RUBRICA LIKE '31909108%%'
                            OR RUBRICA LIKE '31909126%%'
                            OR RUBRICA LIKE '31909401%%'
                        )"
        ;
        $dt1 = $this->getMesBase($posicao);
        $dt2 = clone $dt1;
        $dt2->modify('first day of this month');
        $remessa = $this->getRemessa($dt1);
        $query = sprintf($sql, $remessa, $dt2->format('Y-m-d'), $dt1->format('Y-m-d'));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
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
