<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use RptGen\Db;
use RptGen\Report\Fiscal\Rgf\A1CisaDtp;
use RptGen\Report\Fiscal\Rgf\A1CofronDtp;
use RptGen\Report\Fiscal\Rgf\A1ExecDtp;
use RptGen\Report\Fiscal\Rgf\A1LegDtp;
use RptGen\Report\Fiscal\Rgf\A2Dc;
use RptGen\Report\Fiscal\Rreo\A12Saude;
use RptGen\Report\Fiscal\Rreo\A1BODespesa;
use RptGen\Report\Fiscal\Rreo\A1BODespesaIntra;
use RptGen\Report\Fiscal\Rreo\A1BOReceita;
use RptGen\Report\Fiscal\Rreo\A1BOReceitaIntra;
use RptGen\Report\Fiscal\Rreo\A2DespesaFuncaoSubfuncao;
use RptGen\Report\Fiscal\Rreo\A2DespesaFuncaoSubfuncaoIntra;
use RptGen\Report\Fiscal\Rreo\A3Rcl;
use RptGen\Report\Fiscal\Rreo\A4Rpps;
use RptGen\Report\Fiscal\Rreo\A6ResultadoPN;
use RptGen\Report\Fiscal\Rreo\A7RestosPagar;
use RptGen\Report\Fiscal\Rreo\A7RestosPagarIntra;
use RptGen\Report\Fiscal\Rreo\A8Educacao;
use RptGen\Report\Fiscal\Rreo\RreoBase;
use RptGen\Report\ReportBase;

$despesas_consorcio_file = 'auxiliar/consorcios.xlsx';

require_once 'vendor/autoload.php';

echo '====================================================================================================' . PHP_EOL;
echo 'Relatórios Fiscais' . PHP_EOL;
echo 'RREO e RGF' . PHP_EOL;
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

echo "Abrindo modelo de relatórios de $tpl_file" . PHP_EOL;
$spreadsheet = IOFactory::load($tpl_file);

echo PHP_EOL;
echo PHP_EOL;


$bimestre = RreoBase::getBimestreFromRemessa($remessa);
printf("Detectando o bimestre: %sº" . PHP_EOL, $bimestre);

echo PHP_EOL;
echo PHP_EOL;

echo 'Gerando o RREO...', PHP_EOL;
echo PHP_EOL;

switch ($bimestre) {
    case 1:
    case 2:
        $A1BOReceita = new A1BOReceita($con, $spreadsheet, $remessa);
        $A1BOReceita->run();
        $A1BOReceitaIntra = new A1BOReceitaIntra($con, $spreadsheet, $remessa);
        $A1BOReceitaIntra->run();
        $A1BODespesa = new A1BODespesa($con, $spreadsheet, $remessa);
        $A1BODespesa->run();
        $A1BODespesaIntra = new A1BODespesaIntra($con, $spreadsheet, $remessa);
        $A1BODespesaIntra->run();
        $A2DespesaFuncaoSubfuncao = new A2DespesaFuncaoSubfuncao($con, $spreadsheet, $remessa);
        $A2DespesaFuncaoSubfuncao->run();
        $A2DespesaFuncaoSubfuncaoIntra = new A2DespesaFuncaoSubfuncaoIntra($con, $spreadsheet, $remessa);
        $A2DespesaFuncaoSubfuncaoIntra->run();
        $A8Educacao = new A8Educacao($con, $spreadsheet, $remessa);
        $A8Educacao->run();
        $A12Saude = new A12Saude($con, $spreadsheet, $remessa);
        $A12Saude->run();

        //excluir planilhas não usadas
        $sheetsToRemove = [
            'RREO A3',
            'RREO A4',
            'RREO A6',
            'RREO A7',
            'RREO A7 Intra',
            'RREO A9',
            'RREO A10',
            'RREO A11',
            'RREO A14 Completo',
            'RGF A1 Exec',
            'RGF A1 COFRON',
            'RGF A1 CISA',
            'RGF A2',
            'RGF A3',
            'RGF A4',
            'RGF A5 Exec 2 Sem',
            'RGF A6 Exec 1 Sem',
            'RGF A6 Exec 2 Sem',
            'RGF A1 Leg',
            'RGF A5 Leg 2 Sem',
            'RGF A6 Leg 2 Sem',
            'RGF A1 Consolidado',
            'RGF A5 Consolidado',
            'RGF A6 Consolidado',
        ];
        ReportBase::removeSheets($spreadsheet, $sheetsToRemove);
        break;
    case 3:
        echo '====================================================================================================' . PHP_EOL;
        echo 'Gerando RREO...', PHP_EOL;
        echo '====================================================================================================' . PHP_EOL;
        $A1BOReceita = new A1BOReceita($con, $spreadsheet, $remessa);
        $A1BOReceita->run();
        $A1BOReceitaIntra = new A1BOReceitaIntra($con, $spreadsheet, $remessa);
        $A1BOReceitaIntra->run();
        $A1BODespesa = new A1BODespesa($con, $spreadsheet, $remessa);
        $A1BODespesa->run();
        $A1BODespesaIntra = new A1BODespesaIntra($con, $spreadsheet, $remessa);
        $A1BODespesaIntra->run();
        $A2DespesaFuncaoSubfuncao = new A2DespesaFuncaoSubfuncao($con, $spreadsheet, $remessa);
        $A2DespesaFuncaoSubfuncao->run();
        $A2DespesaFuncaoSubfuncaoIntra = new A2DespesaFuncaoSubfuncaoIntra($con, $spreadsheet, $remessa);
        $A2DespesaFuncaoSubfuncaoIntra->run();
        $A3Rcl = new A3Rcl($con, $spreadsheet, $remessa);
        $A3Rcl->run();
        $A4Rpps = new A4Rpps($con, $spreadsheet, $remessa);
        $A4Rpps->run();
        $A6ResultadoPN = new A6ResultadoPN($con, $spreadsheet, $remessa);
        $A6ResultadoPN->run();
        $A7RestosAPagar = new A7RestosPagar($con, $spreadsheet, $remessa);
        $A7RestosAPagar->run();
        $A7RestosAPagarIntra = new A7RestosPagarIntra($con, $spreadsheet, $remessa);
        $A7RestosAPagarIntra->run();
        $A8Educacao = new A8Educacao($con, $spreadsheet, $remessa);
        $A8Educacao->run();
        $A12Saude = new A12Saude($con, $spreadsheet, $remessa);
        $A12Saude->run();
               
               echo '===================================================================================================='.PHP_EOL;
               echo 'Gerando RGF do Poder Executivo...', PHP_EOL;
               echo '===================================================================================================='.PHP_EOL;
               $A1ExecDtp = new A1ExecDtp($con, $spreadsheet, $remessa);
               $A1ExecDtp->run();
               $A1CofronDtp = new A1CofronDtp($con, $spreadsheet, $remessa);
               $A1CofronDtp->run();
               $A1CisaDtp = new A1CisaDtp($con, $spreadsheet, $remessa);
               $A1CisaDtp->run();
               $A2ExecDc = new A2Dc($con, $spreadsheet, $remessa);
               $A2ExecDc->run();
               echo '===================================================================================================='.PHP_EOL;
               echo 'Gerando RGF do Poder Legislativo...', PHP_EOL;
               echo '===================================================================================================='.PHP_EOL;
               $A1LegDtp = new A1LegDtp($con, $spreadsheet, $remessa);
               $A1LegDtp->run();

        //excluir planilhas não usadas
        $sheetsToRemove = [
            'Consórcios Despesas',
            'RGF A1 Exec Terceirização',
            'RREO A9',
            'RREO A10',
            'RREO A11',
            'RREO A14 Completo',
            'RGF A5 Exec 2 Sem',
            'RGF A6 Exec 1 Sem',
            'RGF A6 Exec 2 Sem',
            'RGF A5 Leg 2 Sem',
            'RGF A6 Leg 2 Sem',
            'RGF A1 Consolidado',
            'RGF A5 Consolidado',
            'RGF A6 Consolidado',
        ];
        ReportBase::removeSheets($spreadsheet, $sheetsToRemove);
        break;
    case 4:
    case 5:
        break;
    case 6:
        break;
}



echo 'RREO gerado.', PHP_EOL;

$output_name = sprintf("fiscal-%sbim%s.xlsx", $A1BOReceita->bimestre, $ano);

echo PHP_EOL;
echo PHP_EOL;
