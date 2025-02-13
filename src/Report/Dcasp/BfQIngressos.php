<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Financeiro - Quadro dos ingressos
 *
 * @author Everton
 */
final class BfQIngressos extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BF Q0A', $con, $spreadsheet, $remessa, $escopo);
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
            
            //Transferências financeiras
            'C30' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '4511%'),
            'C31' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '4512201%'),
            'C32' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '4513%'),

            // Outras Movimentações Financeiras Recebidas
            'C36' => 0.0,
            'C37' => 0.0,
            'C38' => 0.0,


            // Extraorçamentário
            'C42' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '5317%'),
            'C43' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '5327%'),
            'C44' => $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '1132306%'),
            'C45' => 0.0,
            
            // Saldos
            'C49' => $this->readSql('dcasp/bf/CaixaAnteriorNaoRpps', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bf/CaixaAnteriorNaoRpps', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C50' => $this->readSql('dcasp/bf/CaixaAnteriorRpps', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bf/CaixaAnteriorRpps', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C51' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '1135%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '2188%'),
            
            //Transferências financeiras
            'D30' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '4511%'),
            'D31' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '4512201%'),
            'D32' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '4513%'),

            // Outras Movimentações Financeiras Recebidas
            'D36' => 0.0,
            'D37' => 0.0,
            'D38' => 0.0,

            // Extraorçamentário
            'D42' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '5317%'),
            'D43' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '5327%'),
            'D44' => $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1131101%')
                        + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1132306%'),
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
