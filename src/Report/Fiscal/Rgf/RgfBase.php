<?php

namespace RptGen\Report\Fiscal\Rgf;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;
use RptGen\Report\Fiscal\FiscalBase;

/**
 * Classe base para anexos do RREO
 *
 * @author Everton
 */
abstract class RgfBase extends FiscalBase {

    protected readonly string $sheetName;
    public readonly int $semestre;

    public function __construct(string $sheetName, Db $con, Spreadsheet $spreadsheet, int $remessa) {
        $this->sheetName = $sheetName;
        $this->semestre = self::getSemestreFromRemessa($remessa);
        $this->dataBase = self::getDataBaseFromRemessa($remessa);
        parent::__construct($con, $spreadsheet, $remessa);
    }

    public static function getSemestreFromRemessa(int $remessa): int {
        $mes = (int) substr($remessa, 4, 2);
        switch ($mes) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                return 1;
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
                return 2;
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
