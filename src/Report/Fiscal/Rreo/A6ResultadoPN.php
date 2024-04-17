<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 6 - Resultados Primário e Nominal
 *
 * @author Everton
 */
final class A6ResultadoPN extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A6', $con, $spreadsheet, $remessa);
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
            
            'H14' => $this->previsaoAtualizadaReceita('11%'),
            'H15' => $this->previsaoAtualizadaReceita('111250%'),
            'H16' => $this->previsaoAtualizadaReceita('1114511%'),
            'H17' => $this->previsaoAtualizadaReceita('111253%'),
            'H18' => $this->previsaoAtualizadaReceita('111303%'),
            'H20' => $this->previsaoAtualizadaReceita('12%'),
            'H21' => $this->previsaoAtualizadaReceita('13%'),
            'H22' => $this->previsaoAtualizadaReceita('1321%'),
            'H24' => $this->previsaoAtualizadaReceita('17%'),
            'H25' => $this->previsaoAtualizadaReceita('171151%'),
            'H26' => $this->previsaoAtualizadaReceita('172150%'),
            'H27' => $this->previsaoAtualizadaReceita('172151%'),
            'H28' => $this->previsaoAtualizadaReceita('171152%'),
            'H29' => $this->previsaoAtualizadaReceita('172152%'),
            'H30' => $this->previsaoAtualizadaReceita('1751%'),
            'H32' => round(
                    $this->previsaoAtualizadaReceita('14%')
                    + $this->previsaoAtualizadaReceita('15%')
                    + $this->previsaoAtualizadaReceita('16%')
                    + $this->previsaoAtualizadaReceita('19%')
                    , 2),
            'H33' => round(
                    $this->previsaoAtualizadaReceita('164101%')
                    + $this->previsaoAtualizadaReceita('164103%')
                    + $this->previsaoAtualizadaReceita('1922012%')
                    + $this->previsaoAtualizadaReceita('1922064%')
                    + $this->previsaoAtualizadaReceita('1944%')
                    + $this->previsaoAtualizadaReceita('199911%')
                    + $this->previsaoAtualizadaReceita('1999993%')
                    , 2),
            
            'I14' => $this->arrecadacaoReceita('11%'),
            'I15' => $this->arrecadacaoReceita('111250%'),
            'I16' => $this->arrecadacaoReceita('1114511%'),
            'I17' => $this->arrecadacaoReceita('111253%'),
            'I18' => $this->arrecadacaoReceita('111303%'),
            'I20' => $this->arrecadacaoReceita('12%'),
            'I21' => $this->arrecadacaoReceita('13%'),
            'I22' => $this->arrecadacaoReceita('1321%'),
            'I24' => $this->arrecadacaoReceita('17%'),
            'I25' => $this->arrecadacaoReceita('171151%'),
            'I26' => $this->arrecadacaoReceita('172150%'),
            'I27' => $this->arrecadacaoReceita('172151%'),
            'I28' => $this->arrecadacaoReceita('171152%'),
            'I29' => $this->arrecadacaoReceita('172152%'),
            'I30' => $this->arrecadacaoReceita('1751%'),
            'I32' => round(
                    $this->arrecadacaoReceita('14%')
                    + $this->arrecadacaoReceita('15%')
                    + $this->arrecadacaoReceita('16%')
                    + $this->arrecadacaoReceita('19%')
                    , 2),
            'I33' => round(
                    $this->arrecadacaoReceita('164101%')
                    + $this->arrecadacaoReceita('164103%')
                    + $this->arrecadacaoReceita('1922012%')
                    + $this->arrecadacaoReceita('1922064%')
                    + $this->arrecadacaoReceita('1944%')
                    + $this->arrecadacaoReceita('199911%')
                    + $this->arrecadacaoReceita('1999993%')
                    , 2),
            
            'H36' => $this->previsaoAtualizadaReceitaPrimariaCorrenteRpps(),
            'I36' => $this->arrecadacaoReceitaPrimariaCorrenteRpps(),
            
            'H37' => round($this->previsaoAtualizadaReceitaRpps('1%') - $this->previsaoAtualizadaReceitaPrimariaCorrenteRpps(), 2),
            'I37' => round($this->arrecadacaoReceitaRpps('1%') - $this->arrecadacaoReceitaPrimariaCorrenteRpps(), 2),
            
            'H39' => $this->previsaoAtualizadaReceita('21%'),
            'H40' => $this->previsaoAtualizadaReceita('23%'),
            'H41' => $this->previsaoAtualizadaReceita('22%'),
            'H42' => $this->previsaoAtualizadaReceita('221101%'),
            'H43' => $this->previsaoAtualizadaReceita('221102%'),
            'H45' => $this->previsaoAtualizadaReceita('24%'),
            'H46' => round(
                    $this->previsaoAtualizadaReceita('2414%')
                    + $this->previsaoAtualizadaReceita('2422%')
                    + $this->previsaoAtualizadaReceita('2432%')
                    + $this->previsaoAtualizadaReceita('244150%')
                    + $this->previsaoAtualizadaReceita('244151%')
                    , 2),
            'H48' => $this->previsaoAtualizadaReceita('29%'),
            'H49' => round(
                    $this->previsaoAtualizadaReceita('292%')
                    + $this->previsaoAtualizadaReceita('293%')
                    + $this->previsaoAtualizadaReceita('294%')
                    , 2),
            
            'I39' => $this->arrecadacaoReceita('21%'),
            'I40' => $this->arrecadacaoReceita('23%'),
            'I41' => $this->arrecadacaoReceita('22%'),
            'I42' => $this->arrecadacaoReceita('221101%'),
            'I43' => $this->arrecadacaoReceita('221102%'),
            'I45' => $this->arrecadacaoReceita('24%'),
            'I46' => round(
                    $this->arrecadacaoReceita('2414%')
                    + $this->arrecadacaoReceita('2422%')
                    + $this->arrecadacaoReceita('2432%')
                    + $this->arrecadacaoReceita('244150%')
                    + $this->arrecadacaoReceita('244151%')
                    , 2),
            'I48' => $this->arrecadacaoReceita('29%'),
            'I49' => round(
                    $this->arrecadacaoReceita('292%')
                    + $this->arrecadacaoReceita('293%')
                    + $this->arrecadacaoReceita('294%')
                    , 2),
            
            'H52' => $this->previsaoAtualizadaReceitaPrimariaCapitalRpps(),
            'H53' => round(
                    $this->previsaoAtualizadaReceitaRpps('2%')
                    - $this->previsaoAtualizadaReceitaPrimariaCapitalRpps()
                    , 2),
            
            'I52' => $this->arrecadacaoReceitaPrimariaCapitalRpps(),
            'I53' => round(
                    $this->arrecadacaoReceitaRpps('2%')
                    - $this->arrecadacaoReceitaPrimariaCapitalRpps()
                    , 2),
            
            'C63' => $this->dotacaoAtualizada('31%'),
            'C64' => $this->dotacaoAtualizada('32%'),
            'C65' => $this->dotacaoAtualizada('33%'),
            
            'D63' => $this->empenhado('31%'),
            'D64' => $this->empenhado('32%'),
            'D65' => $this->empenhado('33%'),
            
            'E63' => $this->liquidado('31%'),
            'E64' => $this->liquidado('32%'),
            'E65' => $this->liquidado('33%'),
            
            'F63' => $this->pago('31%'),
            'F64' => $this->pago('32%'),
            'F65' => $this->pago('33%'),
            
            'G63' => $this->rppPago('31%'),
            'G64' => $this->rppPago('32%'),
            'G65' => $this->rppPago('33%'),
            
            'H63' => $this->rpnpLiquidado('31%'),
            'H64' => $this->rpnpLiquidado('32%'),
            'H65' => $this->rpnpLiquidado('33%'),
            
            'I63' => $this->rpnpPago('31%'),
            'I64' => $this->rpnpPago('32%'),
            'I65' => $this->rpnpPago('33%'),
            
            'C67' => round($this->dotacaoAtualizadaRpps('31%')+$this->dotacaoAtualizadaRpps('33%'), 2),
            'D67' => round($this->empenhadoRpps('31%')+$this->empenhadoRpps('33%'), 2),
            'E67' => round($this->liquidadoRpps('31%')+$this->liquidadoRpps('33%'), 2),
            'F67' => round($this->pagoRpps('31%')+$this->pagoRpps('33%'), 2),
            'G67' => round($this->rppPagoRpps('31%')+$this->rppPagoRpps('33%'), 2),
            'H67' => round($this->rpnpLiquidadoRpps('31%')+$this->rpnpLiquidadoRpps('33%'), 2),
            'I67' => round($this->rpnpPagoRpps('31%')+$this->rpnpPagoRpps('33%'), 2),
            
            'C68' => $this->dotacaoAtualizadaRpps('32%'),
            'D68' => $this->empenhadoRpps('32%'),
            'E68' => $this->liquidadoRpps('32%'),
            'F68' => $this->pagoRpps('32%'),
            'H68' => $this->rppPagoRpps('32%'),
            'H68' => $this->rpnpLiquidadoRpps('32%'),
            'I68' => $this->rpnpPagoRpps('32%'),
            
            'C70' => $this->dotacaoAtualizada('44%'),
            'D70' => $this->empenhado('44%'),
            'E70' => $this->liquidado('44%'),
            'F70' => $this->pago('44%'),
            'H70' => $this->rppPago('44%'),
            'H70' => $this->rpnpLiquidado('44%'),
            'I70' => $this->rpnpPago('44%'),
            
            'C71' => 0.0,
            'D71' => 0.0,
            'E71' => 0.0,
            'F71' => 0.0,
            'H71' => 0.0,
            'H71' => 0.0,
            'I71' => 0.0,
            
            'C72' => 0.0,
            'D72' => 0.0,
            'E72' => 0.0,
            'F72' => 0.0,
            'H72' => 0.0,
            'H72' => 0.0,
            'I72' => 0.0,
            
            'C73' => 0.0,
            'D73' => 0.0,
            'E73' => 0.0,
            'F73' => 0.0,
            'H73' => 0.0,
            'H73' => 0.0,
            'I73' => 0.0,
            
            'C74' => 0.0,
            'D74' => 0.0,
            'E74' => 0.0,
            'F74' => 0.0,
            'H74' => 0.0,
            'H74' => 0.0,
            'I74' => 0.0,
            
            'C75' => 0.0,
            'D75' => 0.0,
            'E75' => 0.0,
            'F75' => 0.0,
            'H75' => 0.0,
            'H75' => 0.0,
            'I75' => 0.0,
            
            'C76' => $this->dotacaoAtualizada('46%'),
            'D76' => $this->empenhado('46%'),
            'E76' => $this->liquidado('46%'),
            'F76' => $this->pago('46%'),
            'H76' => $this->rppPago('46%'),
            'H76' => $this->rpnpLiquidado('46%'),
            'I76' => $this->rpnpPago('46%'),
            
            'C78' => $this->dotacaoAtualizada('99%'),
            
            'C79' => $this->dotacaoAtualizadaRpps('44%'),
            'D79' => $this->empenhadoRpps('44%'),
            'E79' => $this->liquidadoRpps('44%'),
            'F79' => $this->pagoRpps('44%'),
            'H79' => $this->rppPagoRpps('44%'),
            'H79' => $this->rpnpLiquidadoRpps('44%'),
            'I79' => $this->rpnpPagoRpps('44%'),
            
            'C80' => 0.0,
            'D80' => 0.0,
            'E80' => 0.0,
            'F80' => 0.0,
            'H80' => 0.0,
            'H80' => 0.0,
            'I80' => 0.0,
            
            'C92' => $this->jurosAtivos(),
            'C93' => $this->jurosPassivos(),
            
            'C117' => 0.0,
            
            
        ];
        
    }
    
    private function jurosPassivos(): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND ENTIDADE IN ('cm', 'pm')
                        AND ESCRITURACAO LIKE 'S'
                        AND (
                            CONTA_CONTABIL LIKE '34111%%'
                            OR CONTA_CONTABIL LIKE '34113%%'
                            OR CONTA_CONTABIL LIKE '34114%%'
                            OR CONTA_CONTABIL LIKE '34115%%'
                            OR CONTA_CONTABIL LIKE '34121%%'
                            OR CONTA_CONTABIL LIKE '34131%%'
                            OR CONTA_CONTABIL LIKE '34133%%'
                            OR CONTA_CONTABIL LIKE '34134%%'
                            OR CONTA_CONTABIL LIKE '34135%%'
                            OR CONTA_CONTABIL LIKE '34141%%'
                            OR CONTA_CONTABIL LIKE '34181%%'
                            OR CONTA_CONTABIL LIKE '34183%%'
                            OR CONTA_CONTABIL LIKE '34184%%'
                            OR CONTA_CONTABIL LIKE '34185%%'
                            OR CONTA_CONTABIL LIKE '34191%%'
                            OR CONTA_CONTABIL LIKE '34211%%'
                            OR CONTA_CONTABIL LIKE '34213%%'
                            OR CONTA_CONTABIL LIKE '34214%%'
                            OR CONTA_CONTABIL LIKE '34215%%'
                            OR CONTA_CONTABIL LIKE '34221%%'
                            OR CONTA_CONTABIL LIKE '3425202%%'
                            OR CONTA_CONTABIL LIKE '34261%%'
                            OR CONTA_CONTABIL LIKE '34263%%'
                            OR CONTA_CONTABIL LIKE '34264%%'
                            OR CONTA_CONTABIL LIKE '34265%%'
                            OR CONTA_CONTABIL LIKE '3431101%%'
                            OR CONTA_CONTABIL LIKE '3431301%%'
                            OR CONTA_CONTABIL LIKE '3431401%%'
                            OR CONTA_CONTABIL LIKE '3431501%%'
                            OR CONTA_CONTABIL LIKE '3432101%%'
                            OR CONTA_CONTABIL LIKE '3433101%%'
                            OR CONTA_CONTABIL LIKE '3433301%%'
                            OR CONTA_CONTABIL LIKE '3433401%%'
                            OR CONTA_CONTABIL LIKE '3433501%%'
                            OR CONTA_CONTABIL LIKE '3434101%%'
                            OR CONTA_CONTABIL LIKE '3435101%%'
                            OR CONTA_CONTABIL LIKE '3435301%%'
                            OR CONTA_CONTABIL LIKE '3435401%%'
                            OR CONTA_CONTABIL LIKE '3435501%%'
                            OR CONTA_CONTABIL LIKE '343910170%%'
                            OR CONTA_CONTABIL LIKE '343930170%%'
                            OR CONTA_CONTABIL LIKE '343930171%%'
                            OR CONTA_CONTABIL LIKE '34511%%'
                            OR CONTA_CONTABIL LIKE '34521%%'
                            OR CONTA_CONTABIL LIKE '34611%%'
                            OR CONTA_CONTABIL LIKE '34613%%'
                            OR CONTA_CONTABIL LIKE '34614%%'
                            OR CONTA_CONTABIL LIKE '34615%%'
                            OR CONTA_CONTABIL LIKE '34911%%'
                            OR CONTA_CONTABIL LIKE '34913%%'
                            OR CONTA_CONTABIL LIKE '34914%%'
                            OR CONTA_CONTABIL LIKE '34915%%'
                        )";
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function jurosAtivos(): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND ENTIDADE IN ('cm', 'pm')
                        AND ESCRITURACAO LIKE 'S'
                        AND (
                            CONTA_CONTABIL LIKE '4411199%%'
                            OR CONTA_CONTABIL LIKE '44121%%'
                            OR CONTA_CONTABIL LIKE '44123%%'
                            OR CONTA_CONTABIL LIKE '44124%%'
                            OR CONTA_CONTABIL LIKE '44125%%'
                            OR CONTA_CONTABIL LIKE '44131%%'
                            OR CONTA_CONTABIL LIKE '44133%%'
                            OR CONTA_CONTABIL LIKE '44134%%'
                            OR CONTA_CONTABIL LIKE '44135%%'
                            OR CONTA_CONTABIL LIKE '44141%%'
                            OR CONTA_CONTABIL LIKE '44211%%'
                            OR CONTA_CONTABIL LIKE '44213%%'
                            OR CONTA_CONTABIL LIKE '44214%%'
                            OR CONTA_CONTABIL LIKE '44215%%'
                            OR CONTA_CONTABIL LIKE '44221%%'
                            OR CONTA_CONTABIL LIKE '44261%%'
                            OR CONTA_CONTABIL LIKE '44263%%'
                            OR CONTA_CONTABIL LIKE '44264%%'
                            OR CONTA_CONTABIL LIKE '44265%%'
                            OR CONTA_CONTABIL LIKE '4431101%%'
                            OR CONTA_CONTABIL LIKE '4431199%%'
                            OR CONTA_CONTABIL LIKE '4431301%%'
                            OR CONTA_CONTABIL LIKE '4431401%%'
                            OR CONTA_CONTABIL LIKE '4431501%%'
                            OR CONTA_CONTABIL LIKE '4432101%%'
                            OR CONTA_CONTABIL LIKE '4433101%%'
                            OR CONTA_CONTABIL LIKE '4433199%%'
                            OR CONTA_CONTABIL LIKE '4433301%%'
                            OR CONTA_CONTABIL LIKE '4433401%%'
                            OR CONTA_CONTABIL LIKE '4433501%%'
                            OR CONTA_CONTABIL LIKE '4434101%%'
                            OR CONTA_CONTABIL LIKE '4435101%%'
                            OR CONTA_CONTABIL LIKE '4435301%%'
                            OR CONTA_CONTABIL LIKE '4435401%%'
                            OR CONTA_CONTABIL LIKE '4435501%%'
                            OR CONTA_CONTABIL LIKE '443910170%%'
                            OR CONTA_CONTABIL LIKE '443930170%%'
                            OR CONTA_CONTABIL LIKE '443930171%%'
                            OR CONTA_CONTABIL LIKE '44511%%'
                            OR CONTA_CONTABIL LIKE '44521%%'
                            OR CONTA_CONTABIL LIKE '44611%%'
                            OR CONTA_CONTABIL LIKE '44613%%'
                            OR CONTA_CONTABIL LIKE '44614%%'
                            OR CONTA_CONTABIL LIKE '44615%%'
                            OR CONTA_CONTABIL LIKE '44621%%'
                            OR CONTA_CONTABIL LIKE '44623%%'
                            OR CONTA_CONTABIL LIKE '44624%%'
                            OR CONTA_CONTABIL LIKE '44625%%'
                        )";
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpnpPagoRpps(string $ndo): float {
        $sql = "SELECT SUM(NAO_PROCESSADO_PAGO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpnpLiquidadoRpps(string $ndo): float {
        $sql = "SELECT SUM(RP_LIQUIDADO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rppPagoRpps(string $ndo): float {
        $sql = "SELECT SUM(PROCESSADO_PAGO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoRpps(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'
                        AND ANO_EMPENHO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoRpps(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'
                        AND ANO_EMPENHO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoRpps(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                FROM PAD.EMPENHO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'
                        AND ANO_EMPENHO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaRpps(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpnpPago(string $ndo): float {
        $sql = "SELECT SUM(NAO_PROCESSADO_PAGO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpnpLiquidado(string $ndo): float {
        $sql = "SELECT SUM(RP_LIQUIDADO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rppPago(string $ndo): float {
        $sql = "SELECT SUM(PROCESSADO_PAGO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pago(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')
                        AND ANO_EMPENHO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidado(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')
                        AND ANO_EMPENHO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhado(string $ndo): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                FROM PAD.EMPENHO
                WHERE REMESSA = %s
                        AND RUBRICA LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')
                        AND ANO_EMPENHO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, $ano);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizada(string $ndo): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND ENTIDADE IN ('cm', 'pm')"
        ;
        $query = sprintf($sql, $this->remessa, $ndo);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoReceitaPrimariaCapitalRpps(): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '2%%'
                        AND NATUREZA_RECEITA NOT LIKE '21%%'
                        AND NATUREZA_RECEITA NOT LIKE '23%%'
                        AND NATUREZA_RECEITA NOT LIKE '221101%%'
                        AND NATUREZA_RECEITA NOT LIKE '221102%%'
                        AND NATUREZA_RECEITA NOT LIKE '292%%'
                        AND NATUREZA_RECEITA NOT LIKE '293%%'
                        AND NATUREZA_RECEITA NOT LIKE '294%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoAtualizadaReceitaPrimariaCapitalRpps(): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '2%%'
                        AND NATUREZA_RECEITA NOT LIKE '21%%'
                        AND NATUREZA_RECEITA NOT LIKE '23%%'
                        AND NATUREZA_RECEITA NOT LIKE '221101%%'
                        AND NATUREZA_RECEITA NOT LIKE '221102%%'
                        AND NATUREZA_RECEITA NOT LIKE '292%%'
                        AND NATUREZA_RECEITA NOT LIKE '293%%'
                        AND NATUREZA_RECEITA NOT LIKE '294%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoReceitaRpps(string $nro): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoAtualizadaReceitaRpps(string $nro): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoReceitaPrimariaCorrenteRpps(): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '1%%'
                        AND NATUREZA_RECEITA NOT LIKE '1321%%'
                        AND NATUREZA_RECEITA NOT LIKE '164101%%'
                        AND NATUREZA_RECEITA NOT LIKE '164103%%'
                        AND NATUREZA_RECEITA NOT LIKE '1922012%%'
                        AND NATUREZA_RECEITA NOT LIKE '1922064%%'
                        AND NATUREZA_RECEITA NOT LIKE '1944%%'
                        AND NATUREZA_RECEITA NOT LIKE '199911%%'
                        AND NATUREZA_RECEITA NOT LIKE '1999993%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoAtualizadaReceitaPrimariaCorrenteRpps(): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '1%%'
                        AND NATUREZA_RECEITA NOT LIKE '1321%%'
                        AND NATUREZA_RECEITA NOT LIKE '164101%%'
                        AND NATUREZA_RECEITA NOT LIKE '164103%%'
                        AND NATUREZA_RECEITA NOT LIKE '1922012%%'
                        AND NATUREZA_RECEITA NOT LIKE '1922064%%'
                        AND NATUREZA_RECEITA NOT LIKE '1944%%'
                        AND NATUREZA_RECEITA NOT LIKE '199911%%'
                        AND NATUREZA_RECEITA NOT LIKE '1999993%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'fpsm'"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoReceita(string $nro): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND ENTIDADE LIKE 'pm'"
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
                        AND ENTIDADE LIKE 'pm'"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
        
}
