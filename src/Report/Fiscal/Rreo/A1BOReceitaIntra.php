<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 1 - Balanço Orçamentário - Quadro da Receita Intra-Orçamentária
 *
 * @author Everton
 */
final class A1BOReceitaIntra extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A1 BO Receita Intra', $con, $spreadsheet, $remessa);
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
            'C14' => $this->previsaoInicial('111%'),
            'C15' => $this->previsaoInicial('112%'),
            'C16' => $this->previsaoInicial('113%'),
            'C18' => $this->previsaoInicial('121%'),
            'C19' => $this->previsaoInicial('122%'),
            'C20' => $this->previsaoInicial('124%'),
            'C21' => $this->previsaoInicial('131%'),
            'C24' => $this->previsaoInicial('132%'),
            'C25' => $this->previsaoInicial('133%'),
            'C28' => $this->previsaoInicial('136%'),
            'C29' => $this->previsaoInicial('139%'),
            'C30' => $this->previsaoInicial('14%'),
            'C31' => $this->previsaoInicial('15%'),
            'C33' => $this->previsaoInicial('161%'),
            'C34' => $this->previsaoInicial('162%'),
            'C35' => $this->previsaoInicial('163%'),
            'C36' => $this->previsaoInicial('164%'),
            'C37' => $this->previsaoInicial('169%'),
            'C39' => $this->previsaoInicial('171%'),
            'C40' => $this->previsaoInicial('172%'),
            'C41' => $this->previsaoInicial('173%'),
            'C42' => $this->previsaoInicial('174%'),
            'C43' => $this->previsaoInicial('175%'),
            'C44' => $this->previsaoInicial('176%'),
            'C45' => $this->previsaoInicial('179%'),
            'C47' => $this->previsaoInicial('191%'),
            'C48' => $this->previsaoInicial('192%'),
            'C49' => $this->previsaoInicial('193%'),
            'C50' => $this->previsaoInicial('194%'),
            'C51' => $this->previsaoInicial('199%'),
            'C54' => $this->previsaoInicial('211%'),
            'C55' => $this->previsaoInicial('212%'),
            'C57' => $this->previsaoInicial('221%'),
            'C58' => $this->previsaoInicial('222%'),
            'C59' => $this->previsaoInicial('223%'),
            'C60' => $this->previsaoInicial('23%'),
            'C62' => $this->previsaoInicial('241%'),
            'C63' => $this->previsaoInicial('242%'),
            'C64' => $this->previsaoInicial('243%'),
            'C65' => $this->previsaoInicial('244%'),
            'C66' => $this->previsaoInicial('245%'),
            'C67' => $this->previsaoInicial('246%'),
            'C68' => $this->previsaoInicial('249%'),
            'C70' => $this->previsaoInicial('291%'),
            'C71' => $this->previsaoInicial('293%'),
            'C72' => $this->previsaoInicial('294%'),
            'C73' => $this->previsaoInicial('299%'),
            
            'D14' => $this->previsaoAtualizada('111%'),
            'D15' => $this->previsaoAtualizada('112%'),
            'D16' => $this->previsaoAtualizada('113%'),
            'D18' => $this->previsaoAtualizada('121%'),
            'D19' => $this->previsaoAtualizada('122%'),
            'D20' => $this->previsaoAtualizada('124%'),
            'D21' => $this->previsaoAtualizada('131%'),
            'D24' => $this->previsaoAtualizada('132%'),
            'D25' => $this->previsaoAtualizada('133%'),
            'D28' => $this->previsaoAtualizada('136%'),
            'D29' => $this->previsaoAtualizada('139%'),
            'D30' => $this->previsaoAtualizada('14%'),
            'D31' => $this->previsaoAtualizada('15%'),
            'D33' => $this->previsaoAtualizada('161%'),
            'D34' => $this->previsaoAtualizada('162%'),
            'D35' => $this->previsaoAtualizada('163%'),
            'D36' => $this->previsaoAtualizada('164%'),
            'D37' => $this->previsaoAtualizada('169%'),
            'D39' => $this->previsaoAtualizada('171%'),
            'D40' => $this->previsaoAtualizada('172%'),
            'D41' => $this->previsaoAtualizada('173%'),
            'D42' => $this->previsaoAtualizada('174%'),
            'D43' => $this->previsaoAtualizada('175%'),
            'D44' => $this->previsaoAtualizada('176%'),
            'D45' => $this->previsaoAtualizada('179%'),
            'D47' => $this->previsaoAtualizada('191%'),
            'D48' => $this->previsaoAtualizada('192%'),
            'D49' => $this->previsaoAtualizada('193%'),
            'D50' => $this->previsaoAtualizada('194%'),
            'D51' => $this->previsaoAtualizada('199%'),
            'D54' => $this->previsaoAtualizada('211%'),
            'D55' => $this->previsaoAtualizada('212%'),
            'D57' => $this->previsaoAtualizada('221%'),
            'D58' => $this->previsaoAtualizada('222%'),
            'D59' => $this->previsaoAtualizada('223%'),
            'D60' => $this->previsaoAtualizada('23%'),
            'D62' => $this->previsaoAtualizada('241%'),
            'D63' => $this->previsaoAtualizada('242%'),
            'D64' => $this->previsaoAtualizada('243%'),
            'D65' => $this->previsaoAtualizada('244%'),
            'D66' => $this->previsaoAtualizada('245%'),
            'D67' => $this->previsaoAtualizada('246%'),
            'D68' => $this->previsaoAtualizada('249%'),
            'D70' => $this->previsaoAtualizada('291%'),
            'D71' => $this->previsaoAtualizada('293%'),
            'D72' => $this->previsaoAtualizada('294%'),
            'D73' => $this->previsaoAtualizada('299%'),
            
            'E14' => $this->realizadaNoBimestre('111%'),
            'E15' => $this->realizadaNoBimestre('112%'),
            'E16' => $this->realizadaNoBimestre('113%'),
            'E18' => $this->realizadaNoBimestre('121%'),
            'E19' => $this->realizadaNoBimestre('122%'),
            'E20' => $this->realizadaNoBimestre('124%'),
            'E21' => $this->realizadaNoBimestre('131%'),
            'E24' => $this->realizadaNoBimestre('132%'),
            'E25' => $this->realizadaNoBimestre('133%'),
            'E28' => $this->realizadaNoBimestre('136%'),
            'E29' => $this->realizadaNoBimestre('139%'),
            'E30' => $this->realizadaNoBimestre('14%'),
            'E31' => $this->realizadaNoBimestre('15%'),
            'E33' => $this->realizadaNoBimestre('161%'),
            'E34' => $this->realizadaNoBimestre('162%'),
            'E35' => $this->realizadaNoBimestre('163%'),
            'E36' => $this->realizadaNoBimestre('164%'),
            'E37' => $this->realizadaNoBimestre('169%'),
            'E39' => $this->realizadaNoBimestre('171%'),
            'E40' => $this->realizadaNoBimestre('172%'),
            'E41' => $this->realizadaNoBimestre('173%'),
            'E42' => $this->realizadaNoBimestre('174%'),
            'E43' => $this->realizadaNoBimestre('175%'),
            'E44' => $this->realizadaNoBimestre('176%'),
            'E45' => $this->realizadaNoBimestre('179%'),
            'E47' => $this->realizadaNoBimestre('191%'),
            'E48' => $this->realizadaNoBimestre('192%'),
            'E49' => $this->realizadaNoBimestre('193%'),
            'E50' => $this->realizadaNoBimestre('194%'),
            'E51' => $this->realizadaNoBimestre('199%'),
            'E54' => $this->realizadaNoBimestre('211%'),
            'E55' => $this->realizadaNoBimestre('212%'),
            'E57' => $this->realizadaNoBimestre('221%'),
            'E58' => $this->realizadaNoBimestre('222%'),
            'E59' => $this->realizadaNoBimestre('223%'),
            'E60' => $this->realizadaNoBimestre('23%'),
            'E62' => $this->realizadaNoBimestre('241%'),
            'E63' => $this->realizadaNoBimestre('242%'),
            'E64' => $this->realizadaNoBimestre('243%'),
            'E65' => $this->realizadaNoBimestre('244%'),
            'E66' => $this->realizadaNoBimestre('245%'),
            'E67' => $this->realizadaNoBimestre('246%'),
            'E68' => $this->realizadaNoBimestre('249%'),
            'E70' => $this->realizadaNoBimestre('291%'),
            'E71' => $this->realizadaNoBimestre('293%'),
            'E72' => $this->realizadaNoBimestre('294%'),
            'E73' => $this->realizadaNoBimestre('299%'),
            
            'G14' => $this->realizadaAteBimestre('111%'),
            'G15' => $this->realizadaAteBimestre('112%'),
            'G16' => $this->realizadaAteBimestre('113%'),
            'G18' => $this->realizadaAteBimestre('121%'),
            'G19' => $this->realizadaAteBimestre('122%'),
            'G20' => $this->realizadaAteBimestre('124%'),
            'G21' => $this->realizadaAteBimestre('131%'),
            'G24' => $this->realizadaAteBimestre('132%'),
            'G25' => $this->realizadaAteBimestre('133%'),
            'G28' => $this->realizadaAteBimestre('136%'),
            'G29' => $this->realizadaAteBimestre('139%'),
            'G30' => $this->realizadaAteBimestre('14%'),
            'G31' => $this->realizadaAteBimestre('15%'),
            'G33' => $this->realizadaAteBimestre('161%'),
            'G34' => $this->realizadaAteBimestre('162%'),
            'G35' => $this->realizadaAteBimestre('163%'),
            'G36' => $this->realizadaAteBimestre('164%'),
            'G37' => $this->realizadaAteBimestre('169%'),
            'G39' => $this->realizadaAteBimestre('171%'),
            'G40' => $this->realizadaAteBimestre('172%'),
            'G41' => $this->realizadaAteBimestre('173%'),
            'G42' => $this->realizadaAteBimestre('174%'),
            'G43' => $this->realizadaAteBimestre('175%'),
            'G44' => $this->realizadaAteBimestre('176%'),
            'G45' => $this->realizadaAteBimestre('179%'),
            'G47' => $this->realizadaAteBimestre('191%'),
            'G48' => $this->realizadaAteBimestre('192%'),
            'G49' => $this->realizadaAteBimestre('193%'),
            'G50' => $this->realizadaAteBimestre('194%'),
            'G51' => $this->realizadaAteBimestre('199%'),
            'G54' => $this->realizadaAteBimestre('211%'),
            'G55' => $this->realizadaAteBimestre('212%'),
            'G57' => $this->realizadaAteBimestre('221%'),
            'G58' => $this->realizadaAteBimestre('222%'),
            'G59' => $this->realizadaAteBimestre('223%'),
            'G60' => $this->realizadaAteBimestre('23%'),
            'G62' => $this->realizadaAteBimestre('241%'),
            'G63' => $this->realizadaAteBimestre('242%'),
            'G64' => $this->realizadaAteBimestre('243%'),
            'G65' => $this->realizadaAteBimestre('244%'),
            'G66' => $this->realizadaAteBimestre('245%'),
            'G67' => $this->realizadaAteBimestre('246%'),
            'G68' => $this->realizadaAteBimestre('249%'),
            'G70' => $this->realizadaAteBimestre('291%'),
            'G71' => $this->realizadaAteBimestre('293%'),
            'G72' => $this->realizadaAteBimestre('294%'),
            'G73' => $this->realizadaAteBimestre('299%')
        ];
    }

    private function previsaoInicial(string $nro): float {
        $sql = "SELECT SUM(RECEITA_ORCADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND CATEGORIA_RECEITA LIKE 'intra'"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function previsaoAtualizada(string $nro): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND CATEGORIA_RECEITA LIKE 'intra'"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function realizadaNoBimestre(string $nro): float {
        switch ($this->bimestre) {
            case 1:
                $mes1 = 'realizada_jan';
                $mes2 = 'realizada_fev';
                break;
            case 2:
                $mes1 = 'realizada_mar';
                $mes2 = 'realizada_abr';
                break;
            case 3:
                $mes1 = 'realizada_mai';
                $mes2 = 'realizada_jun';
                break;
            case 4:
                $mes1 = 'realizada_jul';
                $mes2 = 'realizada_ago';
                break;
            case 5:
                $mes1 = 'realizada_set';
                $mes2 = 'realizada_out';
                break;
            case 6:
                $mes1 = 'realizada_nov';
                $mes2 = 'realizada_dez';
                break;
        }
        $sql = "SELECT (SUM(%s) + SUM(%s))::decimal
                FROM PAD.RECEITA
                WHERE REMESSA = %s
                        AND CATEGORIA_RECEITA LIKE 'intra'
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND FONTE_RECURSO > 0"
        ;
        $query = sprintf($sql, $mes1, $mes2, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function realizadaAteBimestre(string $nro): float {
        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %d
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND CATEGORIA_RECEITA LIKE 'intra'"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
}
