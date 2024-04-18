<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Financeiro - Quadro das receitas orçamentárias
 *
 * @author Everton
 */
final class BfQReceitaOrcamentaria extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BF Q1', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Ordinários
            'C13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 500, 502, "('normal', 'intra')"),
            'D13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 500, 502, "('dedutora')") * -1,
            // Educação
            'C15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 540, 599, "('normal', 'intra')"),
            'D15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 540, 599, "('dedutora')") * -1,
            // Saúde
            'C16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 600, 659, "('normal', 'intra')"),
            'D16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 600, 659, "('dedutora')") * -1,
            // RPPS
            'C17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 800, 803, "('normal', 'intra')"),
            'D17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 800, 803, "('dedutora')") * -1,
            // Assistência social
            'C18' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 660, 669, "('normal', 'intra')"),
            'D18' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 660, 669, "('dedutora')") * -1,
            // Outras
            'C19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 700, 799, "('normal', 'intra')"),
            'D19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 700, 799, "('dedutora')") * -1,
            
            // Ordinários
            'F13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 500, 502, "('normal', 'intra')"),
            'G13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 500, 502, "('dedutora')") * -1,
            // Educação
            'F15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 540, 599, "('normal', 'intra')"),
            'G15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 540, 599, "('dedutora')") * -1,
            // Saúde
            'F16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 600, 659, "('normal', 'intra')"),
            'G16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 600, 659, "('dedutora')") * -1,
            // RPPS
            'F17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 800, 803, "('normal', 'intra')"),
            'G17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 800, 803, "('dedutora')") * -1,
            // Assistência social
            'F18' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 660, 669, "('normal', 'intra')"),
            'G18' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 660, 669, "('dedutora')") * -1,
            // Outras
            'F19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 700, 799, "('normal', 'intra')"),
            'G19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 700, 799, "('dedutora')") * -1,
            

        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
