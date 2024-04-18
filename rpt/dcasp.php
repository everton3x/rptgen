<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use RptGen\Report\Dcasp\BfQDispendios;
use RptGen\Report\Dcasp\BfQIngressos;
use RptGen\Report\Dcasp\BfQReceitaOrcamentaria;
use RptGen\Report\Dcasp\BoQDespesa;
use RptGen\Report\Dcasp\BoQReceita;
use RptGen\Report\Dcasp\BoQRpnp;
use RptGen\Report\Dcasp\BoQRpp;
use RptGen\Report\Dcasp\BpQCompensacao;
use RptGen\Report\Dcasp\BpQDividaAtiva;
use RptGen\Report\Dcasp\BpQFinPerm;
use RptGen\Report\Dcasp\BpQImobilizado;
use RptGen\Report\Dcasp\BpQPrincipal;
use RptGen\Report\Dcasp\BpQSuperavitFinanceiro;
use RptGen\Report\Dcasp\DfcQDespesaPorFuncao;
use RptGen\Report\Dcasp\DfcQJuros;
use RptGen\Report\Dcasp\DfcQPrincipal;
use RptGen\Report\Dcasp\DfcQTransferencias;
use RptGen\Report\Dcasp\DvpQVpa;
use RptGen\Report\Dcasp\DvpQVpd;

require_once 'vendor/autoload.php';

echo '====================================================================================================' . PHP_EOL;
echo 'DCASP' . PHP_EOL;
echo 'Demonstrações Contábeis Aplicadas ao Setor Público' . PHP_EOL;
echo '====================================================================================================' . PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;


$menu = [
    1 => 'Consolidado',
    2 => 'Prefeitura',
    3 => 'Câmara',
    4 => 'FPSM',
];

foreach ($menu as $key => $label){
    printf('[ %d ] => %s'.PHP_EOL, $key, $label);
}
echo 'Informe o escopo das DCASP: ';
$escolha = (int) trim(fgets(STDIN));
$ctrl = true;
while($ctrl){
    switch ($escolha){
        case 1:
            $escopo = 'mun';
            $ctrl = false;
            break;
        case 2:
            $escopo = 'pm';
            $ctrl = false;
            break;
        case 3:
            $escopo = 'cm';
            $ctrl = false;
            break;
        case 4:
            $escopo = 'fpsm';
            $ctrl = false;
            break;
        default :
            echo "Você digitou uma opção inválida: $escolha", PHP_EOL, 'Tente novamente: ';
            break;
    }
}

echo "Abrindo modelo de relatórios de $tpl_file_dcasp" . PHP_EOL;
$spreadsheet = IOFactory::load($tpl_file_dcasp);

echo PHP_EOL;
echo PHP_EOL;

echo 'Gerando o Relatório...', PHP_EOL;
echo PHP_EOL;

(new BpQPrincipal($con, $spreadsheet, $remessa, $escopo))->run();
(new BpQFinPerm($con, $spreadsheet, $remessa, $escopo))->run();
(new BpQCompensacao($con, $spreadsheet, $remessa, $escopo))->run();
(new BpQSuperavitFinanceiro($con, $spreadsheet, $remessa, $escopo))->run();
(new BpQImobilizado($con, $spreadsheet, $remessa, $escopo))->run();
(new BpQDividaAtiva($con, $spreadsheet, $remessa, $escopo))->run();
(new DvpQVpa($con, $spreadsheet, $remessa, $escopo))->run();
(new DvpQVpd($con, $spreadsheet, $remessa, $escopo))->run();
(new BfQIngressos($con, $spreadsheet, $remessa, $escopo))->run();
(new BfQDispendios($con, $spreadsheet, $remessa, $escopo))->run();
(new BfQReceitaOrcamentaria($con, $spreadsheet, $remessa, $escopo))->run();
(new BoQReceita($con, $spreadsheet, $remessa, $escopo))->run();
(new BoQDespesa($con, $spreadsheet, $remessa, $escopo))->run();
(new BoQRpnp($con, $spreadsheet, $remessa, $escopo))->run();
(new BoQRpp($con, $spreadsheet, $remessa, $escopo))->run();
(new DfcQPrincipal($con, $spreadsheet, $remessa, $escopo))->run();
(new DfcQTransferencias($con, $spreadsheet, $remessa, $escopo))->run();
(new DfcQDespesaPorFuncao($con, $spreadsheet, $remessa, $escopo))->run();
(new DfcQJuros($con, $spreadsheet, $remessa, $escopo))->run();

//excluir planilhas não usadas
//$sheetsToRemove = [];
//ReportBase::removeSheets($spreadsheet, $sheetsToRemove);

echo 'Relatório gerado.', PHP_EOL;

$output_name = sprintf("dcasp-%s-%s-%s.xlsx", $ano, str_pad($mes, 2, '0', STR_PAD_LEFT), $escopo);

echo PHP_EOL;
echo PHP_EOL;

