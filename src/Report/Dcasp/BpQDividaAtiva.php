<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Palanço Patrimonial - quadro da dívida ativa
 *
 * @author Everton
 */
final class BpQDividaAtiva extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BP Q5', $con, $spreadsheet, $remessa, $escopo);
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
            // Curto Prazo
            'C12' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125101%'),
            'C13' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125102%'),
            'C14' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125103%'),
            'C15' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125104%'),
            'C16' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125105%'),
            'C17' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125106%'),
            'C18' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1125199%'),
            'C19' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1126%'),
            // Longo Prazo
            'D12' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040101%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040105%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040106%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040107%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040108%'),
            'D13' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040109%')
            + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040110%')
            + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040111%'),
            'D14' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '12111040701%'),
            'D15' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '121110406%'),
            'D16' => 0.0,
            'D17' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '121110402%'),
            'D18' => 0.0,
            'D19' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1211105%'),
            
            
            
        ];
    }
}
