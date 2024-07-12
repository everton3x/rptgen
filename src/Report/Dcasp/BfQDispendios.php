<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Financeiro - Quadro dos dispêndios
 *
 * @author Everton
 */
final class BfQDispendios extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BF Q0B', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Despesa orçamentária
            'C14' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 500, 502),
            'C16' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 540, 599),
            'C17' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 600, 659),
            'C18' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 660, 669),
            'C19' => 0.0,
            'C20' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 700, 749),
            'C21' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 750, 799),
            'C22' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 880, 899),
            'C24' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 800, 800),
            'C25' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 801, 801),
            'C26' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->remessa, $this->entidades, 802, 802),
            
            //Transferências financeiras
            'C30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '3511%'),
            'C31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '3512201%'),
            'C32' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '3513%'),

            // Outras Movimentações Financeiras Concedidas
            'C36' => 0.0,
            'C37' => 0.0,
            'C38' => 0.0,

            // Extraorçamentário
            'C42' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '6314%'),
            'C43' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '6322%'),
            'C44' => $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '1132306%'),
            'C45' => 0.0,
            
            // Saldos
            'C49' => $this->readSql('dcasp/bf/CaixaAtualNaoRpps', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bf/CaixaAtualNaoRpps', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C50' => $this->readSql('dcasp/bf/CaixaAtualRpps', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bf/CaixaAtualRpps', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C51' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '2188%'),
            
            
            // Despesa orçamentária
            'D14' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 500, 502),
            'D16' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 540, 599),
            'D17' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 600, 659),
            'D18' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 660, 669),
            'D19' => 0.0,
            'D20' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 700, 749),
            'D21' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 750, 799),
            'D22' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 880, 899),
            'D24' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 800, 800),
            'D25' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 801, 801),
            'D26' => $this->readSql('dcasp/bf/BalDespEmpenhadoPorFonte', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, 802, 802),

            //Transferências financeiras
            'D30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '3511%'),
            'D31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '3512201%'),
            'D32' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '3513%'),

            // Outras Movimentações Financeiras Concedidas
            'D36' => 0.0,
            'D37' => 0.0,
            'D38' => 0.0,

            // Extraorçamentário
            'D42' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '6314%'),
            'D43' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '6322%'),
            'D44' => $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1132306%'),
            'D45' => 0.0,
            
            // Saldos
            'D49' => $this->readSql('dcasp/bf/CaixaAtualNaoRpps', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '111%')
                        + $this->readSql('dcasp/bf/CaixaAtualNaoRpps', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '114%'),
            'D50' => $this->readSql('dcasp/bf/CaixaAtualRpps', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '111%')
                        + $this->readSql('dcasp/bf/CaixaAtualRpps', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '114%'),
            'D51' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%'),

        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
