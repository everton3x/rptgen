<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Palanço Patrimonial - quadro do ativo imobilziado
 *
 * @author Everton
 */
final class BpQImobilizado extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BP Q4', $con, $spreadsheet, $remessa, $escopo);
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
            // Saldo bruto
            'C12' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231101%'),
            'C13' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231102%'),
            'C14' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231103%'),
            'C15' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231104%'),
            'C16' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231105%'),
            'C17' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231106%'),
            'C18' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231107%'),
            'C19' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231108%'),
            'C20' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231109%'),
            'C21' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231110%'),
            'C22' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231111%'),
            'C23' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1231199%'),
            'C25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232101%'),
            'C26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232104%'),
            'C27' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232105%'),
            'C28' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232106%'),
            'C29' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232107%'),
            'C30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232108%'),
            'C31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232109%'),
            'C32' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1232199%'),
            // Depreciação
            'D12' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810101%') * -1,
            'D13' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810102%') * -1,
            'D14' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810103%') * -1,
            'D15' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810104%') * -1,
            'D16' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810105%') * -1,
            'D17' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810106%') * -1,
            'D18' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810107%') * -1,
            'D19' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810108%') * -1,
            'D20' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810109%') * -1,
            'D21' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810110%') * -1,
            'D22' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810111%') * -1,
            'D23' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810199%') * -1,
            'D25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810201%') * -1,
            'D26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810204%') * -1,
            'D27' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810205%') * -1,
            'D28' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810206%') * -1,
            'D29' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810207%') * -1,
            'D30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810208%') * -1,
            'D31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810209%') * -1,
            'D32' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123810299%') * -1,
            
        ];
    }
}
