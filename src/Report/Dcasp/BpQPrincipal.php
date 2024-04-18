<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - Palanço Patrimonial - quadro principal
 *
 * @author Everton
 */
final class BpQPrincipal extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('BP Q0', $con, $spreadsheet, $remessa, $escopo);
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
            // Ativo Circulante
            'C14' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '111%'),
            'D14' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '111%'),
            'C15' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '112%')+$this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '113%'),
            'D15' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '112%')+$this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '113%'),
            'C16' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'D16' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '114%'),
            'C17' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '115%'),
            'D17' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '115%'),
            'C18' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '116%'),
            'D18' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '116%'),
            'C19' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '119%'),
            'D19' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '119%'),
            // Ativo Não-Circulante
            'C23' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '121%'),
            'D23' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '121%'),
            'C24' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '122%'),
            'D24' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '122%'),
            'C25' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '123%'),
            'D25' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '123%'),
            'C26' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '124%'),
            'D26' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '124%'),
            'C27' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '125%'),
            'D27' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '125%'),
            // Passivo Circulante
            'C35' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '211%'),
            'D35' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '211%'),
            'C36' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '212%'),
            'D36' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '212%'),
            'C37' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '213%'),
            'D37' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '213%'),
            'C38' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '214%'),
            'D38' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '214%'),
            'C39' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '215%'),
            'D39' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '215%'),
            'C40' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '217%'),
            'D40' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '217%'),
            'C41' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '218%'),
            'D41' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '218%'),
            // Passivo Não-Circulante
            'C45' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '221%'),
            'D45' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '221%'),
            'C46' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '222%'),
            'D46' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '222%'),
            'C47' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '223%'),
            'D47' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '223%'),
            'C48' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '224%'),
            'D48' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '224%'),
            'C49' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '227%'),
            'D49' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '227%'),
            'C50' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '228%'),
            'D50' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '228%'),
            'C51' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '229%'),
            'D51' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '229%'),
            //Patrimônio Líquido
            'C55' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '231%'),
            'D55' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '231%'),
            'C56' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '232%'),
            'D56' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '232%'),
            'C57' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '233%'),
            'D57' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '233%'),
            'C58' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '234%'),
            'D58' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '234%'),
            'C59' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '235%'),
            'D59' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '235%'),
            'C60' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '236%'),
            'D60' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '236%'),
            'C61' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '237%'),
            'D61' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '237%'),
            'C62' => $this->readSql('dcasp/bp/BverEncSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '239%'),
            'D62' => $this->readSql('dcasp/bp/BverEncSaldoAnterior', $this->consolidado, $this->remessa, $this->entidades, '239%'),
        ];
    }
}
