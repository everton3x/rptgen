<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Financeiro - Quadro dos dispêndios
 *
 * @author Everton
 */
final class BfQDispendios extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BF Q0B', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Despesa orçamentária
            'C14' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 500, 502),
            'C16' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 540, 599),
            'C17' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 600, 659),
            'C18' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 800, 803),
            'C19' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 660, 669),
            'C20' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 700, 799),
            
            //Transferências financeiras
            'C24' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '3511%'),
            'C25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '3512201%'),
            'C26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '3513%'),
            // Extraorçamentário
            'C30' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '6314%'),
            'C31' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '6322%'),
            'C32' => $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '1132306%'),
            'C33' => 0.0,
            
            // Saldos
            'C37' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C38' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '2188%'),
            
            
            // Despesa orçamentária
            'D14' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 500, 502),
            'D16' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 540, 599),
            'D17' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 600, 659),
            'D18' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 800, 803),
            'D19' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 660, 669),
            'D20' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 700, 799),
            //Transferências financeiras
            'D24' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '3511%'),
            'D25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '3512201%'),
            'D26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '3513%'),
            // Extraorçamentário
            'D30' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '6314%'),
            'D31' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '6322%'),
            'D32' => $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1132306%'),
            'D33' => 0.0,
            
            // Saldos
            'D37' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '114%'),
            'D38' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%'),

        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
