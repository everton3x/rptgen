<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Balanço Orçamentário - Quadro das receitas orçamentárias
 *
 * @author Everton
 */
final class BoQReceita extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BO Q0A', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Previsão inicial
            'C13' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '11%', "('normal', 'intra', 'dedutora')"),
            'C14' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '12%', "('normal', 'intra', 'dedutora')"),
            'C15' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '13%', "('normal', 'intra', 'dedutora')"),
            'C16' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '14%', "('normal', 'intra', 'dedutora')"),
            'C17' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '15%', "('normal', 'intra', 'dedutora')"),
            'C18' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '16%', "('normal', 'intra', 'dedutora')"),
            'C19' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '17%', "('normal', 'intra', 'dedutora')"),
            'C20' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '19%', "('normal', 'intra', 'dedutora')"),
            'C23' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '21%', "('normal', 'intra', 'dedutora')"),
            'C24' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '22%', "('normal', 'intra', 'dedutora')"),
            'C25' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '23%', "('normal', 'intra', 'dedutora')"),
            'C26' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '24%', "('normal', 'intra', 'dedutora')"),
            'C27' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '29%', "('normal', 'intra', 'dedutora')"),
            
            // Previsão atualizada
            'D13' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '11%', "('normal', 'intra', 'dedutora')"),
            'D14' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '12%', "('normal', 'intra', 'dedutora')"),
            'D15' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '13%', "('normal', 'intra', 'dedutora')"),
            'D16' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '14%', "('normal', 'intra', 'dedutora')"),
            'D17' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '15%', "('normal', 'intra', 'dedutora')"),
            'D18' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '16%', "('normal', 'intra', 'dedutora')"),
            'D19' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '17%', "('normal', 'intra', 'dedutora')"),
            'D20' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '19%', "('normal', 'intra', 'dedutora')"),
            'D23' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '21%', "('normal', 'intra', 'dedutora')"),
            'D24' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '22%', "('normal', 'intra', 'dedutora')"),
            'D25' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '23%', "('normal', 'intra', 'dedutora')"),
            'D26' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '24%', "('normal', 'intra', 'dedutora')"),
            'D27' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '29%', "('normal', 'intra', 'dedutora')"),
            
            // Receita Realizada
            'E13' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '11%', "('normal', 'intra', 'dedutora')"),
            'E14' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '12%', "('normal', 'intra', 'dedutora')"),
            'E15' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '13%', "('normal', 'intra', 'dedutora')"),
            'E16' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '14%', "('normal', 'intra', 'dedutora')"),
            'E17' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '15%', "('normal', 'intra', 'dedutora')"),
            'E18' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '16%', "('normal', 'intra', 'dedutora')"),
            'E19' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '17%', "('normal', 'intra', 'dedutora')"),
            'E20' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '19%', "('normal', 'intra', 'dedutora')"),
            'E23' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '21%', "('normal', 'intra', 'dedutora')"),
            'E24' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '22%', "('normal', 'intra', 'dedutora')"),
            'E25' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '23%', "('normal', 'intra', 'dedutora')"),
            'E26' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '24%', "('normal', 'intra', 'dedutora')"),
            'E27' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '29%', "('normal', 'intra', 'dedutora')"),
            
            // Recursos arrecadados em exercícios anteriores
            'C43' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoInicialPorNro', $this->consolidado, $this->remessa, $this->entidades, '99%', "('normal', 'intra', 'dedutora')"),
            'D43' => $this->readSql('dcasp/bo/BalRecReceitaPrevisaoAtualizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '99%', "('normal', 'intra', 'dedutora')"),
            'E43' => $this->readSql('dcasp/bo/BalRecReceitaRealizadaPorNro', $this->consolidado, $this->remessa, $this->entidades, '99%', "('normal', 'intra', 'dedutora')"),
            
            // Superávit financeiro
            'D44' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '5221301%'),
            
            // Reabertura
            'D45' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '522120202%')
                        + $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '522120302%')
                        + $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '522120203%')
                        + $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '522120303%'),

        ];
    }
    
}
