<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - DVP - VPD
 *
 * @author Everton
 */
final class DvpQVpd extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('DVP Q2', $con, $spreadsheet, $remessa, $escopo);
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
            
            // Pessoal e encargos
            'C13' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '311%'),
            'C14' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '312%'),
            'C15' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '313%'),
            'C16' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '319%'),
            // Benefícios previdenciários e assistenciais
            'C21' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '321%'),
            'C22' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '322%'),
            'C23' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '323%'),
            'C24' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '324%'),
            'C25' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '325%'),
            'C26' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '329%'),
            // Uso de bens, serviços e consumo de capital fixo
            'C31' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '331%'),
            'C32' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '332%'),
            'C33' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '333%'),
            // VPD financeiras
            'C38' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '341%'),
            'C39' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '342%'),
            'C40' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '343%'),
            'C41' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '344%'),
            'C42' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '345%'),
            'C43' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '346%'),
            'C44' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '348%'),
            'C45' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '349%'),
            // Transferências e delegações concedidas
            'C50' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '351%'),
            'C51' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '352%'),
            'C52' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '353%'),
            'C53' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '354%'),
            'C54' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '355%'),
            'C55' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '356%'),
            'C56' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '357%'),
            'C57' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '359%'),
            // Desvalorização e perda de ativos e incorporação de passivos
            'C62' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '361%'),
            'C63' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '362%'),
            'C64' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '363%'),
            'C65' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '364%'),
            'C66' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '365%'),
            // Tributárias
            'C71' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '371%'),
            'C72' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '372%'),
            // CMV/CPV/CSP
            'C77' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '381%'),
            'C78' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '382%'),
            'C79' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '383%'),
            // Outras VPD
            'C84' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '391%'),
            'C85' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '392%'),
            'C86' => 0.0,
            'C87' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '394%'),
            'C88' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '395%'),
            'C89' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '396%'),
            'C90' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '397%'),
            'C91' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '399%'),
            
            // Pessoal e encargos
            'D13' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '311%'),
            'D14' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '312%'),
            'D15' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '313%'),
            'D16' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '319%'),
            // Benefícios previdenciários e assistenciais
            'D21' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '321%'),
            'D22' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '322%'),
            'D23' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '323%'),
            'D24' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '324%'),
            'D25' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '325%'),
            'D26' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '329%'),
            // Uso de bens, serviços e consumo de capital fixo
            'D31' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '331%'),
            'D32' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '332%'),
            'D33' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '333%'),
            // VPD financeiras
            'D38' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '341%'),
            'D39' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '342%'),
            'D40' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '343%'),
            'D41' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '344%'),
            'D42' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '345%'),
            'D43' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '346%'),
            'D44' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '348%'),
            'D45' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '349%'),
            // Transferências e delegações concedidas
            'D50' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '351%'),
            'D51' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '352%'),
            'D52' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '353%'),
            'D53' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '354%'),
            'D54' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '355%'),
            'D55' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '356%'),
            'D56' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '357%'),
            'D57' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '359%'),
            // Desvalorização e perda de ativos e incorporação de passivos
            'D62' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '361%'),
            'D63' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '362%'),
            'D64' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '363%'),
            'D65' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '364%'),
            'D66' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '365%'),
            // Tributárias
            'D71' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '371%'),
            'D72' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '372%'),
            // CMV/CPV/CSP
            'D77' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '381%'),
            'D78' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '382%'),
            'D79' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '383%'),
            // Outras VPD
            'D84' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '391%'),
            'D85' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '392%'),
            'D86' => 0.0,
            'D87' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '394%'),
            'D88' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '395%'),
            'D89' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '396%'),
            'D90' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '397%'),
            'D91' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '399%'),
            
            
            
        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
