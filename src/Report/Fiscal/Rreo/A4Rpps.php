<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 4 - Receitas e Despesas Previdenciárias
 *
 * @author Everton
 */
final class A4Rpps extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A4', $con, $spreadsheet, $remessa);
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
            'F16' => $this->previsaoAtualizadaReceita('1215011%', 800),
            'F17' => $this->previsaoAtualizadaReceita('1215012%', 800),
            'F18' => $this->previsaoAtualizadaReceita('1215013%', 800),
            'F20' => round($this->previsaoAtualizadaReceita('1215021%', 800) + $this->previsaoAtualizadaReceita('1215511%', 800), 2),
            'F21' => $this->previsaoAtualizadaReceita('1215501%', 800),
            'F22' => $this->previsaoAtualizadaReceita('1215502%', 800),
            'F23' => $this->previsaoAtualizadaReceita('13%', 800),
            'F24' => $this->previsaoAtualizadaReceita('131%', 800),
            'F25' => $this->previsaoAtualizadaReceita('132%', 800),
            'F27' => $this->previsaoAtualizadaReceita('16%', 800),
            'F28' => $this->previsaoAtualizadaReceita('19%', 800),
            'F29' => $this->previsaoAtualizadaReceita('199903%', 800),
            'F30' => 0.0,
            'F32' => $this->previsaoAtualizadaReceita('2%', 800),
            'F33' => $this->previsaoAtualizadaReceita('22%', 800),
            'F34' => $this->previsaoAtualizadaReceita('23%', 800),
            
            'G16' => $this->arrecadacaoReceita('1215011%', 800),
            'G17' => $this->arrecadacaoReceita('1215012%', 800),
            'G18' => $this->arrecadacaoReceita('1215013%', 800),
            'G20' => round($this->arrecadacaoReceita('1215021%', 800) + $this->arrecadacaoReceita('1215511%', 800), 2),
            'G21' => $this->arrecadacaoReceita('1215501%', 800),
            'G22' => $this->arrecadacaoReceita('1215502%', 800),
            'G23' => $this->arrecadacaoReceita('13%', 800),
            'G24' => $this->arrecadacaoReceita('131%', 800),
            'G25' => $this->arrecadacaoReceita('132%', 800),
            'G27' => $this->arrecadacaoReceita('16%', 800),
            'G28' => $this->arrecadacaoReceita('19%', 800),
            'G29' => $this->arrecadacaoReceita('199903%', 800),
            'G30' => 0.0,
            'G32' => $this->arrecadacaoReceita('2%', 800),
            'G33' => $this->arrecadacaoReceita('22%', 800),
            'G34' => $this->arrecadacaoReceita('23%', 800),
            
            'C43' => $this->dotacaoAtualizada('319001%', [800]),
            'C44' => $this->dotacaoAtualizada('319003%', [800]),
            'C45' => $this->dotacaoAtualizada('33%', [800]),
            'C46' => $this->dotacaoAtualizada('339086%', [800]),
            
            'D43' => $this->empenhado('319001%', [800], [1111, 1121]),
            'D44' => $this->empenhado('319003%', [800], [1111, 1121]),
            'D45' => $this->empenhado('33%', [800], null),
            'D46' => $this->empenhado('339086%', [800], null),
            
            'E43' => $this->liquidado('319001%', [800], [1111, 1121]),
            'E44' => $this->liquidado('319003%', [800], [1111, 1121]),
            'E45' => $this->liquidado('33%', [800], null),
            'E46' => $this->liquidado('339086%', [800], null),
            
            'F43' => $this->pago('319001%', [800], [1111, 1121]),
            'F44' => $this->pago('319003%', [800], [1111, 1121]),
            'F45' => $this->pago('33%', [800], null),
            'F46' => $this->pago('339086%', [800], null),
            
            'F53' => 0.0,
            
            'F56' => $this->dotacaoAtualizada('9%', [800, 801, 802, 803]),
            
            'F59' => round(
                    $this->arrecadacaoReceita('1215021102%', 800)
                    + $this->arrecadacaoReceita('12155012%', 800)
                    + $this->arrecadacaoReceita('12155022%', 800)
                    , 2),
            
            'F60' => 0.0,
            'F61' => 0.0,
            'F62' => 0.0,

            'F65' => $this->caixaPrevidenciario(),
            'F66' => $this->investimentosPrevidenciario(),
            'F67' => round(
                    $this->saldoContabilFinal('112%')
                    + $this->saldoContabilFinal('113%')
                    + $this->saldoContabilFinal('1211206%')
                    , 2),
        
            'F73' => $this->previsaoAtualizadaReceita('1%', 802),
            'G73' => $this->arrecadacaoReceita('1%', 802),
            
            'C81' => $this->dotacaoAtualizada('31%', [802]),
            'C82' => $this->dotacaoAtualizada('33%', [802]),
            'C83' => $this->dotacaoAtualizada('4%', [802]),
            
            'D81' => $this->empenhado('31%', [802], null),
            'D82' => $this->empenhado('33%', [802], null),
            'D83' => $this->empenhado('4%', [802], null),
            
            'E81' => $this->liquidado('31%', [802], null),
            'E82' => $this->liquidado('33%', [802], null),
            'E83' => $this->liquidado('4%', [802], null),
            
            'F81' => $this->pago('31%', [802], null),
            'F82' => $this->pago('33%', [802], null),
            'F83' => $this->pago('4%', [802], null),
            
            'F89' => $this->caixaAdm(),
            'F90' => $this->investimentosAdm(),
            'F91' => 0.0,
            
            'F97' => 0.0,
            'F98' => 0.0,
            
            'G97' => 0.0,
            'G98' => 0.0,
            
            'C105' => 0.0,
            'C106' => 0.0,
            'C107' => 0.0,
            
            'D105' => 0.0,
            'D106' => 0.0,
            'D107' => 0.0,
            
            'E105' => 0.0,
            'E106' => 0.0,
            'E107' => 0.0,
            
            'F105' => 0.0,
            'F106' => 0.0,
            'F107' => 0.0,
            
        ];
        
    }
    
    private function investimentosAdm(): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '114%%'
                        AND ESCRITURACAO LIKE 'S'
                        AND FONTE_RECURSO = 802"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function caixaAdm(): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '111%%'
                        AND ESCRITURACAO LIKE 'S'
                        AND FONTE_RECURSO = 802"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function saldoContabilFinal(string $cc): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '%s'
                        AND ESCRITURACAO LIKE 'S'"
        ;
        $query = sprintf($sql, $this->remessa, $cc);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function investimentosPrevidenciario(): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '114%%'
                        AND ESCRITURACAO LIKE 'S'
                        AND FONTE_RECURSO = 800"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function caixaPrevidenciario(): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '111%%'
                        AND ESCRITURACAO LIKE 'S'
                        AND FONTE_RECURSO = 800"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pago(string $ndo, array $fr, ?array $co): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($co)){
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND FONTE_RECURSO IN (%s)"
            ;
            $query = sprintf($sql, $this->remessa, $ano, $ndo, join(', ', $fr));
        }else{
            $sql = "SELECT SUM(VALOR_PAGAMENTO)::decimal
                    FROM PAD.PAGAMENTO
                    WHERE REMESSA = %s
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND FONTE_RECURSO IN (%s)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO IN(%s)"
            ;
            $query = sprintf($sql, $this->remessa, $ano, $ndo, join(', ', $fr), join(', ', $co));
        }
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function liquidado(string $ndo, array $fr, ?array $co): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($co)){
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND FONTE_RECURSO IN (%s)"
            ;
            $query = sprintf($sql, $this->remessa, $ano, $ndo, join(', ', $fr));
        }else{
            $sql = "SELECT SUM(VALOR_LIQUIDACAO)::decimal
                    FROM PAD.LIQUIDACAO
                    WHERE REMESSA = %s
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND FONTE_RECURSO IN (%s)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO IN(%s)"
            ;
            $query = sprintf($sql, $this->remessa, $ano, $ndo, join(', ', $fr), join(', ', $co));
        }
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function empenhado(string $ndo, array $fr, ?array $co): float {
        $ano = (int) substr($this->remessa, 0, 4);
        if(is_null($co)){
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND FONTE_RECURSO IN (%s)"
            ;
            $query = sprintf($sql, $this->remessa, $ano, $ndo, join(', ', $fr));
        }else{
            $sql = "SELECT SUM(VALOR_EMPENHO)::decimal
                    FROM PAD.EMPENHO
                    WHERE REMESSA = %s
                            AND ANO_EMPENHO = %d
                            AND RUBRICA LIKE '%s'
                            AND FONTE_RECURSO IN (%s)
                            AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO IN(%s)"
            ;
            $query = sprintf($sql, $this->remessa, $ano, $ndo, join(', ', $fr), join(', ', $co));
        }
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function dotacaoAtualizada(string $ndo, array $fr): float {
        $sql = "SELECT SUM(DOTACAO_ATUALIZADA)::decimal
                FROM PAD.BAL_DESP
                WHERE REMESSA = %s
                        AND ELEMENTO LIKE '%s'
                        AND FONTE_RECURSO IN (%s)"
        ;
        $query = sprintf($sql, $this->remessa, $ndo, join(', ', $fr));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadacaoReceita(string $nro, int $fr): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND FONTE_RECURSO = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'"
        ;
        $query = sprintf($sql, $this->remessa, $nro, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsaoAtualizadaReceita(string $nro, int $fr): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND FONTE_RECURSO = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'"
        ;
        $query = sprintf($sql, $this->remessa, $nro, $fr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    
}
