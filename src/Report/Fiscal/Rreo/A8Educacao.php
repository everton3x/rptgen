<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 8 - Educação
 *
 * @author Everton
 */
final class A8Educacao extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A8', $con, $spreadsheet, $remessa);
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
            'G14' => $this->previsaoAtualizadaReceitaResultanteImpostos('111250%'),
            'G15' => $this->previsaoAtualizadaReceitaResultanteImpostos('111253%'),
            'G16' => $this->previsaoAtualizadaReceitaResultanteImpostos('1114511%')+$this->previsaoAtualizadaReceitaResultanteImpostos('1114512%'),
            'G17' => $this->previsaoAtualizadaReceitaResultanteImpostos('111303%'),
            'G20' => $this->previsaoAtualizadaReceitaResultanteImpostos('1711511%'),
            'G21' => $this->previsaoAtualizadaReceitaResultanteImpostos('1711512%'),
            'G22' => $this->previsaoAtualizadaReceitaResultanteImpostos('172150%'),
            'G23' => $this->previsaoAtualizadaReceitaResultanteImpostos('172152%'),
            'G24' => $this->previsaoAtualizadaReceitaResultanteImpostos('171152%'),
            'G25' => $this->previsaoAtualizadaReceitaResultanteImpostos('172151%'),
            'G26' => $this->previsaoAtualizadaReceitaResultanteImpostos('171155%'),
            'G27' => $this->previsaoAtualizadaReceitaResultanteImpostos('171961%')+$this->previsaoAtualizadaReceitaResultanteImpostos('172953%'),
            
            'H14' => $this->arrecadacaoReceitaResultanteImpostos('111250%'),
            'H15' => $this->arrecadacaoReceitaResultanteImpostos('111253%'),
            'H16' => $this->arrecadacaoReceitaResultanteImpostos('1114511%')+$this->arrecadacaoReceitaResultanteImpostos('1114512%'),
            'H17' => $this->arrecadacaoReceitaResultanteImpostos('111303%'),
            'H20' => $this->arrecadacaoReceitaResultanteImpostos('1711511%'),
            'H21' => $this->arrecadacaoReceitaResultanteImpostos('1711512%'),
            'H22' => $this->arrecadacaoReceitaResultanteImpostos('172150%'),
            'H23' => $this->arrecadacaoReceitaResultanteImpostos('172152%'),
            'H24' => $this->arrecadacaoReceitaResultanteImpostos('171152%'),
            'H25' => $this->arrecadacaoReceitaResultanteImpostos('172151%'),
            'H26' => $this->arrecadacaoReceitaResultanteImpostos('171155%'),
            'H27' => $this->arrecadacaoReceitaResultanteImpostos('171961%')+$this->arrecadacaoReceitaResultanteImpostos('172953%'),
            
            'G40' => $this->previsaoAtualizadaFundebRecebido('175150%', 540),
            'G41' => $this->previsaoAtualizadaFundebRecebido('1321%', 540),
            'G42' => $this->previsaoAtualizadaFundebRecebido('192251%', 540),
            
            'G44' => $this->previsaoAtualizadaFundebRecebido('171551%', 541),
            'G45' => $this->previsaoAtualizadaFundebRecebido('1321%', 541),
            'G46' => $this->previsaoAtualizadaFundebRecebido('192251%', 541),
            
            'G48' => $this->previsaoAtualizadaFundebRecebido('171550%', 542),
            'G49' => $this->previsaoAtualizadaFundebRecebido('1321%', 542),
            'G50' => $this->previsaoAtualizadaFundebRecebido('192251%', 542),
            
            'G52' => $this->previsaoAtualizadaFundebRecebido('171552%', 543),
            'G53' => $this->previsaoAtualizadaFundebRecebido('1321%', 543),
            'G54' => $this->previsaoAtualizadaFundebRecebido('192251%', 543),
            
            'H40' => $this->arrecadacaoFundebRecebido('175150%', 540),
            'H41' => $this->arrecadacaoFundebRecebido('1321%', 540),
            'H42' => $this->arrecadacaoFundebRecebido('192251%', 540),
            
            'H44' => $this->arrecadacaoFundebRecebido('171551%', 541),
            'H45' => $this->arrecadacaoFundebRecebido('1321%', 541),
            'H46' => $this->arrecadacaoFundebRecebido('192251%', 541),
            
            'H48' => $this->arrecadacaoFundebRecebido('171550%', 542),
            'H49' => $this->arrecadacaoFundebRecebido('1321%', 542),
            'H50' => $this->arrecadacaoFundebRecebido('192251%', 542),
            
            'H52' => $this->arrecadacaoFundebRecebido('171552%', 543),
            'H53' => $this->arrecadacaoFundebRecebido('1321%', 543),
            'H54' => $this->arrecadacaoFundebRecebido('192251%', 543),
            
            'H60' => $this->superavitFundebAnoAnterior(),
            
            'D69' => $this->dotacaoAtualizadaDespesasFundebMagisterio(),
            'D70' => $this->dotacaoAtualizadaDespesasFundebMagisterio(365),
            'D71' => $this->dotacaoAtualizadaDespesasFundebMagisterio(361),
            'D72' => $this->dotacaoAtualizadaDespesasFundebMagisterio(366),
            'D73' => $this->dotacaoAtualizadaDespesasFundebMagisterio(367),
            'D74' => $this->dotacaoAtualizadaDespesasFundebMagisterio(122),
            
            'D76' => $this->dotacaoAtualizadaDespesasFundebOutras(),
            'D77' => $this->dotacaoAtualizadaDespesasFundebOutras(365),
            'D78' => $this->dotacaoAtualizadaDespesasFundebOutras(361),
            'D79' => $this->dotacaoAtualizadaDespesasFundebOutras(366),
            'D80' => $this->dotacaoAtualizadaDespesasFundebOutras(367),
            'D81' => $this->dotacaoAtualizadaDespesasFundebOutras(122),
            'D82' => $this->dotacaoAtualizadaDespesasFundebOutras(782),
            
            'E69' => $this->empenhadoDespesasFundebMagisterio(),
            'E70' => $this->empenhadoDespesasFundebMagisterio(365),
            'E71' => $this->empenhadoDespesasFundebMagisterio(361),
            'E72' => $this->empenhadoDespesasFundebMagisterio(366),
            'E73' => $this->empenhadoDespesasFundebMagisterio(367),
            'E74' => $this->empenhadoDespesasFundebMagisterio(122),
            
            'E76' => $this->empenhadoDespesasFundebOutras(),
            'E77' => $this->empenhadoDespesasFundebOutras(365),
            'E78' => $this->empenhadoDespesasFundebOutras(361),
            'E79' => $this->empenhadoDespesasFundebOutras(366),
            'E80' => $this->empenhadoDespesasFundebOutras(367),
            'E81' => $this->empenhadoDespesasFundebOutras(122),
            'E82' => $this->empenhadoDespesasFundebOutras(782),
            
            'F69' => $this->liquidadoDespesasFundebMagisterio(),
            'F70' => $this->liquidadoDespesasFundebMagisterio(365),
            'F71' => $this->liquidadoDespesasFundebMagisterio(361),
            'F72' => $this->liquidadoDespesasFundebMagisterio(366),
            'F73' => $this->liquidadoDespesasFundebMagisterio(367),
            'F74' => $this->liquidadoDespesasFundebMagisterio(122),
            
            'F76' => $this->liquidadoDespesasFundebOutras(),
            'F77' => $this->liquidadoDespesasFundebOutras(365),
            'F78' => $this->liquidadoDespesasFundebOutras(361),
            'F79' => $this->liquidadoDespesasFundebOutras(366),
            'F80' => $this->liquidadoDespesasFundebOutras(367),
            'F81' => $this->liquidadoDespesasFundebOutras(122),
            'F82' => $this->liquidadoDespesasFundebOutras(782),
            
            'G69' => $this->pagoDespesasFundebMagisterio(),
            'G70' => $this->pagoDespesasFundebMagisterio(365),
            'G71' => $this->pagoDespesasFundebMagisterio(361),
            'G72' => $this->pagoDespesasFundebMagisterio(366),
            'G73' => $this->pagoDespesasFundebMagisterio(367),
            'G74' => $this->pagoDespesasFundebMagisterio(122),
            
            'G76' => $this->pagoDespesasFundebOutras(),
            'G77' => $this->pagoDespesasFundebOutras(365),
            'G78' => $this->pagoDespesasFundebOutras(361),
            'G79' => $this->pagoDespesasFundebOutras(366),
            'G80' => $this->pagoDespesasFundebOutras(367),
            'G81' => $this->pagoDespesasFundebOutras(122),
            'G82' => $this->pagoDespesasFundebOutras(782),
            
            'C92' => $this->empenhadoFundebNoAno(540),
            'C93' => $this->empenhadoFundebNoAno(541),
            'C94' => $this->empenhadoFundebNoAno(542),
            'C95' => $this->empenhadoFundebNoAno(543),
            'C96' => $this->empenhadoFundebMagisterioNoAno(),
            
            'D92' => $this->liquidadoFundebNoAno(540),
            'D93' => $this->liquidadoFundebNoAno(541),
            'D94' => $this->liquidadoFundebNoAno(542),
            'D95' => $this->liquidadoFundebNoAno(543),
            'D96' => $this->liquidadoFundebMagisterioNoAno(),
            
            'E92' => $this->pagoFundebNoAno(540),
            'E93' => $this->pagoFundebNoAno(541),
            'E94' => $this->pagoFundebNoAno(542),
            'E95' => $this->pagoFundebNoAno(543),
            'E96' => $this->pagoFundebMagisterioNoAno(),
            
            'C113' => $this->superavitFundebLimite(),
            'E113' => $this->superavitFundebAplicado1Q(),
            'F113' => $this->superavitFundebAplicadoApos1Q(),
            
            'D120' => $this->dotacaoAtualizadaMDEExcetoFundeb(),
            'D121' => $this->dotacaoAtualizadaMDEExcetoFundeb(365),
            'D122' => $this->dotacaoAtualizadaMDEExcetoFundeb(361),
            'D123' => $this->dotacaoAtualizadaMDEExcetoFundeb(366),
            'D124' => $this->dotacaoAtualizadaMDEExcetoFundeb(367),
            'D125' => $this->dotacaoAtualizadaMDEExcetoFundeb(122),
            'D126' => $this->dotacaoAtualizadaMDEExcetoFundeb(782),
            
            'E120' => $this->empenhadoMDEExcetoFundeb(),
            'E121' => $this->empenhadoMDEExcetoFundeb(365),
            'E122' => $this->empenhadoMDEExcetoFundeb(361),
            'E123' => $this->empenhadoMDEExcetoFundeb(366),
            'E124' => $this->empenhadoMDEExcetoFundeb(367),
            'E125' => $this->empenhadoMDEExcetoFundeb(122),
            'E126' => $this->empenhadoMDEExcetoFundeb(782),
            
            'F120' => $this->liquidadoMDEExcetoFundeb(),
            'F121' => $this->liquidadoMDEExcetoFundeb(365),
            'F122' => $this->liquidadoMDEExcetoFundeb(361),
            'F123' => $this->liquidadoMDEExcetoFundeb(366),
            'F124' => $this->liquidadoMDEExcetoFundeb(367),
            'F125' => $this->liquidadoMDEExcetoFundeb(122),
            'F126' => $this->liquidadoMDEExcetoFundeb(782),
            
            'G120' => $this->pagoMDEExcetoFundeb(),
            'G121' => $this->pagoMDEExcetoFundeb(365),
            'G122' => $this->pagoMDEExcetoFundeb(361),
            'G123' => $this->pagoMDEExcetoFundeb(366),
            'G124' => $this->pagoMDEExcetoFundeb(367),
            'G125' => $this->pagoMDEExcetoFundeb(122),
            'G126' => $this->pagoMDEExcetoFundeb(782),
            
            'D155' => $this->rpSaldoInicial(500, 1001) + $this->rpSaldoInicial(502, 1001),
            'D156' => $this->rpSaldoInicial(540),
            'D157' => $this->rpSaldoInicial(541) + $this->rpSaldoInicial(542) + $this->rpSaldoInicial(543),
            
            'E155' => $this->rpLiquidados(500, 1001) + $this->rpSaldoInicial(502, 1001),
            'E156' => $this->rpLiquidados(540),
            'E157' => $this->rpLiquidados(541) + $this->rpSaldoInicial(542) + $this->rpSaldoInicial(543),
            
            'F155' => $this->rpPagos(500, 1001) + $this->rpSaldoInicial(502, 1001),
            'F156' => $this->rpPagos(540),
            'F157' => $this->rpPagos(541) + $this->rpSaldoInicial(542) + $this->rpSaldoInicial(543),
            
            'G155' => $this->rpCancelados(500, 1001) + $this->rpSaldoInicial(502, 1001),
            'G156' => $this->rpCancelados(540),
            'G157' => $this->rpCancelados(541) + $this->rpSaldoInicial(542) + $this->rpSaldoInicial(543),
            
            'G165' => $this->transferenciasFndePrevisao(550),
            'G166' => $this->transferenciasFndePrevisao(551),
            'G167' => $this->transferenciasFndePrevisao(552),
            'G168' => $this->transferenciasFndePrevisao(553),
            'G169' => $this->transferenciasFndePrevisao(559),
            'G170' => $this->transferenciasFndePrevisao(570) + $this->transferenciasFndePrevisao(571) + $this->transferenciasFndePrevisao(572) + $this->transferenciasFndePrevisao(575),
            'G171' => $this->transferenciasFndePrevisao(573),
            'G172' => $this->transferenciasFndePrevisao(574),
            'G173' => $this->transferenciasFndePrevisao(576) + $this->transferenciasFndePrevisao(599),
            
            'H165' => $this->transferenciasFndeArrecadado(550),
            'H166' => $this->transferenciasFndeArrecadado(551),
            'H167' => $this->transferenciasFndeArrecadado(552),
            'H168' => $this->transferenciasFndeArrecadado(553),
            'H169' => $this->transferenciasFndeArrecadado(569),
            'H170' => $this->transferenciasFndeArrecadado(570) + $this->transferenciasFndeArrecadado(571) + $this->transferenciasFndeArrecadado(572) + $this->transferenciasFndeArrecadado(575),
            'H171' => $this->transferenciasFndeArrecadado(573),
            'H172' => $this->transferenciasFndeArrecadado(574),
            'H173' => $this->transferenciasFndeArrecadado(576) + $this->transferenciasFndeArrecadado(599),
            
            'D177' => $this->dotacaoAtualizadaOutrasEducacao(),
            'D178' => $this->dotacaoAtualizadaOutrasEducacao(365),
            'D179' => $this->dotacaoAtualizadaOutrasEducacao(361),
            'D180' => $this->dotacaoAtualizadaOutrasEducacao(362),
            'D181' => $this->dotacaoAtualizadaOutrasEducacao(364),
            'D182' => $this->dotacaoAtualizadaOutrasEducacao(363),
            'D183' => $this->dotacaoAtualizadaOutrasEducacao(366),
            'D184' => $this->dotacaoAtualizadaOutrasEducacao(367),
            
            'E177' => $this->empenhadoOutrasEducacao(),
            'E178' => $this->empenhadoOutrasEducacao(365),
            'E179' => $this->empenhadoOutrasEducacao(361),
            'E180' => $this->empenhadoOutrasEducacao(362),
            'E181' => $this->empenhadoOutrasEducacao(364),
            'E182' => $this->empenhadoOutrasEducacao(363),
            'E183' => $this->empenhadoOutrasEducacao(366),
            'E184' => $this->empenhadoOutrasEducacao(367),
            
            'F177' => $this->liquidadoOutrasEducacao(),
            'F178' => $this->liquidadoOutrasEducacao(365),
            'F179' => $this->liquidadoOutrasEducacao(361),
            'F180' => $this->liquidadoOutrasEducacao(362),
            'F181' => $this->liquidadoOutrasEducacao(364),
            'F182' => $this->liquidadoOutrasEducacao(363),
            'F183' => $this->liquidadoOutrasEducacao(366),
            'F184' => $this->liquidadoOutrasEducacao(367),
            
            'G177' => $this->pagoOutrasEducacao(),
            'G178' => $this->pagoOutrasEducacao(365),
            'G179' => $this->pagoOutrasEducacao(361),
            'G180' => $this->pagoOutrasEducacao(362),
            'G181' => $this->pagoOutrasEducacao(364),
            'G182' => $this->pagoOutrasEducacao(363),
            'G183' => $this->pagoOutrasEducacao(366),
            'G184' => $this->pagoOutrasEducacao(367),
            
            'D191' => $this->dotacaoAtualizadaEducacaoPessoalAtivo(),
            'D192' => $this->dotacaoAtualizadaEducacaoPessoalInativo(),
            'D193' => $this->dotacaoAtualizadaEducacaoTransferenciasCorrentes(),
            'D194' => $this->dotacaoAtualizadaEducacaoOutrasCorrentes(),
            'D196' => $this->dotacaoAtualizadaEducacaoTransferenciasCapital(),
            'D197' => $this->dotacaoAtualizadaEducacaoOutrasCapital(),
            
            'E191' => $this->empenhadoEducacaoPessoalAtivo(),
            'E192' => $this->empenhadoEducacaoPessoalInativo(),
            'E193' => $this->empenhadoEducacaoTransferenciasCorrentes(),
            'E194' => $this->empenhadoEducacaoOutrasCorrentes(),
            'E196' => $this->empenhadoEducacaoTransferenciasCapital(),
            'E197' => $this->empenhadoEducacaoOutrasCapital(),
            
            'F191' => $this->liquidadoEducacaoPessoalAtivo(),
            'F192' => $this->liquidadoEducacaoPessoalInativo(),
            'F193' => $this->liquidadoEducacaoTransferenciasCorrentes(),
            'F194' => $this->liquidadoEducacaoOutrasCorrentes(),
            'F196' => $this->liquidadoEducacaoTransferenciasCapital(),
            'F197' => $this->liquidadoEducacaoOutrasCapital(),
            
            'G191' => $this->pagoEducacaoPessoalAtivo(),
            'G192' => $this->pagoEducacaoPessoalInativo(),
            'G193' => $this->pagoEducacaoTransferenciasCorrentes(),
            'G194' => $this->pagoEducacaoOutrasCorrentes(),
            'G196' => $this->pagoEducacaoTransferenciasCapital(),
            'G197' => $this->pagoEducacaoOutrasCapital(),
            
            'G200' => $this->saldoInicialDisponibilidade(540),
            'H200' => $this->saldoInicialDisponibilidade(550),
            'H201' => $this->arrecadadoFonteRecurso(550),
            'H202' => $this->pagoFonteRecurso(550),
        ];
    }
    
    private function pagoFonteRecurso(int $fr): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND FONTE_RECURSO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, $fr);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadadoFonteRecurso(int $fr): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function saldoInicialDisponibilidade(int $fr): float {
        $sql = "SELECT SUM(SALDO_INICIAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND FONTE_RECURSO = %d
                        AND CONTA_CONTABIL LIKE '%s'
                        AND ESCRITURACAO LIKE 'S'"
        ;
        $query = sprintf($sql, $this->remessa, $fr, '111%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoEducacaoOutrasCapital(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'
                        AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '4%', '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoEducacaoTransferenciasCapital(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoEducacaoOutrasCorrentes(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'
                        AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '33%', '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoEducacaoTransferenciasCorrentes(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoEducacaoPessoalInativo(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND RUBRICA IN (%s)"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoEducacaoPessoalAtivo(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'
                        AND RUBRICA NOT IN (%s)"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '31%', "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoEducacaoOutrasCapital(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'
                        AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '4%', '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoEducacaoTransferenciasCapital(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoEducacaoOutrasCorrentes(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'
                        AND RUBRICA NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '33%', '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoEducacaoTransferenciasCorrentes(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoEducacaoPessoalInativo(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND RUBRICA IN (%s)"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoEducacaoPessoalAtivo(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                        AND RUBRICA LIKE '%s'
                        AND RUBRICA NOT IN (%s)"
        ;
        $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '31%', "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoEducacaoOutrasCapital(): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '4%', '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    private function empenhadoEducacaoTransferenciasCapital(): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    private function empenhadoEducacaoOutrasCorrentes(): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '33%', '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoEducacaoTransferenciasCorrentes(): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoEducacaoPessoalInativo(): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO IN(%s)"
        ;
        $query = sprintf($sql, $this->remessa, "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoEducacaoPessoalAtivo(): float {
        $sql = "SELECT SUM(VALOR_EMPENHADO)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT IN(%s)"
        ;
        $query = sprintf($sql, $this->remessa, '31%', "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaEducacaoOutrasCapital(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '4%', '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaEducacaoTransferenciasCapital(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '4450%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaEducacaoOutrasCorrentes(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '33%', '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaEducacaoTransferenciasCorrentes(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, '3350%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaEducacaoPessoalInativo(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO IN(%s)"
        ;
        $query = sprintf($sql, $this->remessa, "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizadaEducacaoPessoalAtivo(): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %d
                        AND FUNCAO = 12
                        AND ELEMENTO LIKE '%s'
                        AND ELEMENTO NOT IN(%s)"
        ;
        $query = sprintf($sql, $this->remessa, '31%', "'319001%', '319003%'");
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoOutrasEducacao(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->pagoMDEExcetoFundeb($sf);
            $fundeb_magisterio = $this->pagoDespesasFundebMagisterio($sf);
            $fundeb_outras = $this->pagoDespesasFundebOutras($sf);
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        } else {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->pagoMDEExcetoFundeb($sf);
            $fundeb_magisterio = $this->pagoDespesasFundebMagisterio($sf);
            $fundeb_outras = $this->pagoDespesasFundebOutras($sf);
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        }
    }
    
    private function liquidadoOutrasEducacao(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->liquidadoMDEExcetoFundeb();
            $fundeb_magisterio = $this->liquidadoDespesasFundebMagisterio();
            $fundeb_outras = $this->liquidadoDespesasFundebOutras();
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        } else {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->liquidadoMDEExcetoFundeb($sf);
            $fundeb_magisterio = $this->liquidadoDespesasFundebMagisterio($sf);
            $fundeb_outras = $this->liquidadoDespesasFundebOutras($sf);
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        }
    }
    
    private function empenhadoOutrasEducacao(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %d
                            AND FUNCAO = 12
                            AND ANO_EMPENHO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $ano);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->empenhadoMDEExcetoFundeb();
            $fundeb_magisterio = $this->empenhadoDespesasFundebMagisterio();
            $fundeb_outras = $this->empenhadoDespesasFundebOutras();
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        } else {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %d
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND ANO_EMPENHO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $ano);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->empenhadoMDEExcetoFundeb($sf);
            $fundeb_magisterio = $this->empenhadoDespesasFundebMagisterio($sf);
            $fundeb_outras = $this->empenhadoDespesasFundebOutras($sf);
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        }
    }
    
    private function dotacaoAtualizadaOutrasEducacao(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %d
                            AND FUNCAO = 12"
            ;
            $query = sprintf($sql, $this->remessa);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->dotacaoAtualizadaMDEExcetoFundeb();
            $fundeb_magisterio = $this->dotacaoAtualizadaDespesasFundebMagisterio();
            $fundeb_outras = $this->dotacaoAtualizadaDespesasFundebOutras();
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        } else {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %d
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $sf);
            $result = $this->con->query($query);
            $total = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $mde = $this->dotacaoAtualizadaMDEExcetoFundeb($sf);
            $fundeb_magisterio = $this->dotacaoAtualizadaDespesasFundebMagisterio($sf);
            $fundeb_outras = $this->dotacaoAtualizadaDespesasFundebOutras($sf);
            return (float) round($total - $mde - $fundeb_magisterio - $fundeb_outras, 2);
        }
    }
    
    private function transferenciasFndeArrecadado(int $fr): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function transferenciasFndePrevisao(int $fr): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpCancelados(int $fr, ?int $co = null): float {
        if(is_null($co)) {
            $sql = "SELECT SUM(RP_CANCELADO)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(RP_CANCELADO)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr, $co);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function rpPagos(int $fr, ?int $co = null): float {
        if(is_null($co)) {
            $sql = "SELECT SUM(RP_PAGO)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(RP_PAGO)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr, $co);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function rpLiquidados(int $fr, ?int $co = null): float {
        if(is_null($co)) {
            $sql = "SELECT SUM(RP_LIQUIDADO)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(RP_LIQUIDADO)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr, $co);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function rpSaldoInicial(int $fr, ?int $co = null): float {
        if(is_null($co)) {
            $sql = "SELECT SUM(RP_SALDO_INICIAL)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(RP_SALDO_INICIAL)::decimal
                    FROM PAD.RESTOS_PAGAR
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO = %d
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $fr, $co);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function pagoMDEExcetoFundeb(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1001
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1001
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function liquidadoMDEExcetoFundeb(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1001
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1001
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function empenhadoMDEExcetoFundeb(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1001
                            AND ANO_EMPENHO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $ano);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1001
                            AND ANO_EMPENHO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $ano);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function dotacaoAtualizadaMDEExcetoFundeb(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO IN (500, 502)"
            ;
            $query = sprintf($sql, $this->remessa);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO IN (500, 502)"
            ;
            $query = sprintf($sql, $this->remessa, $sf);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function superavitFundebAplicadoApos1Q(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_final = sprintf('%s-04-30', $ano);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO = 540
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA = 502
                        AND DATA_LIQUIDACAO > '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $data_final);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function superavitFundebAplicado1Q(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = sprintf('%s-04-30', $ano);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO = 540
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA = 502
                        AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, $data_inicial, $data_final);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function superavitFundebLimite(): float {
        $ano = (int) substr($this->remessa, 0, 4) - 1;
        $remessa_anterior = $ano.'12';
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal * 0.1
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND FONTE_RECURSO = 540"
        ;
        $query = sprintf($sql, $remessa_anterior);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoFundebMagisterioNoAno(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO BETWEEN 540 AND 543
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA != 502
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '31%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoFundebNoAno(int $fr): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                FROM PAD.PAGAMENTO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO = %d
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA != 502"
        ;
        $query = sprintf($sql, $this->remessa, $fr, $ano);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    private function liquidadoFundebMagisterioNoAno(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO BETWEEN 540 AND 543
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA != 502
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '31%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidadoFundebNoAno(int $fr): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                FROM PAD.LIQUIDACAO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO = %d
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA != 502"
        ;
        $query = sprintf($sql, $this->remessa, $fr, $ano);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoFundebMagisterioNoAno(): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                FROM PAD.EMPENHO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO BETWEEN 540 AND 543
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA != 502
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                        AND RUBRICA LIKE '%s'"
        ;
        $query = sprintf($sql, $this->remessa, $ano, '31%');
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhadoFundebNoAno(int $fr): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                FROM PAD.EMPENHO
                WHERE REMESSA = %s
                        AND FUNCAO = 12
                        AND FONTE_RECURSO = %d
                        AND ANO_EMPENHO = %d
                        AND CARACTERISTICA_PECULIAR_DESPESA != 502"
        ;
        $query = sprintf($sql, $this->remessa, $fr, $ano);
        $result = $this->con->query($query);
        return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pagoDespesasFundebMagisterio(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '31%');
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final, '31%');
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function pagoDespesasFundebOutras(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND DATA_PAGAMENTO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function liquidadoDespesasFundebMagisterio(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final, '31%');
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final, '31%');
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function liquidadoDespesasFundebOutras(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        $data_inicial = sprintf('%s-01-01', $ano);
        $data_final = $this->dataBase->format('Y-m-d');
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND DATA_LIQUIDACAO BETWEEN '%s' AND '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $data_inicial, $data_final);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function empenhadoDespesasFundebMagisterio(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $ano, '31%');
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = 1070
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $ano, '31%');
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function empenhadoDespesasFundebOutras(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND ANO_EMPENHO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $ano);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        } else {
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND ANO_EMPENHO = %d"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $ano);
            $result = $this->con->query($query);
            return (float) round(array_sum(pg_fetch_all_columns($result, 0)), 2);
        }
    }
    
    private function dotacaoAtualizadaDespesasFundebMagisterio(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND ELEMENTO LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, '31%');
            $result = $this->con->query($query);
            $dotacao31 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $ano, '31%');
            $result = $this->con->query($query);
            $empenhado31outros = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            return (float) round($dotacao31 - $empenhado31outros, 2);
        } else {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND ELEMENTO LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, '31%');
            $result = $this->con->query($query);
            $dotacao31 = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO != 1070
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'"
            ;
            $query = sprintf($sql, $this->remessa, $sf, $ano, '31%');
            $result = $this->con->query($query);
            $empenhado31outros = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            return (float) round($dotacao31 - $empenhado31outros, 2);
        }
    }
    
    private function dotacaoAtualizadaDespesasFundebOutras(?int $sf = null): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($sf)) {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND FONTE_RECURSO BETWEEN 540 AND 543"
            ;
            $query = sprintf($sql, $this->remessa);
            $result = $this->con->query($query);
            $dotacao = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $magisterio = $this->dotacaoAtualizadaDespesasFundebMagisterio($sf);
            return (float) round($dotacao - $magisterio, 2);
        } else {
            $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                    FROM PAD.BAL_DESP
                    WHERE REMESSA = %s
                            AND FUNCAO = 12
                            AND SUBFUNCAO = %d
                            AND FONTE_RECURSO BETWEEN 540 AND 543"
            ;
            $query = sprintf($sql, $this->remessa, $sf);
            $result = $this->con->query($query);
            $dotacao = round(array_sum(pg_fetch_all_columns($result, 0)), 2);
            $magisterio = $this->dotacaoAtualizadaDespesasFundebMagisterio($sf);
            return (float) round($dotacao - $magisterio, 2);
        }
    }
    
    private function superavitFundebAnoAnterior(): float {
        $sql = "SELECT SUM(SALDO_INICIAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND ESCRITURACAO LIKE 'S'
                        AND CONTA_CONTABIL LIKE '%s'
                        AND FONTE_RECURSO BETWEEN 540 AND 543"
        ;
        $query = sprintf($sql, $this->remessa, '82111%');
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoFundebRecebido(string $nro, int $fr): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $nro, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoAtualizadaFundebRecebido(string $nro, int $fr): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $nro, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoReceitaResultanteImpostos(string $nro): float {
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
    
    private function previsaoAtualizadaReceitaResultanteImpostos(string $nro): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        --AND CARACTERISTICA_PECULIAR_RECEITA != 105"
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
