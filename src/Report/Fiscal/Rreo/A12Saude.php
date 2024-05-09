<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 12 - Saúde
 *
 * @author Everton
 */
final class A12Saude extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A12', $con, $spreadsheet, $remessa);
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
            'I13' => $this->previsaoInicialReceita('111250%'),
            'I14' => $this->previsaoInicialReceita('111253%'),
            'I15' => $this->previsaoInicialReceita('111451%'),
            'I16' => $this->previsaoInicialReceita('111303%'),
            'I18' => $this->previsaoInicialReceita('1711511%'),
            'I19' => $this->previsaoInicialReceita('171152%'),
            'I20' => $this->previsaoInicialReceita('172151%'),
            'I21' => $this->previsaoInicialReceita('172150%'),
            'I22' => $this->previsaoInicialReceita('172152%'),
            'I23' => $this->previsaoInicialReceita('172953%'),
            
            'J13' => $this->previsaoAtualizadaReceita('111250%'),
            'J14' => $this->previsaoAtualizadaReceita('111253%'),
            'J15' => $this->previsaoAtualizadaReceita('111451%'),
            'J16' => $this->previsaoAtualizadaReceita('111303%'),
            'J18' => $this->previsaoAtualizadaReceita('1711511%'),
            'J19' => $this->previsaoAtualizadaReceita('171152%'),
            'J20' => $this->previsaoAtualizadaReceita('172151%'),
            'J21' => $this->previsaoAtualizadaReceita('172150%'),
            'J22' => $this->previsaoAtualizadaReceita('172152%'),
            'J23' => $this->previsaoAtualizadaReceita('172953%'),
            
            'K13' => $this->arrecadacaoReceita('111250%'),
            'K14' => $this->arrecadacaoReceita('111253%'),
            'K15' => $this->arrecadacaoReceita('111451%'),
            'K16' => $this->arrecadacaoReceita('111303%'),
            'K18' => $this->arrecadacaoReceita('1711511%'),
            'K19' => $this->arrecadacaoReceita('171152%'),
            'K20' => $this->arrecadacaoReceita('172151%'),
            'K21' => $this->arrecadacaoReceita('172150%'),
            'K22' => $this->arrecadacaoReceita('172152%'),
            'K23' => $this->arrecadacaoReceita('172953%'),
            
            'D30' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(301, '3%'),
            'D31' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(301, '4%'),
            'D33' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(302, '3%'),
            'D34' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(302, '4%'),
            'D36' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(303, '3%'),
            'D37' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(303, '4%'),
            'D39' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(304, '3%'),
            'D40' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(304, '4%'),
            'D42' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(305, '3%'),
            'D43' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(305, '4%'),
            'D45' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(306, '3%'),
            'D46' => $this->dotacaoInicialASPSPorSubfuncaoEDespesa(306, '4%'),
            'D48' => $this->dotacaoInicialASPSOutrasSubfuncaoEDespesa('3%'),
            'D49' => $this->dotacaoInicialASPSOutrasSubfuncaoEDespesa('4%'),
            
            'E30' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(301, '3%'),
            'E31' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(301, '4%'),
            'E33' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(302, '3%'),
            'E34' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(302, '4%'),
            'E36' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(303, '3%'),
            'E37' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(303, '4%'),
            'E39' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(304, '3%'),
            'E40' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(304, '4%'),
            'E42' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(305, '3%'),
            'E43' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(305, '4%'),
            'E45' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(306, '3%'),
            'E46' => $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa(306, '4%'),
            'E48' => $this->dotacaoAtualizadaASPSOutrasSubfuncaoEDespesa('3%'),
            'E49' => $this->dotacaoAtualizadaASPSOutrasSubfuncaoEDespesa('4%'),
            
            'F30' => $this->empenhadoASPSPorSubfuncaoEDespesa(301, '3%'),
            'F31' => $this->empenhadoASPSPorSubfuncaoEDespesa(301, '4%'),
            'F33' => $this->empenhadoASPSPorSubfuncaoEDespesa(302, '3%'),
            'F34' => $this->empenhadoASPSPorSubfuncaoEDespesa(302, '4%'),
            'F36' => $this->empenhadoASPSPorSubfuncaoEDespesa(303, '3%'),
            'F37' => $this->empenhadoASPSPorSubfuncaoEDespesa(303, '4%'),
            'F39' => $this->empenhadoASPSPorSubfuncaoEDespesa(304, '3%'),
            'F40' => $this->empenhadoASPSPorSubfuncaoEDespesa(304, '4%'),
            'F42' => $this->empenhadoASPSPorSubfuncaoEDespesa(305, '3%'),
            'F43' => $this->empenhadoASPSPorSubfuncaoEDespesa(305, '4%'),
            'F45' => $this->empenhadoASPSPorSubfuncaoEDespesa(306, '3%'),
            'F46' => $this->empenhadoASPSPorSubfuncaoEDespesa(306, '4%'),
            'F48' => $this->empenhadoASPSOutrasSubfuncaoEDespesa('3%'),
            'F49' => $this->empenhadoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'H30' => $this->liquidadoASPSPorSubfuncaoEDespesa(301, '3%'),
            'H31' => $this->liquidadoASPSPorSubfuncaoEDespesa(301, '4%'),
            'H33' => $this->liquidadoASPSPorSubfuncaoEDespesa(302, '3%'),
            'H34' => $this->liquidadoASPSPorSubfuncaoEDespesa(302, '4%'),
            'H36' => $this->liquidadoASPSPorSubfuncaoEDespesa(303, '3%'),
            'H37' => $this->liquidadoASPSPorSubfuncaoEDespesa(303, '4%'),
            'H39' => $this->liquidadoASPSPorSubfuncaoEDespesa(304, '3%'),
            'H40' => $this->liquidadoASPSPorSubfuncaoEDespesa(304, '4%'),
            'H42' => $this->liquidadoASPSPorSubfuncaoEDespesa(305, '3%'),
            'H43' => $this->liquidadoASPSPorSubfuncaoEDespesa(305, '4%'),
            'H45' => $this->liquidadoASPSPorSubfuncaoEDespesa(306, '3%'),
            'H46' => $this->liquidadoASPSPorSubfuncaoEDespesa(306, '4%'),
            'H48' => $this->liquidadoASPSOutrasSubfuncaoEDespesa('3%'),
            'H49' => $this->liquidadoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'J30' => $this->pagoASPSPorSubfuncaoEDespesa(301, '3%'),
            'J31' => $this->pagoASPSPorSubfuncaoEDespesa(301, '4%'),
            'J33' => $this->pagoASPSPorSubfuncaoEDespesa(302, '3%'),
            'J34' => $this->pagoASPSPorSubfuncaoEDespesa(302, '4%'),
            'J36' => $this->pagoASPSPorSubfuncaoEDespesa(303, '3%'),
            'J37' => $this->pagoASPSPorSubfuncaoEDespesa(303, '4%'),
            'J39' => $this->pagoASPSPorSubfuncaoEDespesa(304, '3%'),
            'J40' => $this->pagoASPSPorSubfuncaoEDespesa(304, '4%'),
            'J42' => $this->pagoASPSPorSubfuncaoEDespesa(305, '3%'),
            'J43' => $this->pagoASPSPorSubfuncaoEDespesa(305, '4%'),
            'J45' => $this->pagoASPSPorSubfuncaoEDespesa(306, '3%'),
            'J46' => $this->pagoASPSPorSubfuncaoEDespesa(306, '4%'),
            'J48' => $this->pagoASPSOutrasSubfuncaoEDespesa('3%'),
            'J49' => $this->pagoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'J56' => $this->empenhadoPercentualNaoAplicado(),
            'K56' => $this->liquidadoPercentualNaoAplicado(),
            'L56' => $this->pagoPercentualNaoAplicado(),
            
            'J57' => $this->empenhadoRestosCancelados(),
            'K57' => $this->liquidadoRestosCancelados(),
            'L57' => $this->pagoRestosCancelados(),
            
            'I78' => $this->rpAnoAnteriorPago($this->dataBase->format('Y')-1),
            'I79' => $this->rpAnoAnteriorPago($this->dataBase->format('Y')-2),
            'I80' => $this->rpAnoAnteriorPago($this->dataBase->format('Y')-3),
            'I81' => $this->rpAnoAnteriorPago($this->dataBase->format('Y')-4) + $this->rpAnoAnteriorPago($this->dataBase->format('Y')-5),
            
            'K78' => $this->rpAnoAnteriorCancelado($this->dataBase->format('Y')-1),
            'K79' => $this->rpAnoAnteriorCancelado($this->dataBase->format('Y')-2),
            'K80' => $this->rpAnoAnteriorCancelado($this->dataBase->format('Y')-3),
            'K81' => $this->rpAnoAnteriorCancelado($this->dataBase->format('Y')-4) + $this->rpAnoAnteriorPago($this->dataBase->format('Y')-5),
            
            'I100' => $this->previsaoInicialReceitaPorFonte(600) + $this->previsaoInicialReceitaPorFonte(601) + $this->previsaoInicialReceitaPorFonte(602) + $this->previsaoInicialReceitaPorFonte(603) + $this->previsaoInicialReceitaPorFonte(604) + $this->previsaoInicialReceitaPorFonte(605)+ $this->previsaoInicialReceitaPorFonte(631),
            'I101' => $this->previsaoInicialReceitaPorFonte(621) + $this->previsaoInicialReceitaPorFonte(632),
            'I102' => $this->previsaoInicialReceitaPorFonte(622) + $this->previsaoInicialReceitaPorFonte(633),
            'I103' => $this->previsaoInicialReceitaPorFonte(634),
            'I104' => $this->previsaoInicialReceitaPorFonte(635)+$this->previsaoInicialReceitaPorFonte(636)+$this->previsaoInicialReceitaPorFonte(659),
            
            'J100' => $this->previsaoAtualizadaReceitaPorFonte(600) + $this->previsaoAtualizadaReceitaPorFonte(601) + $this->previsaoAtualizadaReceitaPorFonte(602) + $this->previsaoAtualizadaReceitaPorFonte(603) + $this->previsaoAtualizadaReceitaPorFonte(604) + $this->previsaoAtualizadaReceitaPorFonte(605)+ $this->previsaoAtualizadaReceitaPorFonte(631),
            'J101' => $this->previsaoAtualizadaReceitaPorFonte(621) + $this->previsaoAtualizadaReceitaPorFonte(632),
            'J102' => $this->previsaoAtualizadaReceitaPorFonte(622) + $this->previsaoAtualizadaReceitaPorFonte(633),
            'J103' => $this->previsaoAtualizadaReceitaPorFonte(634),
            'J104' => $this->previsaoAtualizadaReceitaPorFonte(635)+$this->previsaoAtualizadaReceitaPorFonte(636)+$this->previsaoAtualizadaReceitaPorFonte(659),
            
            'K100' => $this->arrecadacaoReceitaPorFonte(600) + $this->arrecadacaoReceitaPorFonte(601) + $this->arrecadacaoReceitaPorFonte(602) + $this->arrecadacaoReceitaPorFonte(603) + $this->arrecadacaoReceitaPorFonte(604) + $this->arrecadacaoReceitaPorFonte(605)+ $this->arrecadacaoReceitaPorFonte(631),
            'K101' => $this->arrecadacaoReceitaPorFonte(621) + $this->arrecadacaoReceitaPorFonte(632),
            'K102' => $this->arrecadacaoReceitaPorFonte(622) + $this->arrecadacaoReceitaPorFonte(633),
            'K103' => $this->arrecadacaoReceitaPorFonte(634),
            'K104' => $this->arrecadacaoReceitaPorFonte(635)+$this->arrecadacaoReceitaPorFonte(636)+$this->arrecadacaoReceitaPorFonte(659),
            
            'D111' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(301, '3%'),
            'D112' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(301, '4%'),
            'D114' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(302, '3%'),
            'D115' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(302, '4%'),
            'D117' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(303, '3%'),
            'D118' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(303, '4%'),
            'D120' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(304, '3%'),
            'D121' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(304, '4%'),
            'D123' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(305, '3%'),
            'D124' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(305, '4%'),
            'D126' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(306, '3%'),
            'D127' => $this->dotacaoInicialNaoASPSPorSubfuncaoEDespesa(306, '4%'),
            'D129' => $this->dotacaoInicialNaoASPSOutrasSubfuncaoEDespesa('3%'),
            'D130' => $this->dotacaoInicialNaoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'E111' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(301, '3%'),
            'E112' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(301, '4%'),
            'E114' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(302, '3%'),
            'E115' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(302, '4%'),
            'E117' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(303, '3%'),
            'E118' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(303, '4%'),
            'E120' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(304, '3%'),
            'E121' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(304, '4%'),
            'E123' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(305, '3%'),
            'E124' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(305, '4%'),
            'E126' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(306, '3%'),
            'E127' => $this->dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(306, '4%'),
            'E129' => $this->dotacaoAtualizadaNaoASPSOutrasSubfuncaoEDespesa('3%'),
            'E130' => $this->dotacaoAtualizadaNaoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'F111' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(301, '3%'),
            'F112' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(301, '4%'),
            'F114' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(302, '3%'),
            'F115' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(302, '4%'),
            'F117' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(303, '3%'),
            'F118' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(303, '4%'),
            'F120' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(304, '3%'),
            'F121' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(304, '4%'),
            'F123' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(305, '3%'),
            'F124' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(305, '4%'),
            'F126' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(306, '3%'),
            'F127' => $this->empenhadoNaoASPSPorSubfuncaoEDespesa(306, '4%'),
            'F129' => $this->empenhadoNaoASPSOutrasSubfuncaoEDespesa('3%'),
            'F130' => $this->empenhadoNaoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'H111' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(301, '3%'),
            'H112' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(301, '4%'),
            'H114' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(302, '3%'),
            'H115' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(302, '4%'),
            'H117' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(303, '3%'),
            'H118' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(303, '4%'),
            'H120' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(304, '3%'),
            'H121' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(304, '4%'),
            'H123' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(305, '3%'),
            'H124' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(305, '4%'),
            'H126' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(306, '3%'),
            'H127' => $this->liquidadoNaoASPSPorSubfuncaoEDespesa(306, '4%'),
            'H129' => $this->liquidadoNaoASPSOutrasSubfuncaoEDespesa('3%'),
            'H130' => $this->liquidadoNaoASPSOutrasSubfuncaoEDespesa('4%'),
            
            'J111' => $this->pagoNaoASPSPorSubfuncaoEDespesa(301, '3%'),
            'J112' => $this->pagoNaoASPSPorSubfuncaoEDespesa(301, '4%'),
            'J114' => $this->pagoNaoASPSPorSubfuncaoEDespesa(302, '3%'),
            'J115' => $this->pagoNaoASPSPorSubfuncaoEDespesa(302, '4%'),
            'J117' => $this->pagoNaoASPSPorSubfuncaoEDespesa(303, '3%'),
            'J118' => $this->pagoNaoASPSPorSubfuncaoEDespesa(303, '4%'),
            'J120' => $this->pagoNaoASPSPorSubfuncaoEDespesa(304, '3%'),
            'J121' => $this->pagoNaoASPSPorSubfuncaoEDespesa(304, '4%'),
            'J123' => $this->pagoNaoASPSPorSubfuncaoEDespesa(305, '3%'),
            'J124' => $this->pagoNaoASPSPorSubfuncaoEDespesa(305, '4%'),
            'J126' => $this->pagoNaoASPSPorSubfuncaoEDespesa(306, '3%'),
            'J127' => $this->pagoNaoASPSPorSubfuncaoEDespesa(306, '4%'),
            'J129' => $this->pagoNaoASPSOutrasSubfuncaoEDespesa('3%'),
            'J130' => $this->pagoNaoASPSOutrasSubfuncaoEDespesa('4%'),
        ];
    }
    
    private function pagoNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
         $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                            --AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->pagoASPSOutrasSubfuncaoEDespesa($ndo), 2);
    }
    // private function pagoNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
    //      $ano = (int) substr($this->remessa, 0, 4);
    //     $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
    //                 FROM PAD.PAGAMENTO
    //                 WHERE REMESSA = %s
    //                         AND FUNCAO = 10
    //                         AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
    //                         AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
    //                         AND ANO_EMPENHO = %d
    //                         AND RUBRICA LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $ano, $ndo);
    //     $result = $this->con->query($query);
    //     return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function pagoNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO = %d
                            --AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->pagoASPSPorSubfuncaoEDespesa($sf, $ndo), 2);
    }
    // private function pagoNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
    //     $ano = (int) substr($this->remessa, 0, 4);
    //     $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
    //                 FROM PAD.PAGAMENTO
    //                 WHERE REMESSA = %s
    //                         AND FUNCAO = 10
    //                         AND SUBFUNCAO = %d
    //                         AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
    //                         AND ANO_EMPENHO = %d
    //                         AND RUBRICA LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo);
    //     $result = $this->con->query($query);
    //     return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function liquidadoNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
         $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                            --AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->liquidadoASPSOutrasSubfuncaoEDespesa($ndo), 2);
    }
    // private function liquidadoNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
    //      $ano = (int) substr($this->remessa, 0, 4);
    //     $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
    //                 FROM PAD.LIQUIDACAO
    //                 WHERE REMESSA = %s
    //                         AND FUNCAO = 10
    //                         AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
    //                         AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
    //                         AND ANO_EMPENHO = %d
    //                         AND RUBRICA LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $ano, $ndo);
    //     $result = $this->con->query($query);
    //     return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function liquidadoNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO = %d
                            --AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->liquidadoASPSPorSubfuncaoEDespesa($sf, $ndo), 2);
    }
    // private function liquidadoNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
    //     $ano = (int) substr($this->remessa, 0, 4);
    //     $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
    //                 FROM PAD.LIQUIDACAO
    //                 WHERE REMESSA = %s
    //                         AND FUNCAO = 10
    //                         AND SUBFUNCAO = %d
    //                         AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
    //                         AND ANO_EMPENHO = %d
    //                         AND RUBRICA LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo);
    //     $result = $this->con->query($query);
    //     return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function empenhadoNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
         $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                            --AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->empenhadoASPSOutrasSubfuncaoEDespesa($ndo), 2);
    }
    // private function empenhadoNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
    //      $ano = (int) substr($this->remessa, 0, 4);
    //     $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
    //                 FROM PAD.EMPENHO
    //                 WHERE REMESSA = %s
    //                         AND FUNCAO = 10
    //                         AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
    //                         AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
    //                         AND ANO_EMPENHO = %d
    //                         AND RUBRICA LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $ano, $ndo);
    //     $result = $this->con->query($query);
    //     return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function empenhadoNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO = %d
                            --AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->empenhadoASPSPorSubfuncaoEDespesa($sf, $ndo), 2);
    }
    // private function empenhadoNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
    //     $ano = (int) substr($this->remessa, 0, 4);
    //     $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
    //                 FROM PAD.EMPENHO
    //                 WHERE REMESSA = %s
    //                         AND FUNCAO = 10
    //                         AND SUBFUNCAO = %d
    //                         AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1002
    //                         AND ANO_EMPENHO = %d
    //                         AND RUBRICA LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo);
    //     $result = $this->con->query($query);
    //     return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function dotacaoAtualizadaNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        --AND FONTE_RECURSO NOT IN (500, 502)
                        AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        $vl1 = (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->dotacaoAtualizadaASPSOutrasSubfuncaoEDespesa($ndo), 2);
    }
    // private function dotacaoAtualizadaNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
    //     $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
    //             FROM PAD.BAL_DESP
    //             WHERE REMESSA = %d
    //                     AND FUNCAO = 10
    //                     AND FONTE_RECURSO NOT IN (500, 502)
    //                     AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
    //                     AND ELEMENTO LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $ndo);
    //     $result = $this->con->query($query);
    //     return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        --AND FONTE_RECURSO NOT IN (500, 502)
                        AND SUBFUNCAO = %d
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ndo);
        $result = $this->con->query($query);
        $vl1 = (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->dotacaoAtualizadaASPSPorSubfuncaoEDespesa($sf, $ndo), 2);
    }
    // private function dotacaoAtualizadaNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
    //     $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
    //             FROM PAD.BAL_DESP
    //             WHERE REMESSA = %d
    //                     AND FUNCAO = 10
    //                     AND FONTE_RECURSO NOT IN (500, 502)
    //                     AND SUBFUNCAO = %d
    //                     AND ELEMENTO LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $sf, $ndo);
    //     $result = $this->con->query($query);
    //     return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function dotacaoInicialNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        --AND FONTE_RECURSO NOT IN (500, 502)
                        AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        $vl1 = (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($vl1 - $this->dotacaoInicialASPSOutrasSubfuncaoEDespesa($ndo), 2);
    }
    // private function dotacaoInicialNaoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
    //     $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
    //             FROM PAD.BAL_DESP
    //             WHERE REMESSA = %d
    //                     AND FUNCAO = 10
    //                     AND FONTE_RECURSO NOT IN (500, 502)
    //                     AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
    //                     AND ELEMENTO LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $ndo);
    //     $result = $this->con->query($query);
    //     return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function dotacaoInicialNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        --AND FONTE_RECURSO NOT IN (500, 502)
                        AND SUBFUNCAO = %d
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ndo);
        $result = $this->con->query($query);
        $vl1 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);

        return (float) round($vl1 - $this->dotacaoInicialASPSPorSubfuncaoEDespesa($sf, $ndo), 2);
    }
    // private function dotacaoInicialNaoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
    //     $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
    //             FROM PAD.BAL_DESP
    //             WHERE REMESSA = %d
    //                     AND FUNCAO = 10
    //                     AND FONTE_RECURSO NOT IN (500, 502)
    //                     AND SUBFUNCAO = %d
    //                     AND ELEMENTO LIKE '%s'"
    //     ;
    //     $query = sprintf($sql, $this->remessa, $sf, $ndo);
    //     $result = $this->con->query($query);
    //     return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    // }
    
    private function arrecadacaoReceitaPorFonte(int $fr): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND FONTE_RECURSO = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'"
        ;
        $query = sprintf($sql, $this->remessa, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoAtualizadaReceitaPorFonte(int $fr): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND FONTE_RECURSO = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'"
        ;
        $query = sprintf($sql, $this->remessa, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoInicialReceitaPorFonte(int $fr): float {
        $sql = "SELECT SUM(RECEITA_ORCADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND FONTE_RECURSO = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'"
        ;
        $query = sprintf($sql, $this->remessa, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpAnoAnteriorCancelado(int $anoRP): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal * -1
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                            AND VALOR_PAGAMENTO::numeric < 0"
        ;
        $query = sprintf($sql, $this->remessa, $anoRP, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpAnoAnteriorPago(int $anoRP): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $anoRP, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoRestosCancelados(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND (RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s')"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '__35%', '__45%', '__75%', '__95%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoRestosCancelados(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND (RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s')"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '__35%', '__45%', '__75%', '__95%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoRestosCancelados(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND (RUBRICA LIKE '%s'
                            OR RUBRICA LIKE '%s'
                            OR RUBRICA LIKE '%s'
                            OR RUBRICA LIKE '%s')"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '__35%', '__45%', '__75%', '__95%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoPercentualNaoAplicado(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND (RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s')"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '__36%', '__46%', '__76%', '__96%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoPercentualNaoAplicado(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND (RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA LIKE '%s')"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '__36%', '__46%', '__76%', '__96%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoPercentualNaoAplicado(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND (RUBRICA LIKE '%s'
                            OR RUBRICA LIKE '%s'
                            OR RUBRICA LIKE '%s'
                            OR RUBRICA LIKE '%s')"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '__36%', '__46%', '__76%', '__96%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        $pago = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(PAGO)::decimal
                    FROM CONSORCIO.DESPESAS
                    WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND FUNCAO = 10
                    AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                    AND NDO LIKE '%s'"
        ;
        $query = sprintf($sql, $data_inicial, $data_final, $ndo);
        $result = $this->con->query($query);
        $consorcio = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($pago+ $consorcio, 2);
    }
    
    private function pagoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        $pago= round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(PAGO)::decimal
                    FROM CONSORCIO.DESPESAS
                    WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND FUNCAO = 10
                    AND SUBFUNCAO = %d
                    AND NDO LIKE '%s'"
        ;
        $query = sprintf($sql, $data_inicial, $data_final, $sf, $ndo);
        $result = $this->con->query($query);
        $consorcio = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($pago + $consorcio, 2);
    }
    
    private function liquidadoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        $liquidado = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(LIQUIDADO)::decimal
                    FROM CONSORCIO.DESPESAS
                    WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND FUNCAO = 10
                    AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                    AND NDO LIKE '%s'"
        ;
        $query = sprintf($sql, $data_inicial, $data_final, $ndo);
        $result = $this->con->query($query);
        $consorcio = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($liquidado + $consorcio, 2);
    }
    
    private function liquidadoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        $liquidado = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(LIQUIDADO)::decimal
                    FROM CONSORCIO.DESPESAS
                    WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND FUNCAO = 10
                    AND SUBFUNCAO = %d
                    AND NDO LIKE '%s'"
        ;
        $query = sprintf($sql, $data_inicial, $data_final, $sf, $ndo);
        $result = $this->con->query($query);
        $consorcio = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($liquidado + $consorcio, 2);
    }
    
    private function empenhadoASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        $empenhado = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(EMPENHADO)::decimal
                    FROM CONSORCIO.DESPESAS
                    WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND FUNCAO = 10
                    AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                    AND NDO LIKE '%s'"
        ;
        $query = sprintf($sql, $data_inicial, $data_final, $ndo);
        $result = $this->con->query($query);
        $consorcio = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($empenhado + $consorcio, 2);
    }
    
    private function empenhadoASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 10
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1002
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'
                            AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ano, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        $empenhado = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(EMPENHADO)::decimal
                    FROM CONSORCIO.DESPESAS
                    WHERE DATA_BASE BETWEEN '%s' AND '%s'
                    AND FUNCAO = 10
                    AND SUBFUNCAO = %d
                    AND NDO LIKE '%s'"
        ;
        $query = sprintf($sql, $data_inicial, $data_final, $sf, $ndo);
        $result = $this->con->query($query);
        $consorcio = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        return (float) round($empenhado + $consorcio, 2);
    }

    private function dotacaoAtualizadaASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        AND FONTE_RECURSO IN (500, 502)
                        AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        AND FONTE_RECURSO IN (500, 502)
                        AND SUBFUNCAO = %d
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoInicialASPSOutrasSubfuncaoEDespesa(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        AND FONTE_RECURSO IN (500, 502)
                        AND SUBFUNCAO NOT IN (301, 302, 303, 304, 305, 306)
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoInicialASPSPorSubfuncaoEDespesa(int $sf, string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_INICIAL)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 10
                        AND FONTE_RECURSO IN (500, 502)
                        AND SUBFUNCAO = %d
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $sf, $ndo, '339046%', '__71%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function arrecadacaoReceita(string $nro): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND CARACTERISTICA_PECULIAR_RECEITA != 105"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function previsaoAtualizadaReceita(string $nro): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND CARACTERISTICA_PECULIAR_RECEITA != 105"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoInicialReceita(string $nro): float {
        $sql = "SELECT SUM(RECEITA_ORCADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND CARACTERISTICA_PECULIAR_RECEITA != 105"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
//    private function getDataInicialBimestre(): \DateTime {
//        $ano = substr($this->remessa, 0, 4);
//        $mes_final = substr($this->remessa, 4, 2);
//        $mes_inicial = $mes_final - 1;
//        if($mes_inicial < 1){
//            $mes_inicial = '01';//para evitar erro fatal ao usar a remessa AAAA01
//        }else{
//            $mes_inicial = str_pad($mes_inicial, 2, '0', STR_PAD_LEFT);//necessário porque quando subtrai 1 do mês final, trasnforma em int.
//        }
//        return date_create_from_format('Ymd', sprintf('%s%s%s', $ano, $mes_inicial, '01'));
//    }
    
    
}
