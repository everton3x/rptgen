<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;
use RptGen\Report\Fiscal\FiscalBase;

/**
 * Classe base para anexos do RGF
 *
 * @author Everton
 */
abstract class RreoBase extends FiscalBase {

    protected readonly string $sheetName;
    public readonly int $bimestre;

    public function __construct(string $sheetName, Db $con, Spreadsheet $spreadsheet, int $remessa) {
        $this->sheetName = $sheetName;
        $this->bimestre = self::getBimestreFromRemessa($remessa);
        $this->dataBase = self::getDataBaseFromRemessa($remessa);
        parent::__construct($con, $spreadsheet, $remessa);
    }

    public static function getBimestreFromRemessa(int $remessa): int {
        $mes = (int) substr($remessa, 4, 2);
        switch ($mes) {
            case 1:
            case 2:
                return 1;
            case 3:
            case 4:
                return 2;
            case 5:
            case 6:
                return 3;
            case 7:
            case 8:
                return 4;
            case 9:
            case 10:
                return 5;
            case 11:
            case 12:
                return 6;
        }
    }

    public function run(): void {
        printf("\t-> gerando planilha %s" . PHP_EOL, $this->sheetName);

        $sheet = $this->spreadsheet->setActiveSheetIndexByName($this->sheetName);

        foreach ($this->getCellMap() as $cellAddress => $cellValue) {
            $sheet->setCellValue($cellAddress, $cellValue);
        }
    }
}
