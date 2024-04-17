<?php

namespace RptGen\Report\Fiscal;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;
use RptGen\Report\ReportBase;

/**
 * Base para relatórios fiscais.
 *
 * @author Everton
 */
abstract class FiscalBase extends ReportBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct($con, $spreadsheet, $remessa);
        $this->setDataBaseParametro();
    }

    private function setDataBaseParametro(): void {
        $sheet_name = 'Parâmetros';
        $cell_address = 'C4';
        $data_base = $this->dataBase->format('d/m/Y');
        printf("\t-> salvando parâmetro: data_base %s" . PHP_EOL, $data_base);

        $sheet = $this->spreadsheet->setActiveSheetIndexByName($sheet_name);

        $sheet->setCellValue($cell_address, $data_base);
    }

    public function getCompetenciaStr(int $ano, int $mes): string {
        $meses = [
            1 => 'janeiro',
            2 => 'fevereiro',
            3 => 'março',
            4 => 'abril',
            5 => 'maio',
            6 => 'junho',
            7 => 'julho',
            8 => 'agosto',
            9 => 'setembro',
            10 => 'outubro',
            11 => 'novembro',
            12 => 'dezembro',
        ];

        return sprintf('%s de %s', $meses[$mes], $ano);
    }
}
