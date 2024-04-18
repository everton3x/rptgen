<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


require 'vendor/autoload.php';

$tpl_file = 'tpl/relatorios fiscais v2024.99.00.xlsx';
$tpl_file_dcasp = 'tpl/dcasp v2024.01.99.xlsx';
$dsn = 'host=localhost port=5432 dbname=pmidd user=postgres password=lise890';
$output_dir = 'C:\\Users\\Everton\\Desktop';


echo '===================================================================================================='.PHP_EOL;
echo 'Gerador de relatórios'.PHP_EOL;
echo 'Desenvolvido por Everton da Rosa <everton3x@gmail.com>'.PHP_EOL;
echo '===================================================================================================='.PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

echo 'Conectando ao banco de dados...', PHP_EOL;
$con = new RptGen\Db($dsn);

echo 'Informe o ano do relatório [AAAA]: ';
$ano = 0;
while(true){
    $ano = (int) fgets(STDIN);
    echo PHP_EOL;
    if(strlen($ano) !== 4) {
        echo "Você digitou um ano inválido: $ano", PHP_EOL, 'Tente novamente: ';
    }else{
        break;
    }
}


echo 'Informe o mês do relatório [1 ~ 12]: ';
$ctrl = true;
while($ctrl){
    $mes= (int) fgets(STDIN);
    echo PHP_EOL;
    switch ($mes){
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
        case 7:
        case 8:
        case 9:
        case 10:
        case 11:
        case 12:
            $ctrl = false;
            break;
        default :
            echo "Você digitou um mês inválido: $mes", PHP_EOL, 'Tente novamente: ';
    }
}

$remessa = (int) sprintf('%s%s', $ano, str_pad($mes, 2, '0', STR_PAD_LEFT));

echo PHP_EOL;
echo PHP_EOL;

echo 'Relatórios disponíveis:'.PHP_EOL;
echo PHP_EOL;

$rpt = [
    1 => 'Relatórios Fiscais (RREO + RGF)',
    2 => 'Índices mensais (RCL/DTP)',
    3 => 'Demonstrações Contábeis',
];

foreach ($rpt as $i => $label) {
    printf("[%s ]\t%s".PHP_EOL, str_pad($i, 2, ' ', STR_PAD_LEFT), $label);
}

echo PHP_EOL;

echo 'Selecione um relatório: ';
$rptsel = (int) fgets(STDIN);

switch ($rptsel){
    case 1:
        require 'rpt/fiscal.php';
        break;
    case 2:
        require 'rpt/pessoal.php';
        break;
    case 3:
        require 'rpt/dcasp.php';
        break;
}



$rpt_file = sprintf('%s\%s', $output_dir, $output_name);
echo "Salvando a planilha de relatórios para $rpt_file".PHP_EOL;
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($rpt_file, \PhpOffice\PhpSpreadsheet\Writer\IWriter::DISABLE_PRECALCULATE_FORMULAE);

echo PHP_EOL;
echo PHP_EOL;

echo '===================================================================================================='.PHP_EOL;
echo 'PROCESSO FINALIZADO!', PHP_EOL;