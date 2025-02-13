<?php

namespace RptGen\Report\Fiscal\Rgf;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RFG Executivo, Anexo 5 - Disponibilidade de caixa e restos a pagar
 *
 * @author Everton
 */
final class A5LegDisponibilidades extends RgfBase
{

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa)
    {
        parent::__construct('RGF A5 Leg 2 Sem', $con, $spreadsheet, $remessa);
    }

    public function run(): void
    {
        printf("\t-> gerando planilha %s" . PHP_EOL, $this->sheetName);

        $sheet = $this->spreadsheet->setActiveSheetIndexByName($this->sheetName);

        foreach ($this->getCellMap() as $cellAddress => $cellValue) {
            $sheet->setCellValue($cellAddress, $cellValue);
        }
    }

    protected function getCellMap(): array
    {
        return [

            'C17' => $this->disponibilidadeBruta([500, 502]),
            'C18' => $this->disponibilidadeBruta([501]),
            'C21' => $this->disponibilidadeBruta([540, 541, 542, 543, 544]),
            'C22' => $this->disponibilidadeBruta([550, 551, 552, 553, 569, 570, 571, 572, 573, 574, 575, 576, 599]),
            'C24' => $this->disponibilidadeBruta([600, 601, 602, 603, 604, 605, 621, 622]),
            'C25' => $this->disponibilidadeBruta([631, 632, 633, 634, 635, 636, 659]),
            'C26' => $this->disponibilidadeBruta([660, 661, 662, 665, 669]),
            'C27' => 0.0,
            'C29' => $this->disponibilidadeBruta([700, 701, 702, 703]),
            'C30' => $this->disponibilidadeBruta([704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 715, 716, 717, 718, 719, 749]),
            'C32' => $this->disponibilidadeBruta([754]),
            'C33' => $this->disponibilidadeBruta([755, 756]),
            'C34' => $this->disponibilidadeBruta([759]),
            'C35' => $this->disponibilidadeBruta([750, 751, 752, 753, 760, 761, 799]),
            'C36' => $this->disponibilidadeBruta([860, 861, 862, 869]),
            'C37' => $this->disponibilidadeBruta([880, 898, 899]),
            'C39' => $this->disponibilidadeBruta([800]),
            'C40' => $this->disponibilidadeBruta([801]),
            'C41' => $this->disponibilidadeBruta([802]),

            'D17' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([500, 502]),
            'D18' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([501]),
            'D21' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([540, 541, 542, 543, 544]),
            'D22' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([550, 551, 552, 553, 569, 570, 571, 572, 573, 574, 575, 576, 599]),
            'D24' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([600, 601, 602, 603, 604, 605, 621, 622]),
            'D25' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([631, 632, 633, 634, 635, 636, 659]),
            'D26' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([660, 661, 662, 665, 669]),
            'D27' => 0.0,
            'D29' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([700, 701, 702, 703]),
            'D30' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 715, 716, 717, 718, 719, 749]),
            'D32' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([754]),
            'D33' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([755, 756]),
            'D34' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([759]),
            'D35' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([750, 751, 752, 753, 760, 761, 799]),
            'D36' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([860, 861, 862, 869]),
            'D37' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([880, 898, 899]),
            'D39' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([800]),
            'D40' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([801]),
            'D41' => $this->restosAPagarLiquidadosNaoPagosAnosAnteriores([802]),

            'E17' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([500, 502]),
            'E18' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([501]),
            'E21' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([540, 541, 542, 543, 544]),
            'E22' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([550, 551, 552, 553, 569, 570, 571, 572, 573, 574, 575, 576, 599]),
            'E24' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([600, 601, 602, 603, 604, 605, 621, 622]),
            'E25' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([631, 632, 633, 634, 635, 636, 659]),
            'E26' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([660, 661, 662, 665, 669]),
            'E27' => 0.0,
            'E29' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([700, 701, 702, 703]),
            'E30' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 715, 716, 717, 718, 719, 749]),
            'E32' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([754]),
            'E33' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([755, 756]),
            'E34' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([759]),
            'E35' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([750, 751, 752, 753, 760, 761, 799]),
            'E36' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([860, 861, 862, 869]),
            'E37' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([880, 898, 899]),
            'E39' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([800]),
            'E40' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([801]),
            'E41' => $this->restosAPagarLiquidadosNaoPagosDoExercicio([802]),

            'F17' => $this->restosAPagarNaoLiquidadosAnosAnteriores([500, 502]),
            'F18' => $this->restosAPagarNaoLiquidadosAnosAnteriores([501]),
            'F21' => $this->restosAPagarNaoLiquidadosAnosAnteriores([540, 541, 542, 543, 544]),
            'F22' => $this->restosAPagarNaoLiquidadosAnosAnteriores([550, 551, 552, 553, 569, 570, 571, 572, 573, 574, 575, 576, 599]),
            'F24' => $this->restosAPagarNaoLiquidadosAnosAnteriores([600, 601, 602, 603, 604, 605, 621, 622]),
            'F25' => $this->restosAPagarNaoLiquidadosAnosAnteriores([631, 632, 633, 634, 635, 636, 659]),
            'F26' => $this->restosAPagarNaoLiquidadosAnosAnteriores([660, 661, 662, 665, 669]),
            'F27' => 0.0,
            'F29' => $this->restosAPagarNaoLiquidadosAnosAnteriores([700, 701, 702, 703]),
            'F30' => $this->restosAPagarNaoLiquidadosAnosAnteriores([704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 715, 716, 717, 718, 719, 749]),
            'F32' => $this->restosAPagarNaoLiquidadosAnosAnteriores([754]),
            'F33' => $this->restosAPagarNaoLiquidadosAnosAnteriores([755, 756]),
            'F34' => $this->restosAPagarNaoLiquidadosAnosAnteriores([759]),
            'F35' => $this->restosAPagarNaoLiquidadosAnosAnteriores([750, 751, 752, 753, 760, 761, 799]),
            'F36' => $this->restosAPagarNaoLiquidadosAnosAnteriores([860, 861, 862, 869]),
            'F37' => $this->restosAPagarNaoLiquidadosAnosAnteriores([880, 898, 899]),
            'F39' => $this->restosAPagarNaoLiquidadosAnosAnteriores([800]),
            'F40' => $this->restosAPagarNaoLiquidadosAnosAnteriores([801]),
            'F41' => $this->restosAPagarNaoLiquidadosAnosAnteriores([802]),

            'G17' => $this->demaisObrigacoesFinanceiras([500, 502]),
            'G18' => $this->demaisObrigacoesFinanceiras([501]),
            'G21' => $this->demaisObrigacoesFinanceiras([540, 541, 542, 543, 544]),
            'G22' => $this->demaisObrigacoesFinanceiras([550, 551, 552, 553, 569, 570, 571, 572, 573, 574, 575, 576, 599]),
            'G24' => $this->demaisObrigacoesFinanceiras([600, 601, 602, 603, 604, 605, 621, 622]),
            'G25' => $this->demaisObrigacoesFinanceiras([631, 632, 633, 634, 635, 636, 659]),
            'G26' => $this->demaisObrigacoesFinanceiras([660, 661, 662, 665, 669]),
            'G27' => 0.0,
            'G29' => $this->demaisObrigacoesFinanceiras([700, 701, 702, 703]),
            'G30' => $this->demaisObrigacoesFinanceiras([704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 715, 716, 717, 718, 719, 749]),
            'G32' => $this->demaisObrigacoesFinanceiras([754]),
            'G33' => $this->demaisObrigacoesFinanceiras([755, 756]),
            'G34' => $this->demaisObrigacoesFinanceiras([759]),
            'G35' => $this->demaisObrigacoesFinanceiras([750, 751, 752, 753, 760, 761, 799]),
            'G36' => $this->demaisObrigacoesFinanceiras([860, 861, 862, 869]),
            'G37' => $this->demaisObrigacoesFinanceiras([880, 898, 899]),
            'G39' => $this->demaisObrigacoesFinanceiras([800]),
            'G40' => $this->demaisObrigacoesFinanceiras([801]),
            'G41' => $this->demaisObrigacoesFinanceiras([802]),

            'J17' => $this->empenhadoNaoLiquidadosNoExercicio([500, 502]),
            'J18' => $this->empenhadoNaoLiquidadosNoExercicio([501]),
            'J21' => $this->empenhadoNaoLiquidadosNoExercicio([540, 541, 542, 543, 544]),
            'J22' => $this->empenhadoNaoLiquidadosNoExercicio([550, 551, 552, 553, 569, 570, 571, 572, 573, 574, 575, 576, 599]),
            'J24' => $this->empenhadoNaoLiquidadosNoExercicio([600, 601, 602, 603, 604, 605, 621, 622]),
            'J25' => $this->empenhadoNaoLiquidadosNoExercicio([631, 632, 633, 634, 635, 636, 659]),
            'J26' => $this->empenhadoNaoLiquidadosNoExercicio([660, 661, 662, 665, 669]),
            'J27' => 0.0,
            'J29' => $this->empenhadoNaoLiquidadosNoExercicio([700, 701, 702, 703]),
            'J30' => $this->empenhadoNaoLiquidadosNoExercicio([704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 715, 716, 717, 718, 719, 749]),
            'J32' => $this->empenhadoNaoLiquidadosNoExercicio([754]),
            'J33' => $this->empenhadoNaoLiquidadosNoExercicio([755, 756]),
            'J34' => $this->empenhadoNaoLiquidadosNoExercicio([759]),
            'J35' => $this->empenhadoNaoLiquidadosNoExercicio([750, 751, 752, 753, 760, 761, 799]),
            'J36' => $this->empenhadoNaoLiquidadosNoExercicio([860, 861, 862, 869]),
            'J37' => $this->empenhadoNaoLiquidadosNoExercicio([880, 898, 899]),
            'J39' => $this->empenhadoNaoLiquidadosNoExercicio([800]),
            'J40' => $this->empenhadoNaoLiquidadosNoExercicio([801]),
            'J41' => $this->empenhadoNaoLiquidadosNoExercicio([802]),
        ];
    }

    private function empenhadoNaoLiquidadosNoExercicio(array $fr): float
    {
        $listaFr = join(',', $fr);
        $sql = "
        SELECT
            SUM(empenhado_a_liquidar)::DECIMAL AS saldo
        FROM PAD.bal_desp
        WHERE remessa = %d
            AND entidade IN ('cm')
            AND fonte_recurso IN (%s)
        ";
        $query = sprintf($sql, $this->remessa, $listaFr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function demaisObrigacoesFinanceiras(array $fr): float
    {
        $listaFr = join(',', $fr);
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '2188%%'
                        AND ESCRITURACAO LIKE 'S'
                        AND indicador_superavit_financeiro LIKE 'F'
                        AND ENTIDADE IN ('cm')
                        AND fonte_recurso IN (%s)
        ";
        $query = sprintf($sql, $this->remessa, $listaFr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function restosAPagarNaoLiquidadosAnosAnteriores(array $fr): float
    {
        $listaFr = join(',', $fr);
        $sql = "
        SELECT
            SUM(saldo_final_nao_processado)::DECIMAL AS saldo
        FROM PAD.restos_pagar
        WHERE remessa = %d
            AND entidade IN ('cm')
            AND ano_empenho < %d
            AND fonte_recurso IN (%s)
        ";
        $query = sprintf($sql, $this->remessa, $this->dataBase->format('Y'), $listaFr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function restosAPagarLiquidadosNaoPagosDoExercicio(array $fr): float
    {
        $listaFr = join(',', $fr);
        $sql = "
        SELECT
            SUM(liquidado_a_pagar)::DECIMAL AS saldo
        FROM PAD.bal_desp
        WHERE remessa = %d
            AND entidade IN ('cm')
            AND fonte_recurso IN (%s)
        ";
        $query = sprintf($sql, $this->remessa, $listaFr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }

    private function restosAPagarLiquidadosNaoPagosAnosAnteriores(array $fr): float
    {
        $listaFr = join(',', $fr);
        $sql = "
        SELECT
            SUM(saldo_final_processado)::DECIMAL AS saldo
        FROM PAD.restos_pagar
        WHERE remessa = %d
            AND entidade IN ('cm')
            AND ano_empenho < %d
            AND fonte_recurso IN (%s)
        ";
        $query = sprintf($sql, $this->remessa, $this->dataBase->format('Y'), $listaFr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }


    private function disponibilidadeBruta(array $fr): float
    {
        $listaFr = join(',', $fr);
        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
                FROM PAD.BAL_VER
                WHERE REMESSA = %s
                        AND CONTA_CONTABIL LIKE '111%%'
                        AND ESCRITURACAO LIKE 'S'
                        AND indicador_superavit_financeiro LIKE 'F'
                        AND ENTIDADE IN ('cm')
                        AND fonte_recurso IN (%s)
        ";
        $query = sprintf($sql, $this->remessa, $listaFr);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }



}
