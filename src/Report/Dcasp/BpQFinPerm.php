<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Palanço Patrimonial - quadro de ativos e passivos financeiros e permanentes
 *
 * @author Everton
 */
final class BpQFinPerm extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BP Q1', $con, $spreadsheet, $remessa, $escopo);
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
            //Ativo financeiro
            'C12' => $this->readSql('dcasp/bp/q1/AtivoFinanceiroAtual', $this->consolidado, $this->remessa, $this->entidades),
            'D12' => $this->readSql('dcasp/bp/q1/AtivoFinanceiroAnterior', $this->consolidado, $this->remessa, $this->entidades),
            //Ativo permanente
            'C13' => $this->readSql('dcasp/bp/q1/AtivoPermanenteAtual', $this->consolidado, $this->remessa, $this->entidades),
            'D13' => $this->readSql('dcasp/bp/q1/AtivoPermanenteAnterior', $this->consolidado, $this->remessa, $this->entidades),
            //Passivo financeiro
            'C17' => $this->readSql('dcasp/bp/q1/PassivoFinanceiroAtual', $this->consolidado, $this->remessa, $this->entidades, $this->consolidado, $this->remessa, $this->entidades, $this->consolidado, $this->remessa, $this->entidades),
            'D17' => $this->readSql('dcasp/bp/q1/PassivoFinanceiroAnterior', $this->consolidado, $this->remessa, $this->entidades, $this->consolidado, $this->remessa, $this->entidades),
            //Passivo premanente
            'C18' => $this->readSql('dcasp/bp/q1/PassivoPermanenteAtual', $this->consolidado, $this->remessa, $this->entidades),
            'D18' => $this->readSql('dcasp/bp/q1/PassivoPermanenteAnterior', $this->consolidado, $this->remessa, $this->entidades),
        ];
    }
}
