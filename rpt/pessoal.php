<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use RptGen\Db;
use RptGen\Report\Fiscal\Rgf\A1CisaDtp;
use RptGen\Report\Fiscal\Rgf\A1CofronDtp;
use RptGen\Report\Fiscal\Rgf\A1ExecDtp;
use RptGen\Report\Fiscal\Rgf\A1LegDtp;
use RptGen\Report\Fiscal\Rreo\A3Rcl;
use RptGen\Report\ReportBase;

$despesas_consorcio_file = 'auxiliar/consorcios.xlsx';
$dtp_empenhos_terceirizacao_file = 'auxiliar/dtp_empenhos_terceirizacao.xlsx';

require_once 'vendor/autoload.php';

echo '====================================================================================================' . PHP_EOL;
echo 'Índices Mensais' . PHP_EOL;
echo 'RCL e DTP' . PHP_EOL;
echo '====================================================================================================' . PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

echo "Importando despesas de consórcios $despesas_consorcio_file" . PHP_EOL;
$db = new Db($dsn);
$wb_consorcios = IOFactory::load($despesas_consorcio_file);
$sheet_consorcio = $wb_consorcios->setActiveSheetIndexByName('Despesas');
$data_table = $sheet_consorcio->toArray(nullValue: 0);
array_shift($data_table);
$db->importaDespesasConsorcio($data_table);

echo PHP_EOL;
echo PHP_EOL;

echo "Importando empenhos de terceirização de $dtp_empenhos_terceirizacao_file" . PHP_EOL;
$db = new Db($dsn);
$wb_terceiricacao = IOFactory::load($dtp_empenhos_terceirizacao_file);
$sheet_terceirizacao= $wb_terceiricacao->setActiveSheetIndexByName('RGF A1 Exec Terceirização');
$data_table = $sheet_terceirizacao->toArray(nullValue: 0);
array_shift($data_table);
$db->importaEmpenhosTerceirizacao($data_table);

echo PHP_EOL;
echo PHP_EOL;

echo "Abrindo modelo de relatórios de $tpl_file" . PHP_EOL;
$spreadsheet = IOFactory::load($tpl_file);

echo PHP_EOL;
echo PHP_EOL;

echo 'Gerando o Relatório...', PHP_EOL;
echo PHP_EOL;

$A3Rcl = new A3Rcl($con, $spreadsheet, $remessa);
$A3Rcl->run();
$A1ExecDtp = new A1ExecDtp($con, $spreadsheet, $remessa);
$A1ExecDtp->run();
$A1CofronDtp = new A1CofronDtp($con, $spreadsheet, $remessa);
$A1CofronDtp->run();
$A1CisaDtp = new A1CisaDtp($con, $spreadsheet, $remessa);
$A1CisaDtp->run();
$A1LegDtp = new A1LegDtp($con, $spreadsheet, $remessa);
$A1LegDtp->run();

//excluir planilhas não usadas
$sheetsToRemove = [
    'Valores manuais',
    'Consórcios Despesas',
    'RREO A8 Valores Manuais',
    'RREO A12 Valores Manuais',
    'RGF A1 Exec Terceirização',
    'RREO A1 BO Receita',
    'RREO A1 BO Despesa',
    'RREO A1 BO Receita Intra',
    'RREO A1 BO Despesa Intra',
    'RREO A2',
    'RREO A2 Intra',
    'RREO A4',
    'RREO A6',
    'RREO A7',
    'RREO A7 Intra',
    'RREO A8',
    'RREO A9',
    'RREO A10',
    'RREO A11',
    'RREO A12',
    'RREO A13',
    'RREO A14 Resumido',
    'RREO A14 Completo 3bim',
    'RREO A14 Completo 6bim',
    'RGF A2',
    'RGF A3',
    'RGF A4',
    'RGF A5 Exec 2 Sem',
    'RGF A6 Exec 1 Sem',
    'RGF A6 Exec 2 Sem',
    'RGF A5 Leg 2 Sem',
    'RGF A6 Leg 2 Sem',
    'RGF A1 Consolidado',
    'RGF A5 Consolidado',
];

ReportBase::removeSheets($spreadsheet, $sheetsToRemove);

echo 'Relatório gerado.', PHP_EOL;

$output_name = sprintf("pessoal-%s-%s.xlsx", $ano, str_pad($mes, 2, '0', STR_PAD_LEFT));

echo PHP_EOL;
echo PHP_EOL;

