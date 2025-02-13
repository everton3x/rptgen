<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 9 - Demonstrativo das Receitas de Operações de Crédito e Despesas de Capital
 *
 * @author Everton
 */
final class A9OperacaoCredito extends RreoBase
{

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa)
    {
        parent::__construct('RREO A9', $con, $spreadsheet, $remessa);
    }

    public function run(): void
    {
        printf("\t-> gerando planilha %s" . PHP_EOL, $this->sheetName);

        $sheet = $this->spreadsheet->setActiveSheetIndexByName($this->sheetName);

        foreach ($this->getCellMap() as $cellAddress => $cellValue) {
            $sheet->setCellValue($cellAddress, $cellValue);
        }
    }

    protected function getCellMap(): array
    {
        return [];
    }


}
