<?php

namespace RptGen\Report;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * Classe base para os relatórios
 *
 * @author Everton
 */
abstract class ReportBase {

    protected readonly Db $con;
    protected readonly Spreadsheet $spreadsheet;
    protected readonly int $remessa;
    protected DateTime $dataBase;

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        $this->con = $con;
        $this->spreadsheet = $spreadsheet;
        $this->remessa = $remessa;
    }

    public static function getDataBaseFromRemessa(int $remessa): DateTime {
        $dt = date_create_from_format('Ym', $remessa);
        if ($dt === false)
            trigger_error("Falha ao criar data base para a remessa $remessa", E_USER_ERROR);
        $data_base = $dt->modify('last day of this month');
        if ($data_base === false)
            trigger_error("Falha ao encontrar o último dia do mês para a data-base {$data_base->format('d/m/Y')} para a remessa $remessa", E_USER_ERROR);
        return $data_base;
    }

    public static function removeSheets(Spreadsheet $spreadsheet, array $sheetNames): void {
        foreach ($sheetNames as $sheetName) {
            $sheetIndex = $spreadsheet->getIndex(
                    $spreadsheet->getSheetByName($sheetName)
            );
            $spreadsheet->removeSheetByIndex($sheetIndex);
        }
    }
    
    protected function readSql(string $file, string|int ...$params): float {
        $sql = file_get_contents("./sql/$file.sql");
        if($sql === false) trigger_error("$file não encontrado!", E_USER_ERROR);
        $query = sprintf($sql, ...$params);
//        echo $query, PHP_EOL;
        $result = $this->con->query($query);
//        var_dump(pg_fetch_all_columns($result, 0));exit();
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    abstract public function run(): void;

    abstract protected function getCellMap(): array;
}
