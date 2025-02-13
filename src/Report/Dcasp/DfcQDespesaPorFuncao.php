<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - DFC - Quadro dos desembolsos por função
 *
 * @author Everton
 */
final class DfcQDespesaPorFuncao extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('DFC Q2', $con, $spreadsheet, $remessa, $escopo);
    }

    public function run(): void {
        printf("\t-> gerando planilha %s" . PHP_EOL, $this->sheetName);

        $sheet = $this->spreadsheet->setActiveSheetIndexByName($this->sheetName);

        foreach ($this->getCellMap() as $cellAddress => $cellValue) {
            $sheet->setCellValue($cellAddress, $cellValue);
        }
    }

    protected function getCellMap(): array {
        $ano = substr($this->remessa, 0, 4);
        $data_inicial = (date_create_from_format('Y-m-d', "$ano-01-01"))->format('Y-m-d');
        $data_final = $this->dataBase->format('Y-m-d');
        $ano_anterior = substr($this->getRemessaAnoAnterior(), 0, 4);
        $data_inicial_anterior = "$ano_anterior-01-01";
        $data_final_anterior = "$ano_anterior-12-31";
        return [
            
            
            'C11' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 1)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 1),
            'C12' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 2)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 2),
            'C13' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 3)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 3),
            'C14' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 4)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 4),
            'C15' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 5)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 5),
            'C16' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 6)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 6),
            'C17' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 7)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 7),
            'C18' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 8)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 8),
            'C19' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 9)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 9),
            'C20' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 10)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 10),
            'C21' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 11)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 11),
            'C22' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 12)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 12),
            'C23' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 13)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 13),
            'C24' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 14)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 14),
            'C25' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 15)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 15),
            'C26' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 16)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 16),
            'C27' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 17)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 17),
            'C28' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 18)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 18),
            'C29' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 19)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 19),
            'C30' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 20)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 20),
            'C31' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 21)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 21),
            'C32' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 22)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 22),
            'C33' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 23)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 23),
            'C34' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 24)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 24),
            'C35' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 25)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 25),
            'C36' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 26)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 26),
            'C37' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 27)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 27),
            'C38' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '319%', 28)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '339%', 28),
            
            'D11' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 1)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 1),
            'D12' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 2)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 2),
            'D13' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 3)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 3),
            'D14' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 4)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 4),
            'D15' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 5)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 5),
            'D16' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 6)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 6),
            'D17' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 7)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 7),
            'D18' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 8)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 8),
            'D19' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 9)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 9),
            'D20' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 10)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 10),
            'D21' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 11)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 11),
            'D22' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 12)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 12),
            'D23' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 13)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 13),
            'D24' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 14)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 14),
            'D25' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 15)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 15),
            'D26' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 16)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 16),
            'D27' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 17)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 17),
            'D28' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 18)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 18),
            'D29' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 19)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 19),
            'D30' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 20)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 20),
            'D31' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 21)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 21),
            'D32' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 22)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 22),
            'D33' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 23)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 23),
            'D34' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 24)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 24),
            'D35' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 25)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 25),
            'D36' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 26)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 26),
            'D37' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 27)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 27),
            'D38' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '319%', 28)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '339%', 28),
            
        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
    
}
