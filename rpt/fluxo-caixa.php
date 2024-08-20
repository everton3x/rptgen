<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;
use RptGen\Report\ReportBase;

require_once 'vendor/autoload.php';

echo '====================================================================================================' . PHP_EOL;
echo 'Fluxo de Caixa' . PHP_EOL;
echo 'Projetado até o final do exercício' . PHP_EOL;
echo '====================================================================================================' . PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

echo 'Conectando ao banco de dados...', PHP_EOL;
$db = new Db($dsn);

echo 'Calculando o fluxo de caixa projetado...', PHP_EOL;

echo sprintf("\tReferência:\t\t\t\t%s/%s".PHP_EOL, substr($remessa, 4, 2), substr($remessa, 0, 4));

$data_final = ReportBase::getDataBaseFromRemessa($remessa)->format('Y-m-d');
$data_inicial = substr($data_final, 0, 8) . '01';
echo sprintf("\tData inicial:\t\t\t\t%s".PHP_EOL, date_create_from_format('Y-m-d', $data_inicial)->format('d/m/Y'));
echo sprintf("\tData final:\t\t\t\t%s".PHP_EOL, date_create_from_format('Y-m-d', $data_final)->format('d/m/Y'));


$data = [];
$data[] = [
    'fonte_recurso',
    'nome_fonte_recurso',
    'saldo_bruto',
    'a_arrecadar',
    'empenhado_a_pagar',
    'a_empenhar',
    'rp_a_pagar',
    'duodecimo',
    'extra_a_pagar',
    'saldo_liquido',
];
$frs = $db->query(sprintf("select distinct recurso_vinculado as fonte_recurso, nome_recurso_vinculado as nome_fonte_recurso from pad.recurso where remessa = %d and recurso_vinculado <= 899 order by recurso_vinculado asc", $remessa));

while($row = pg_fetch_assoc($frs)) {
    $incluir = false;
    $line = [];
    $fr = $row['fonte_recurso'];
    $nome_fr = $row['nome_fonte_recurso'];

    $line['fonte_recurso'] = $fr;
    $line['nome_fonte_recurso'] = $nome_fr;

    $saldo_bruto = round((float) pg_fetch_result($db->query(sprintf("select sum(saldo_atual)::decimal as saldo_bruto from pad.bal_ver where remessa = %d and conta_contabil like '1%%' and entidade like 'pm' and indicador_superavit_financeiro like 'F' and escrituracao like 'S' and fonte_recurso = %d", $remessa, $fr)), 0, 0), 2);
    $line['saldo_bruto'] = $saldo_bruto;
    if($saldo_bruto != 0) $incluir = true;
    
    $a_arrecadar = round((float) pg_fetch_result($db->query(sprintf("select sum(a_arrecadar_atualizado)::decimal as a_arrecadar from pad.bal_rec where remessa = %d and entidade like 'pm' and fonte_recurso = %d", $remessa, $fr)), 0, 0), 2);
    $line['a_arrecadar'] = $a_arrecadar = ($a_arrecadar < 0)? 0.0 : $a_arrecadar;
    if($a_arrecadar != 0) $incluir = true;
    
    $empenhado_a_pagar = round((float) pg_fetch_result($db->query(sprintf("select sum(empenhado_a_pagar)::decimal as empenhado_a_pagar from pad.bal_desp where remessa = %d and entidade like 'pm' and fonte_recurso = %d", $remessa, $fr)), 0, 0), 2);
    $line['empenhado_a_pagar'] = $empenhado_a_pagar;
    if($empenhado_a_pagar != 0) $incluir = true;
    
    $a_empenhar = round((float) pg_fetch_result($db->query(sprintf("select sum(saldo_a_empenhar)::decimal as a_empenhar from pad.bal_desp where remessa = %d and entidade like 'pm' and fonte_recurso = %d", $remessa, $fr)), 0, 0), 2);
    $line['a_empenhar'] = $a_empenhar;
    if($a_empenhar != 0) $incluir = true;
    
    $rp_a_pagar = round((float) pg_fetch_result($db->query(sprintf("select sum(rp_saldo_final)::decimal as rp_a_pagar from pad.restos_pagar where remessa = %d and entidade like 'pm' and fonte_recurso = %d", $remessa, $fr)), 0, 0), 2);
    $line['rp_a_pagar'] = $rp_a_pagar;
    if($rp_a_pagar != 0) $incluir = true;

    $duodecimo = round((float) pg_fetch_result($db->query(sprintf("select sum(saldo_atual)::decimal as duodecimo from pad.bal_ver where remessa = %d and conta_contabil like '2189202%%' and entidade like 'pm' and escrituracao like 'S'", $remessa, $fr)), 0, 0), 2);
    $line['duodecimo'] = $duodecimo = ($fr == 500)? $duodecimo : 0.0;
    if($duodecimo != 0) $incluir = true;
    
    $extra_a_pagar = round((float) pg_fetch_result($db->query(sprintf("select sum(saldo_atual)::decimal as extra_a_pagar from pad.bal_ver where remessa = %d and conta_contabil like '2188%%' and fonte_recurso = %d and entidade like 'pm' and indicador_superavit_financeiro like 'F' and escrituracao like 'S'", $remessa, $fr)), 0, 0), 2);
    // $line['extra_a_pagar'] = $extra_a_pagar = ($fr == 869)? $extra_a_pagar : 0.0;
    $line['extra_a_pagar'] = $extra_a_pagar;
    if($extra_a_pagar != 0) $incluir = true;

    if($incluir) {
        $line['saldo_liquido'] = round($saldo_bruto + $a_arrecadar - $empenhado_a_pagar - $a_empenhar - $rp_a_pagar - $duodecimo - $extra_a_pagar, 2);
        $data[$fr] = $line;
    }

}

// $livre = [
//     'fonte_recurso' => 0,
//     'nome_fonte_recurso' => 'Recursos Livres',
//     'saldo_bruto' => $data[500]['saldo_bruto'] + $data[501]['saldo_bruto'] + $data[502]['saldo_bruto'],
//     'a_arrecadar' => $data[500]['a_arrecadar'] + $data[501]['a_arrecadar'] + $data[502]['a_arrecadar'],
//     'empenhado_a_pagar' => $data[500]['empenhado_a_pagar'] + $data[501]['empenhado_a_pagar'] + $data[502]['empenhado_a_pagar'],
//     'a_empenhar' => $data[500]['a_empenhar'] + $data[501]['a_empenhar'] + $data[502]['a_empenhar'],
//     'rp_a_pagar' => $data[500]['rp_a_pagar'] + $data[501]['rp_a_pagar'] + $data[502]['rp_a_pagar'],
//     'duodecimo' => $data[500]['duodecimo'] + $data[501]['duodecimo'] + $data[502]['duodecimo'],
//     'extra_a_pagar' => $data[500]['extra_a_pagar'] + $data[501]['extra_a_pagar'] + $data[502]['extra_a_pagar'],
//     'saldo_liquido' => $data[500]['saldo_liquido'] + $data[501]['saldo_liquido'] + $data[502]['saldo_liquido'],
// ];
// $data[500] = $livre;
// unset($data[501], $data[502]);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->fromArray($data);

$output_name = sprintf("fluxo-caixa-%s-%s.xlsx", $ano, str_pad($mes, 2, '0', STR_PAD_LEFT));

echo PHP_EOL;
echo PHP_EOL;
