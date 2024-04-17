<?php

namespace RptGen\Report\Fiscal\Rgf;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RFG Executivo, Anexo 2 - Dívida Consolidada
 *
 * @author Everton
 */
final class A2Dc extends RgfBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RGF A2', $con, $spreadsheet, $remessa);
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
            
            'C13' => 0.0,
            'C16' => 0.0,
            'C17' => 0.0,
            'C20' => 0.0,
            'C21' => 0.0,
            'C23' => 0.0,
            'C24' => round($this->saldoContabilInicial('2114202%')+$this->saldoContabilInicial('22142%'), 2),
            'C25' => 0.0,
            'C26' => 0.0,
            'C27' => 0.0,
            'C28' => 0.0,
            'C29' => 0.0,
            'C30' => 0.0,
            
            'D13' => 0.0,
            'D16' => 0.0,
            'D17' => 0.0,
            'D20' => 0.0,
            'D21' => 0.0,
            'D23' => 0.0,
            'D24' => round($this->saldoContabilFinal('2114202%')+$this->saldoContabilFinal('22142%'), 2),
            'D25' => 0.0,
            'D26' => 0.0,
            'D27' => 0.0,
            'D28' => 0.0,
            'D29' => 0.0,
            'D30' => 0.0,
            
            'E13' => 0.0,
            'E16' => 0.0,
            'E17' => 0.0,
            'E20' => 0.0,
            'E21' => 0.0,
            'E23' => 0.0,
            'E24' => $this->semestreZerado(round($this->saldoContabilFinal('2114202%')+$this->saldoContabilFinal('22142%'), 2)),
            'E25' => 0.0,
            'E26' => 0.0,
            'E27' => 0.0,
            'E28' => 0.0,
            'E29' => 0.0,
            'E30' => 0.0,
            
            'C33' => round(
                    $this->saldoContabilInicial('1111101%')
                    + $this->saldoContabilInicial('1111102%')
                    + $this->saldoContabilInicial('1111119%')
                    + $this->saldoContabilInicial('1111130%')
                    + $this->saldoContabilInicial('1111150%')
                    + $this->saldoContabilInicial('1112101%')
                    + $this->saldoContabilInicial('1112102%')
                    + $this->saldoContabilInicial('1112103%')
                    + $this->saldoContabilInicial('11131%')
                    , 2),
            
            'D33' => round(
                    $this->saldoContabilFinal('1111101%')
                    + $this->saldoContabilFinal('1111102%')
                    + $this->saldoContabilFinal('1111119%')
                    + $this->saldoContabilFinal('1111130%')
                    + $this->saldoContabilFinal('1111150%')
                    + $this->saldoContabilFinal('1112101%')
                    + $this->saldoContabilFinal('1112102%')
                    + $this->saldoContabilFinal('1112103%')
                    + $this->saldoContabilFinal('11131%')
                    , 2),
            
            'E33' => $this->semestreZerado(round(
                    $this->saldoContabilFinal('1111101%')
                    + $this->saldoContabilFinal('1111102%')
                    + $this->saldoContabilFinal('1111119%')
                    + $this->saldoContabilFinal('1111130%')
                    + $this->saldoContabilFinal('1111150%')
                    + $this->saldoContabilFinal('1112101%')
                    + $this->saldoContabilFinal('1112102%')
                    + $this->saldoContabilFinal('1112103%')
                    + $this->saldoContabilFinal('11131%')
                    , 2)),
            
            'C34' => $this->rppInicial(),
            'D34' => $this->rppFinal(),
            'E34' => $this->semestreZerado($this->rppFinal()),
            
            'C35' => $this->saldoContabilInicialPm('2188%'),
            'D35' => $this->saldoContabilFinalPm('2188%'),
            'E35' => $this->semestreZerado($this->saldoContabilFinalPm('2188%')),
            
            'C36' => 0.0,
            'D36' => 0.0,
            'E36' => 0.0,
            
            'C48' => 0.0,
            'C49' => round(
                    $this->saldoContabilInicialPm('211110503%')
                    + $this->saldoContabilInicialPm('221110403%')
                    , 2),
            'C50' => $this->saldoContabilInicial('2272%'),
            'C51' => $this->rpnpInicial(),
            'C52' => 0.0,
            'C53' => 0.0,
            'C54' => 0.0,
            
            'D48' => 0.0,
            'D49' => round(
                    $this->saldoContabilFinalPm('211110503%')
                    + $this->saldoContabilFinalPm('221110403%')
                    , 2),
            'D50' => $this->saldoContabilFinal('2272%'),
            'D51' => $this->rpnpFinal(),
            'D52' => 0.0,
            'D53' => 0.0,
            'D54' => 0.0,
            
            'E48' => $this->semestreZerado(0.0),
            'E49' => $this->semestreZerado(round(
                    $this->saldoContabilFinalPm('211110503%')
                    + $this->saldoContabilFinalPm('221110403%')
                    , 2)),
            'E50' => $this->semestreZerado($this->saldoContabilFinal('2272%')),
            'E51' => $this->semestreZerado($this->rpnpFinal()),
            'E52' => $this->semestreZerado(0.0),
            'E53' => $this->semestreZerado(0.0),
            'E54' => $this->semestreZerado(0.0),
            
        ];
    }
    
    private function rpnpFinal(): float {
        $sql = "SELECT SUM(SALDO_FINAL_NAO_PROCESSADO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND ENTIDADE IN ('pm', 'fpsm')
                        AND RUBRICA NOT LIKE '__91%%'
                        AND RUBRICA NOT LIKE '32%%'
                        AND RUBRICA NOT LIKE '46%%'
                        AND FONTE_RECURSO NOT IN (800, 801, 802)
                        "
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rpnpInicial(): float {
        $sql = "SELECT SUM(SALDO_INICIAL_NAO_PROCESSADO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND ENTIDADE IN ('pm', 'fpsm')
                        AND RUBRICA NOT LIKE '__91%%'
                        AND RUBRICA NOT LIKE '32%%'
                        AND RUBRICA NOT LIKE '46%%'
                        AND FONTE_RECURSO NOT IN (800, 801, 802)
                        "
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function saldoContabilFinalPm(string $cc): float {
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '%s'
                        AND ESCRITURACAO LIKE 'S'
                        AND ENTIDADE LIKE 'pm'"
        ;
        $query = sprintf($sql, $this->remessa, $cc);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function saldoContabilInicialPm(string $cc): float {
        $sql = "SELECT SUM(SALDO_INICIAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '%s'
                        AND ESCRITURACAO LIKE 'S'
                        AND ENTIDADE LIKE 'pm'"
        ;
        $query = sprintf($sql, $this->remessa, $cc);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rppFinal(): float {
        $sql = "SELECT SUM(SALDO_FINAL_PROCESSADO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND ENTIDADE IN ('pm', 'fpsm')
                        AND RUBRICA NOT LIKE '__91%%'
                        AND RUBRICA NOT LIKE '32%%'
                        AND RUBRICA NOT LIKE '46%%'
                        AND FONTE_RECURSO NOT IN (800, 801, 802)
                        "
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function rppInicial(): float {
        $sql = "SELECT SUM(SALDO_INICIAL_PROCESSADO)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND ENTIDADE IN ('pm', 'fpsm')
                        AND RUBRICA NOT LIKE '__91%%'
                        AND RUBRICA NOT LIKE '32%%'
                        AND RUBRICA NOT LIKE '46%%'
                        AND FONTE_RECURSO NOT IN (800, 801, 802)
                        "
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function semestreZerado(float $valor): float {
        if(RgfBase::getSemestreFromRemessa($this->remessa) === 1) return 0.0;
        return $valor;
    }
    
    private function saldoContabilFinal(string $cc): float {
        
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '%s'
                        AND ESCRITURACAO LIKE 'S'
                        AND ENTIDADE IN ('pm', 'fpsm')"
        ;
        $query = sprintf($sql, $this->remessa, $cc);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function saldoContabilInicial(string $cc): float {
        $sql = "SELECT SUM(SALDO_INICIAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '%s'
                        AND ESCRITURACAO LIKE 'S'
                        AND ENTIDADE IN ('pm', 'fpsm')"
        ;
        $query = sprintf($sql, $this->remessa, $cc);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
}
