<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Orçamentário - Quadro das despesas orçamentárias
 *
 * @author Everton
 */
final class BoQDespesa extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BO Q0B', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Dotação inicial
            'C13' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdo', $this->consolidado, $this->remessa, $this->entidades, '31%'),
            'C14' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdo', $this->consolidado, $this->remessa, $this->entidades, '32%'),
            'C15' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdo', $this->consolidado, $this->remessa, $this->entidades, '33%'),
            'C18' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdo', $this->consolidado, $this->remessa, $this->entidades, '44%'),
            'C19' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdo', $this->consolidado, $this->remessa, $this->entidades, '45%'),
            'C20' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdo', $this->consolidado, $this->remessa, $this->entidades, '46%'),
            'C22' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdoESubfuncao', $this->consolidado, $this->remessa, $this->entidades, '99%', 999),
            'C37' => $this->readSql('dcasp/bo/BalDespDotacaoInicialPorNdoESubfuncao', $this->consolidado, $this->remessa, $this->entidades, '99%', 997),
            
            // Dotação atualizada
            'D13' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdo', $this->consolidado, $this->remessa, $this->entidades, '31%'),
            'D14' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdo', $this->consolidado, $this->remessa, $this->entidades, '32%'),
            'D15' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdo', $this->consolidado, $this->remessa, $this->entidades, '33%'),
            'D18' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdo', $this->consolidado, $this->remessa, $this->entidades, '44%'),
            'D19' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdo', $this->consolidado, $this->remessa, $this->entidades, '45%'),
            'D20' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdo', $this->consolidado, $this->remessa, $this->entidades, '46%'),
            'D22' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdoESubfuncao', $this->consolidado, $this->remessa, $this->entidades, '99%', 999),
            'D37' => $this->readSql('dcasp/bo/BalDespDotacaoAtualizadaPorNdoESubfuncao', $this->consolidado, $this->remessa, $this->entidades, '99%', 997),
            
            // Empenhado
            'E13' => $this->readSql('dcasp/bo/BalDespEmpenhadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '31%'),
            'E14' => $this->readSql('dcasp/bo/BalDespEmpenhadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '32%'),
            'E15' => $this->readSql('dcasp/bo/BalDespEmpenhadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '33%'),
            'E18' => $this->readSql('dcasp/bo/BalDespEmpenhadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '44%'),
            'E19' => $this->readSql('dcasp/bo/BalDespEmpenhadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '45%'),
            'E20' => $this->readSql('dcasp/bo/BalDespEmpenhadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '46%'),
            
            // Liquidado
            'F13' => $this->readSql('dcasp/bo/BalDespLiquidadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '31%'),
            'F14' => $this->readSql('dcasp/bo/BalDespLiquidadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '32%'),
            'F15' => $this->readSql('dcasp/bo/BalDespLiquidadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '33%'),
            'F18' => $this->readSql('dcasp/bo/BalDespLiquidadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '44%'),
            'F19' => $this->readSql('dcasp/bo/BalDespLiquidadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '45%'),
            'F20' => $this->readSql('dcasp/bo/BalDespLiquidadoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '46%'),
            
            // Pago
            'G13' => $this->readSql('dcasp/bo/BalDespPagoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '31%'),
            'G14' => $this->readSql('dcasp/bo/BalDespPagoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '32%'),
            'G15' => $this->readSql('dcasp/bo/BalDespPagoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '33%'),
            'G18' => $this->readSql('dcasp/bo/BalDespPagoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '44%'),
            'G19' => $this->readSql('dcasp/bo/BalDespPagoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '45%'),
            'G20' => $this->readSql('dcasp/bo/BalDespPagoPorNdo', $this->consolidado, $this->remessa, $this->entidades, '46%'),
            

        ];
    }
    
}
