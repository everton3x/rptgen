<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use RptGen\Db;
use RptGen\Report\ReportBase;

require_once 'vendor/autoload.php';

echo '====================================================================================================' . PHP_EOL;
echo 'Dotação para Vale-Alimentacao' . PHP_EOL;
echo 'Superávit/Déficit' . PHP_EOL;
echo '====================================================================================================' . PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

echo 'Conectando ao banco de dados...', PHP_EOL;
$db = new Db($dsn);

echo 'Calulando falores de superávit/déficit do vale-alimentação...', PHP_EOL;

echo sprintf("\tReferência:\t\t\t\t%s/%s".PHP_EOL, substr($remessa, 4, 2), substr($remessa, 0, 4));

$data_final = ReportBase::getDataBaseFromRemessa($remessa)->format('Y-m-d');
$data_inicial = substr($data_final, 0, 8) . '01';
echo sprintf("\tData inicial:\t\t\t\t%s".PHP_EOL, date_create_from_format('Y-m-d', $data_inicial)->format('d/m/Y'));
echo sprintf("\tData final:\t\t\t\t%s".PHP_EOL, date_create_from_format('Y-m-d', $data_final)->format('d/m/Y'));

$dotacao_atualizada = round((float) pg_fetch_result($db->query(sprintf("select sum(dotacao_atualizada)::decimal as dotacao_atualizada from pad.bal_desp where remessa = %d and elemento like '339046%%' and entidade like 'pm'", $remessa)), 0, 0), 2);
echo sprintf("\tDotação Atualizada:\t\t\t%s".PHP_EOL, number_format($dotacao_atualizada, 2, ',', '.'));

$empenhado_ate_data_base = round((float) pg_fetch_result($db->query(sprintf("select sum(valor_empenhado)::decimal as empenhado from pad.bal_desp where remessa = %d and elemento like '339046%%' and entidade like 'pm'", $remessa)), 0, 0), 2);
echo sprintf("\tEmpenhado até %s:\t\t%s".PHP_EOL, $data_final, number_format($empenhado_ate_data_base, 2, ',', '.'));

$empenhado_no_mes = round((float) pg_fetch_result($db->query(sprintf("select sum(valor_empenho)::decimal as empenhado from pad.empenho where remessa = %d and rubrica like '339046%%' and entidade like 'pm' and ano_empenho <= %d and data_empenho between '%s' and '%s'", $remessa, substr($remessa, 0, 4), $data_inicial, $data_final)), 0, 0), 2);
echo sprintf("\tEmpenhado no mês:\t\t\t%s".PHP_EOL, number_format($empenhado_no_mes, 2, ',', '.'));

$empenhado_base = $empenhado_no_mes;
echo sprintf("\tEmpenhado base:\t\t\t\t%s".PHP_EOL, number_format($empenhado_base, 2, ',', '.'));

$meses_a_empenhar = 12 - substr($remessa, 4, 2);
echo sprintf("\tMeses a empenhar:\t\t\t%d".PHP_EOL, $meses_a_empenhar);

$a_empenhar_mensal = $empenhado_base * $meses_a_empenhar;
echo sprintf("\tA empenhar mensal:\t\t\t%s".PHP_EOL, number_format($a_empenhar_mensal, 2, ',', '.'));

$total_a_empenhar_mensal = $a_empenhar_mensal;
echo sprintf("\tTotal a empenhar:\t\t\t%s".PHP_EOL, number_format($total_a_empenhar_mensal, 2, ',', '.'));

$dotacao_necessaria = $empenhado_ate_data_base + $total_a_empenhar_mensal;
echo sprintf("\tDotação necessária:\t\t\t%s".PHP_EOL, number_format($dotacao_necessaria, 2, ',', '.'));

$resultado = $dotacao_atualizada - $dotacao_necessaria;
echo sprintf("\tResultado:\t\t\t\t%s".PHP_EOL, number_format($resultado, 2, ',', '.'));

echo '===================================================================================================='.PHP_EOL;
echo "Dotação Atualizada\tDotação Necessária\tResultado" . PHP_EOL;
echo sprintf("%s\t\t%s\t\t%s" . PHP_EOL, number_format($dotacao_atualizada, 2, ',', '.'), number_format($dotacao_necessaria, 2, ',', '.'), number_format($resultado, 2, ',', '.'));
echo '===================================================================================================='.PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

exit();
