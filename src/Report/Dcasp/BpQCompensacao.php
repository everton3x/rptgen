<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Palanço Patrimonial - quadro das contas de compensação
 *
 * @author Everton
 */
final class BpQCompensacao extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BP Q2', $con, $spreadsheet, $remessa, $escopo);
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
            'C12' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8111%'),
            'C13' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8112%'),
            'C14' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8113%'),
            'C15' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8119%'),
            'C19' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8121%'),
            'C20' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8122%'),
            'C21' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8123%'),
            'C22' => $this->readSql('dcasp/bp/q2/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '8129%'),
            
            'D12' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8111%'),
            'D13' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8112%'),
            'D14' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8113%'),
            'D15' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8119%'),
            'D19' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8121%'),
            'D20' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8122%'),
            'D21' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8123%'),
            'D22' => $this->readSql('dcasp/bp/q2/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '8129%'),
        ];
    }
    
    
}
