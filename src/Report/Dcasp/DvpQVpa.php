<?php

namespace RptGen\Report\Dcasp;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * DCASP - DVP - VPA
 *
 * @author Everton
 */
final class DvpQVpa extends DcaspBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct('DVP Q1', $con, $spreadsheet, $remessa, $escopo);
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
            // Impostos, taxas e conribuições de melhoria
            'C13' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '411%'),
            'C14' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '412%'),
            'C15' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '413%'),
            // Contribuições
            'C20' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '421%'),
            'C21' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '422%'),
            'C22' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '423%'),
            'C23' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '424%'),
            // Exploração e venda de bens, serviços e direitos
            'C28' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '431%'),
            'C29' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '432%'),
            'C30' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '433%'),
            //VPA financeiras
            'C35' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '441%'),
            'C36' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '442%'),
            'C37' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '443%'),
            'C38' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '444%'),
            'C39' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '445%'),
            'C40' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '446%'),
            'C41' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '448%'),
            'C42' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '449%'),
            // Transferências e delegações recebidas
            'C47' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '451%'),
            'C48' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '452%'),
            'C49' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '453%'),
            'C50' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '454%'),
            'C51' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '455%'),
            'C52' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '456%'),
            'C53' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '457%'),
            'C54' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '458%'),
            'C55' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '459%'),
            // Valorização e ganhos com ativos e desincorporação de passivos
            'C60' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '461%'),
            'C61' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '462%'),
            'C62' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '463%'),
            'C63' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '464%'),
            'C64' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '465%'),
            //Outras VPA
            'C69' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '491%'),
            'C70' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '492%'),
            'C71' => 0.0,
            'C72' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '495%'),
            'C73' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '497%'),
            'C74' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->remessa, $this->entidades, '499%'),
            
            
            // Impostos, taxas e conribuições de melhoria
            'D13' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '411%'),
            'D14' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '412%'),
            'D15' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '413%'),
            // Contribuições
            'D20' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '421%'),
            'D21' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '422%'),
            'D22' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '423%'),
            'D23' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '424%'),
            // Exploração e venda de bens, serviços e direitos
            'D28' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '431%'),
            'D29' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '432%'),
            'D30' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '433%'),
            //VPA financeiras
            'D35' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '441%'),
            'D36' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '442%'),
            'D37' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '443%'),
            'D38' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '444%'),
            'D39' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '445%'),
            'D40' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '446%'),
            'D41' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '448%'),
            'D42' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '449%'),
            // Transferências e delegações recebidas
            'D47' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '451%'),
            'D48' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '452%'),
            'D49' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '453%'),
            'D50' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '454%'),
            'D51' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '455%'),
            'D52' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '456%'),
            'D53' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '457%'),
            'D54' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '458%'),
            'D55' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '459%'),
            // Valorização e ganhos com ativos e desincorporação de passivos
            'D60' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '461%'),
            'D61' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '462%'),
            'D62' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '463%'),
            'D63' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '464%'),
            'D64' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '465%'),
            //Outras VPA
            'D69' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '491%'),
            'D70' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '492%'),
            'D71' => 0.0,
            'D72' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '495%'),
            'D73' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '497%'),
            'D74' => $this->readSql('dcasp/bp/BalVerSaldoAtual', $this->consolidado, $this->getRemessaAnoAnterior(), $this->entidades, '499%'),
        ];
    }
    
    private function getRemessaAnoAnterior(): int {
        return (int) (substr($this->remessa, 0, 4) - 1).'12';
    }
}
