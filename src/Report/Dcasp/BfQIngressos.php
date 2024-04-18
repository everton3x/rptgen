<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Financeiro - Quadro dos ingressos
 *
 * @author Everton
 */
final class BfQIngressos extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BF Q0A', $con, $spreadsheet, $remessa, $escopo);
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
            
            //Transferências financeiras
            'C24' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '4511%'),
            'C25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '4512201%'),
            'C26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '4513%'),
            // Extraorçamentário
            'C30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '5317%'),
            'C31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '5327%'),
            'C32' => $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '1132306%'),
            'C33' => 0.0,
            
            // Saldos
            'C37' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C38' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '2188%'),
            
            //Transferências financeiras
            'D24' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '4511%'),
            'D25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '4512201%'),
            'D26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '4513%'),
            // Extraorçamentário
            'D30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '5317%'),
            'D31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '5327%'),
            'D32' => $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1132306%'),
            'D33' => 0.0,
            
            // Saldos
            'D37' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '114%'),
            'D38' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%'),

        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
