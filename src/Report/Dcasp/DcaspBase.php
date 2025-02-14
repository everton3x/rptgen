<?php

namespace RptGen\Report\Dcasp;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;
use RptGen\Report\ReportBase;

/**
 * Base para DCASP.
 *
 * @author Everton
 */
abstract class DcaspBase extends ReportBase {

    protected readonly string $escopo;
    protected readonly string $consolidado;
    protected readonly string $entidades;
    protected readonly string $sheetName;
    
    
    public function __construct(string $sheetName, Db $con, Spreadsheet $spreadsheet, int $remessa, string $escopo) {
        parent::__construct($con, $spreadsheet, $remessa);
        $this->sheetName = $sheetName;
        $this->escopo = $escopo;
        $this->dataBase = self::getDataBaseFromRemessa($remessa);
        $this->setParametros();
    }

    private function setParametros(): void {
        $sheet_name = 'Parâmetros Manuais';
        $sheet = $this->spreadsheet->setActiveSheetIndexByName($sheet_name);
        
        switch($this->escopo){
            case 'mun':
                $entidade = 'Município de Independência - RS';
                $escopo = 'Consolidado';
                $cnpj = '87.612.826/0001-90';
                $this->consolidado = '_consolidado';
                $this->entidades = "('pm', 'fpsm', 'cm')";
                break;
            case 'pm':
                $entidade = 'Município de Independência - RS';
                $escopo = 'Prefeitura Municipal';
                $cnpj = '87.612.826/0001-90';
                $this->consolidado = '';
                $this->entidades = "('pm')";
                break;
            case 'cm':
                $entidade = 'Município de Independência - RS';
                $escopo = 'Câmara de Vereadores';
                $cnpj = '12.292.535/0001-62';
                $this->consolidado = '';
                $this->entidades = "('cm')";
                break;
            case 'fpsm':
                $entidade = 'Município de Independência - RS';
                $escopo = 'Fundo de Previdência dos Servidores Municipais';
                $cnpj = '12.091.144/0001-80';
                $this->consolidado = '';
                $this->entidades = "('fpsm')";
                break;
        }
        
        $data_base = $this->dataBase->format('d/m/Y');
        printf("\t-> salvando parâmetro: data_base %s" . PHP_EOL, $data_base);
        $sheet->setCellValue('C6', $data_base);
        
        printf("\t-> salvando parâmetro: escopo %s" . PHP_EOL, $escopo);
        $sheet->setCellValue('C3', $escopo);
        
        printf("\t-> salvando parâmetro: entidade %s" . PHP_EOL, $entidade);
        $sheet->setCellValue('C4', $entidade);
        
        printf("\t-> salvando parâmetro: cnpj %s" . PHP_EOL, $cnpj);
        $sheet->setCellValue('C5', $cnpj);


    }

//    public function getCompetenciaStr(int $ano, int $mes): string {
//        $meses = [
//            1 => 'janeiro',
//            2 => 'fevereiro',
//            3 => 'março',
//            4 => 'abril',
//            5 => 'maio',
//            6 => 'junho',
//            7 => 'julho',
//            8 => 'agosto',
//            9 => 'setembro',
//            10 => 'outubro',
//            11 => 'novembro',
//            12 => 'dezembro',
//        ];
//
//        return sprintf('%s de %s', $meses[$mes], $ano);
//    }
}
