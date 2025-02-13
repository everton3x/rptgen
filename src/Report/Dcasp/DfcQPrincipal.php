<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - DFC - Quadro principal
 *
 * @author Everton
 */
final class DfcQPrincipal extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('DFC Q0', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Ingressos operacionais
            'C12' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '11%', "('normal', 'intra', 'dedutora')"),
            'C13' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '12%', "('normal', 'intra', 'dedutora')"),
            'C14' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '13%', "('normal', 'intra', 'dedutora')") - $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '1321%', "('normal', 'intra', 'dedutora')"),
            'C15' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '14%', "('normal', 'intra', 'dedutora')"),
            'C16' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '15%', "('normal', 'intra', 'dedutora')"),
            'C17' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '16%', "('normal', 'intra', 'dedutora')"),
            'C18' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '1321%', "('normal', 'intra', 'dedutora')"),
            'C19' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '19%', "('normal', 'intra', 'dedutora')"),
            'C21' => $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '2188%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '1131101%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '1132306%'),
            
            'D12' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '11%', "('normal', 'intra', 'dedutora')"),
            'D13' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '12%', "('normal', 'intra', 'dedutora')"),
            'D14' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '13%', "('normal', 'intra', 'dedutora')")
                        - $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1321%', "('normal', 'intra', 'dedutora')"),
            'D15' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '14%', "('normal', 'intra', 'dedutora')"),
            'D16' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '15%', "('normal', 'intra', 'dedutora')"),
            'D17' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '16%', "('normal', 'intra', 'dedutora')"),
            'D18' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1321%', "('normal', 'intra', 'dedutora')"),
            'D19' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '19%', "('normal', 'intra', 'dedutora')"),
            'D21' => $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1131101%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1132306%'),
            
            // Desembolsos operacionais
            'C26' => $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->remessa, $this->entidades, '2188%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '1131101%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->remessa, $this->entidades, '1132306%'),
            
            'D26' => $this->readSql('dcasp/bp/BverEncMovimentoDevedor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '2188%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1131101%')
                    + $this->readSql('dcasp/bp/BverEncMovimentoCredor', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '1132306%'),
            
            // Ingressos de investimento
            'C31' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '22%', "('normal', 'intra', 'dedutora')"),
            'C32' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '23%', "('normal', 'intra', 'dedutora')"),
            
            'D31' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '22%', "('normal', 'intra', 'dedutora')"),
            'D32' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '23%', "('normal', 'intra', 'dedutora')"),
            
            // Desembolsos de investimento
            'C35' => $this->readSql('dcasp/dfc/PagamentosPorNdo', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '449%'),
            'C36' => $this->readSql('dcasp/dfc/PagamentosPorNdo', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '459_66%'),
            'C37' => 0.0,
            
            'D35' => $this->readSql('dcasp/dfc/PagamentosPorNdo', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '449%'),
            'D36' => $this->readSql('dcasp/dfc/PagamentosPorNdo', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '459_66%'),
            'D37' => 0.0,

            // Ingressos de financiamento
            'C42' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '21%', "('normal', 'intra', 'dedutora')"),
            'C43' => 0.0,
            'D42' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '21%', "('normal', 'intra', 'dedutora')"),
            'D43' => 0.0,
            
            // Desembolsos de financiamento
            'C46' => $this->readSql('dcasp/dfc/PagamentosPorNdo', $this->consolidado, $this->remessa, $this->entidades, $data_inicial, $data_final, '469%'),
//            'C46' => 0.0,
            'D46' => $this->readSql('dcasp/dfc/PagamentosPorNdo', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, $data_inicial_anterior, $data_final_anterior, '469%'),
//            'D46' => 0.0,
            
            // Caixa e equivalentes
            'C52' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'D52' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '114%'),
            'C53' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '111%')
                        + $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'D53' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '111%')
                        +$this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '114%'),
            
        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
    
}
