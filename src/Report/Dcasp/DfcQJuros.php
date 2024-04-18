<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - DFC - Quadro dos desembolsos de juros e encargos
 *
 * @author Everton
 */
final class DfcQJuros extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('DFC Q3', $con, $spreadsheet, $remessa, $escopo);
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
        return [
            
            
            'C11' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329021%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329023%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329025%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329521%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329621%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469073%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469074%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469075%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329021%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329023%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329025%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329521%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329621%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469073%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469074%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469075%', 28, 843),
            
            'C12' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329021%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329023%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329025%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329521%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329621%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469073%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469074%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469075%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329021%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329023%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329025%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329521%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '329621%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469073%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469074%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469075%', 28, 844),
            
            'C13' => 0.0,
            
            
            
            
            
            'D11' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329021%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329023%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329025%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329521%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329621%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469073%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469074%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469075%', 28, 841)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329021%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329023%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329025%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329521%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329621%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469073%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469074%', 28, 843)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469075%', 28, 843),
            
            'D12' => $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329021%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329023%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329025%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329521%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329621%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469073%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469074%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469075%', 28, 842)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329021%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329023%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329025%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329521%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '329621%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469073%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469074%', 28, 844)
                    + $this->readSql('dcasp/dfc/PagamentosPorNdoEFuncaoEsubfuncao', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial, $data_final, '469075%', 28, 844),
            
            'D13' => 0.0,
            
        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
    
}
