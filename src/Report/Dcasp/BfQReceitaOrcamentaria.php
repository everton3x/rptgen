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
            
            // Não vinculados
            'C13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 500, 502, "('normal', 'intra')"),
            'D13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 500, 502, "('dedutora')") * -1,
            // Educação
            'C15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 540, 599, "('normal', 'intra')"),
            'D15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 540, 599, "('dedutora')") * -1,
            // Saúde
            'C16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 600, 659, "('normal', 'intra')"),
            'D16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 600, 659, "('dedutora')") * -1,
            // Assistência social
            'C17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 660, 669, "('normal', 'intra')"),
            'D17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 660, 669, "('dedutora')") * -1,
            // Previdência exceto RPPS
            'C18' => 0.0,
            'D18' => 0.0,
            // Transferências
            'C19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 700, 749, "('normal', 'intra')"),
            'D19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 700, 749, "('dedutora')") * -1,
            // Outras legais
            'C20' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 750, 799, "('normal', 'intra')"),
            'D20' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 750, 799, "('dedutora')") * -1,
            // Outras
            'C21' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 880, 899, "('normal', 'intra')"),
            'D21' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 880, 899, "('dedutora')") * -1,
            // RPPS
            'C23' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 800, 800, "('normal', 'intra')"),
            'D23' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 800, 800, "('dedutora')") * -1,
            'C24' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 801, 801, "('normal', 'intra')"),
            'D24' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 801, 801, "('dedutora')") * -1,
            'C25' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 802, 802, "('normal', 'intra')"),
            'D25' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->remessa, $this->entidades, 802, 802, "('dedutora')") * -1,

            // Não vinculados
            'F13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 500, 502, "('normal', 'intra')"),
            'G13' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 500, 502, "('dedutora')") * -1,
            // Educação
            'F15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 540, 599, "('normal', 'intra')"),
            'G15' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 540, 599, "('dedutora')") * -1,
            // Saúde
            'F16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 600, 659, "('normal', 'intra')"),
            'G16' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 600, 659, "('dedutora')") * -1,
            // Assistência social
            'F17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 660, 669, "('normal', 'intra')"),
            'G17' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 660, 669, "('dedutora')") * -1,
            // Previdência exceto RPPS
            'F18' => 0.0,
            'G18' => 0.0,
            // Transferências
            'F19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 700, 749, "('normal', 'intra')"),
            'G19' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 700, 749, "('dedutora')") * -1,
            // Outras legais
            'F20' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 750, 799, "('normal', 'intra')"),
            'G20' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 750, 799, "('dedutora')") * -1,
            // Outras
            'F21' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 880, 899, "('normal', 'intra')"),
            'G21' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 880, 899, "('dedutora')") * -1,
            // RPPS
            'F23' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 800, 800, "('normal', 'intra')"),
            'G23' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 800, 800, "('dedutora')") * -1,
            'F24' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 801, 801, "('normal', 'intra')"),
            'G24' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 801, 801, "('dedutora')") * -1,
            'F25' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 802, 802, "('normal', 'intra')"),
            'G25' => $this->readSql('dcasp/bf/BalRecReceitaPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 802, 802, "('dedutora')") * -1,
            

        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
