<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 3 - Receita Corrente Líquida
 *
 * @author Everton
 */
final class A3Rcl extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A3', $con, $spreadsheet, $remessa);
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
            'C11' => $this->getMesBase(11)->format('m/Y'),
            'D11' => $this->getMesBase(10)->format('m/Y'),
            'E11' => $this->getMesBase(9)->format('m/Y'),
            'F11' => $this->getMesBase(8)->format('m/Y'),
            'G11' => $this->getMesBase(7)->format('m/Y'),
            'H11' => $this->getMesBase(6)->format('m/Y'),
            'I11' => $this->getMesBase(5)->format('m/Y'),
            'J11' => $this->getMesBase(4)->format('m/Y'),
            'K11' => $this->getMesBase(3)->format('m/Y'),
            'L11' => $this->getMesBase(2)->format('m/Y'),
            'M11' => $this->getMesBase(1)->format('m/Y'),
            'N11' => $this->getMesBase(0)->format('m/Y'),
            
            'C14' => $this->arrecadado('111250%', 11),
            'D14' => $this->arrecadado('111250%', 10),
            'E14' => $this->arrecadado('111250%', 9),
            'F14' => $this->arrecadado('111250%', 8),
            'G14' => $this->arrecadado('111250%', 7),
            'H14' => $this->arrecadado('111250%', 6),
            'I14' => $this->arrecadado('111250%', 5),
            'J14' => $this->arrecadado('111250%', 4),
            'K14' => $this->arrecadado('111250%', 3),
            'L14' => $this->arrecadado('111250%', 2),
            'M14' => $this->arrecadado('111250%', 1),
            'N14' => $this->arrecadado('111250%', 0),
            
            'C15' => $this->arrecadado('1114511%', 11),
            'D15' => $this->arrecadado('1114511%', 10),
            'E15' => $this->arrecadado('1114511%', 9),
            'F15' => $this->arrecadado('1114511%', 8),
            'G15' => $this->arrecadado('1114511%', 7),
            'H15' => $this->arrecadado('1114511%', 6),
            'I15' => $this->arrecadado('1114511%', 5),
            'J15' => $this->arrecadado('1114511%', 4),
            'K15' => $this->arrecadado('1114511%', 3),
            'L15' => $this->arrecadado('1114511%', 2),
            'M15' => $this->arrecadado('1114511%', 1),
            'N15' => $this->arrecadado('1114511%', 0),
            
            'C16' => $this->arrecadado('111253%', 11),
            'D16' => $this->arrecadado('111253%', 10),
            'E16' => $this->arrecadado('111253%', 9),
            'F16' => $this->arrecadado('111253%', 8),
            'G16' => $this->arrecadado('111253%', 7),
            'H16' => $this->arrecadado('111253%', 6),
            'I16' => $this->arrecadado('111253%', 5),
            'J16' => $this->arrecadado('111253%', 4),
            'K16' => $this->arrecadado('111253%', 3),
            'L16' => $this->arrecadado('111253%', 2),
            'M16' => $this->arrecadado('111253%', 1),
            'N16' => $this->arrecadado('111253%', 0),
            
            'C17' => $this->arrecadado('111303%', 11),
            'D17' => $this->arrecadado('111303%', 10),
            'E17' => $this->arrecadado('111303%', 9),
            'F17' => $this->arrecadado('111303%', 8),
            'G17' => $this->arrecadado('111303%', 7),
            'H17' => $this->arrecadado('111303%', 6),
            'I17' => $this->arrecadado('111303%', 5),
            'J17' => $this->arrecadado('111303%', 4),
            'K17' => $this->arrecadado('111303%', 3),
            'L17' => $this->arrecadado('111303%', 2),
            'M17' => $this->arrecadado('111303%', 1),
            'N17' => $this->arrecadado('111303%', 0),
            
            'C18' => round($this->arrecadado('1119%', 11)+$this->arrecadado('112%', 11)+$this->arrecadado('113%', 11), 2),
            'D18' => round($this->arrecadado('1119%', 10)+$this->arrecadado('112%', 10)+$this->arrecadado('113%', 10), 2),
            'E18' => round($this->arrecadado('1119%', 9)+$this->arrecadado('112%', 9)+$this->arrecadado('113%', 9), 2),
            'F18' => round($this->arrecadado('1119%', 8)+$this->arrecadado('112%', 8)+$this->arrecadado('113%', 8), 2),
            'G18' => round($this->arrecadado('1119%', 7)+$this->arrecadado('112%', 7)+$this->arrecadado('113%', 7), 2),
            'H18' => round($this->arrecadado('1119%', 6)+$this->arrecadado('112%', 6)+$this->arrecadado('113%', 6), 2),
            'I18' => round($this->arrecadado('1119%', 5)+$this->arrecadado('112%', 5)+$this->arrecadado('113%', 5), 2),
            'J18' => round($this->arrecadado('1119%', 4)+$this->arrecadado('112%', 4)+$this->arrecadado('113%', 4), 2),
            'K18' => round($this->arrecadado('1119%', 3)+$this->arrecadado('112%', 3)+$this->arrecadado('113%', 3), 2),
            'L18' => round($this->arrecadado('1119%', 2)+$this->arrecadado('112%', 2)+$this->arrecadado('113%', 2), 2),
            'M18' => round($this->arrecadado('1119%', 1)+$this->arrecadado('112%', 1)+$this->arrecadado('113%', 1), 2),
            'N18' => round($this->arrecadado('1119%', 0)+$this->arrecadado('112%', 0)+$this->arrecadado('113%', 0), 2),
            
            'C19' => $this->arrecadado('12%', 11),
            'D19' => $this->arrecadado('12%', 10),
            'E19' => $this->arrecadado('12%', 9),
            'F19' => $this->arrecadado('12%', 8),
            'G19' => $this->arrecadado('12%', 7),
            'H19' => $this->arrecadado('12%', 6),
            'I19' => $this->arrecadado('12%', 5),
            'J19' => $this->arrecadado('12%', 4),
            'K19' => $this->arrecadado('12%', 3),
            'L19' => $this->arrecadado('12%', 2),
            'M19' => $this->arrecadado('12%', 1),
            'N19' => $this->arrecadado('12%', 0),
            
            'C21' => $this->arrecadado('132%', 11),
            'D21' => $this->arrecadado('132%', 10),
            'E21' => $this->arrecadado('132%', 9),
            'F21' => $this->arrecadado('132%', 8),
            'G21' => $this->arrecadado('132%', 7),
            'H21' => $this->arrecadado('132%', 6),
            'I21' => $this->arrecadado('132%', 5),
            'J21' => $this->arrecadado('132%', 4),
            'K21' => $this->arrecadado('132%', 3),
            'L21' => $this->arrecadado('132%', 2),
            'M21' => $this->arrecadado('132%', 1),
            'N21' => $this->arrecadado('132%', 0),
            
            'C22' => round($this->arrecadado('131%', 11)+$this->arrecadado('133%', 11)+$this->arrecadado('136%', 11)+$this->arrecadado('139%', 11), 2),
            'D22' => round($this->arrecadado('131%', 10)+$this->arrecadado('133%', 10)+$this->arrecadado('136%', 10)+$this->arrecadado('139%', 10), 2),
            'E22' => round($this->arrecadado('131%', 9)+$this->arrecadado('133%', 9)+$this->arrecadado('136%', 9)+$this->arrecadado('139%', 9), 2),
            'F22' => round($this->arrecadado('131%', 8)+$this->arrecadado('133%', 8)+$this->arrecadado('136%', 8)+$this->arrecadado('139%', 8), 2),
            'G22' => round($this->arrecadado('131%', 7)+$this->arrecadado('133%', 7)+$this->arrecadado('136%', 7)+$this->arrecadado('139%', 7), 2),
            'H22' => round($this->arrecadado('131%', 6)+$this->arrecadado('133%', 6)+$this->arrecadado('136%', 6)+$this->arrecadado('139%', 6), 2),
            'I22' => round($this->arrecadado('131%', 5)+$this->arrecadado('133%', 5)+$this->arrecadado('136%', 5)+$this->arrecadado('139%', 5), 2),
            'J22' => round($this->arrecadado('131%', 4)+$this->arrecadado('133%', 4)+$this->arrecadado('136%', 4)+$this->arrecadado('139%', 4), 2),
            'K22' => round($this->arrecadado('131%', 3)+$this->arrecadado('133%', 3)+$this->arrecadado('136%', 3)+$this->arrecadado('139%', 3), 2),
            'L22' => round($this->arrecadado('131%', 2)+$this->arrecadado('133%', 2)+$this->arrecadado('136%', 2)+$this->arrecadado('139%', 2), 2),
            'M22' => round($this->arrecadado('131%', 1)+$this->arrecadado('133%', 1)+$this->arrecadado('136%', 1)+$this->arrecadado('139%', 1), 2),
            'N22' => round($this->arrecadado('131%', 0)+$this->arrecadado('133%', 0)+$this->arrecadado('136%', 0)+$this->arrecadado('139%', 0), 2),
            
            'C23' => $this->arrecadado('14%', 11),
            'D23' => $this->arrecadado('14%', 10),
            'E23' => $this->arrecadado('14%', 9),
            'F23' => $this->arrecadado('14%', 8),
            'G23' => $this->arrecadado('14%', 7),
            'H23' => $this->arrecadado('14%', 6),
            'I23' => $this->arrecadado('14%', 5),
            'J23' => $this->arrecadado('14%', 4),
            'K23' => $this->arrecadado('14%', 3),
            'L23' => $this->arrecadado('14%', 2),
            'M23' => $this->arrecadado('14%', 1),
            'N23' => $this->arrecadado('14%', 0),
            
            'C24' => $this->arrecadado('15%', 11),
            'D24' => $this->arrecadado('15%', 10),
            'E24' => $this->arrecadado('15%', 9),
            'F24' => $this->arrecadado('15%', 8),
            'G24' => $this->arrecadado('15%', 7),
            'H24' => $this->arrecadado('15%', 6),
            'I24' => $this->arrecadado('15%', 5),
            'J24' => $this->arrecadado('15%', 4),
            'K24' => $this->arrecadado('15%', 3),
            'L24' => $this->arrecadado('15%', 2),
            'M24' => $this->arrecadado('15%', 1),
            'N24' => $this->arrecadado('15%', 0),
            
            'C25' => $this->arrecadado('16%', 11),
            'D25' => $this->arrecadado('16%', 10),
            'E25' => $this->arrecadado('16%', 9),
            'F25' => $this->arrecadado('16%', 8),
            'G25' => $this->arrecadado('16%', 7),
            'H25' => $this->arrecadado('16%', 6),
            'I25' => $this->arrecadado('16%', 5),
            'J25' => $this->arrecadado('16%', 4),
            'K25' => $this->arrecadado('16%', 3),
            'L25' => $this->arrecadado('16%', 2),
            'M25' => $this->arrecadado('16%', 1),
            'N25' => $this->arrecadado('16%', 0),
            
            'C27' => $this->arrecadado('171151%', 11),
            'D27' => $this->arrecadado('171151%', 10),
            'E27' => $this->arrecadado('171151%', 9),
            'F27' => $this->arrecadado('171151%', 8),
            'G27' => $this->arrecadado('171151%', 7),
            'H27' => $this->arrecadado('171151%', 6),
            'I27' => $this->arrecadado('171151%', 5),
            'J27' => $this->arrecadado('171151%', 4),
            'K27' => $this->arrecadado('171151%', 3),
            'L27' => $this->arrecadado('171151%', 2),
            'M27' => $this->arrecadado('171151%', 1),
            'N27' => $this->arrecadado('171151%', 0),
            
            'C28' => $this->arrecadado('172150%', 11),
            'D28' => $this->arrecadado('172150%', 10),
            'E28' => $this->arrecadado('172150%', 9),
            'F28' => $this->arrecadado('172150%', 8),
            'G28' => $this->arrecadado('172150%', 7),
            'H28' => $this->arrecadado('172150%', 6),
            'I28' => $this->arrecadado('172150%', 5),
            'J28' => $this->arrecadado('172150%', 4),
            'K28' => $this->arrecadado('172150%', 3),
            'L28' => $this->arrecadado('172150%', 2),
            'M28' => $this->arrecadado('172150%', 1),
            'N28' => $this->arrecadado('172150%', 0),
            
            'C29' => $this->arrecadado('172151%', 11),
            'D29' => $this->arrecadado('172151%', 10),
            'E29' => $this->arrecadado('172151%', 9),
            'F29' => $this->arrecadado('172151%', 8),
            'G29' => $this->arrecadado('172151%', 7),
            'H29' => $this->arrecadado('172151%', 6),
            'I29' => $this->arrecadado('172151%', 5),
            'J29' => $this->arrecadado('172151%', 4),
            'K29' => $this->arrecadado('172151%', 3),
            'L29' => $this->arrecadado('172151%', 2),
            'M29' => $this->arrecadado('172151%', 1),
            'N29' => $this->arrecadado('172151%', 0),
            
            'C30' => $this->arrecadado('171152%', 11),
            'D30' => $this->arrecadado('171152%', 10),
            'E30' => $this->arrecadado('171152%', 9),
            'F30' => $this->arrecadado('171152%', 8),
            'G30' => $this->arrecadado('171152%', 7),
            'H30' => $this->arrecadado('171152%', 6),
            'I30' => $this->arrecadado('171152%', 5),
            'J30' => $this->arrecadado('171152%', 4),
            'K30' => $this->arrecadado('171152%', 3),
            'L30' => $this->arrecadado('171152%', 2),
            'M30' => $this->arrecadado('171152%', 1),
            'N30' => $this->arrecadado('171152%', 0),
            
            'C31' => $this->arrecadado('172152%', 11),
            'D31' => $this->arrecadado('172152%', 10),
            'E31' => $this->arrecadado('172152%', 9),
            'F31' => $this->arrecadado('172152%', 8),
            'G31' => $this->arrecadado('172152%', 7),
            'H31' => $this->arrecadado('172152%', 6),
            'I31' => $this->arrecadado('172152%', 5),
            'J31' => $this->arrecadado('172152%', 4),
            'K31' => $this->arrecadado('172152%', 3),
            'L31' => $this->arrecadado('172152%', 2),
            'M31' => $this->arrecadado('172152%', 1),
            'N31' => $this->arrecadado('172152%', 0),
            
            'C32' => round($this->arrecadado('175150%', 11)+$this->arrecadado('1715%', 11), 2),
            'D32' => round($this->arrecadado('175150%', 10)+$this->arrecadado('1715%', 10), 2),
            'E32' => round($this->arrecadado('175150%', 9)+$this->arrecadado('1715%', 9), 2),
            'F32' => round($this->arrecadado('175150%', 8)+$this->arrecadado('1715%', 8), 2),
            'G32' => round($this->arrecadado('175150%', 7)+$this->arrecadado('1715%', 7), 2),
            'H32' => round($this->arrecadado('175150%', 6)+$this->arrecadado('1715%', 6), 2),
            'I32' => round($this->arrecadado('175150%', 5)+$this->arrecadado('1715%', 5), 2),
            'J32' => round($this->arrecadado('175150%', 4)+$this->arrecadado('1715%', 4), 2),
            'K32' => round($this->arrecadado('175150%', 3)+$this->arrecadado('1715%', 3), 2),
            'L32' => round($this->arrecadado('175150%', 2)+$this->arrecadado('1715%', 2), 2),
            'M32' => round($this->arrecadado('175150%', 1)+$this->arrecadado('1715%', 1), 2),
            'N32' => round($this->arrecadado('175150%', 0)+$this->arrecadado('1715%', 0), 2),
            
            'C33' => round($this->arrecadado('1712%', 11)+$this->arrecadado('1713%', 11)+$this->arrecadado('1714%', 11)+$this->arrecadado('1716%', 11)+$this->arrecadado('1717%', 11)+$this->arrecadado('1719%', 11)+$this->arrecadado('172153%', 11)+$this->arrecadado('1723%', 11)+$this->arrecadado('1724%', 11)+$this->arrecadado('1729%', 11)+$this->arrecadado('174%', 11)+$this->arrecadado('179%', 11), 2),
            'D33' => round($this->arrecadado('1712%', 10)+$this->arrecadado('1713%', 10)+$this->arrecadado('1714%', 10)+$this->arrecadado('1716%', 10)+$this->arrecadado('1717%', 10)+$this->arrecadado('1719%', 10)+$this->arrecadado('172153%', 10)+$this->arrecadado('1723%', 10)+$this->arrecadado('1724%', 10)+$this->arrecadado('1729%', 10)+$this->arrecadado('174%', 10)+$this->arrecadado('179%', 10), 2),
            'E33' => round($this->arrecadado('1712%', 9)+$this->arrecadado('1713%', 9)+$this->arrecadado('1714%', 9)+$this->arrecadado('1716%', 9)+$this->arrecadado('1717%', 9)+$this->arrecadado('1719%', 9)+$this->arrecadado('172153%', 9)+$this->arrecadado('1723%', 9)+$this->arrecadado('1724%', 9)+$this->arrecadado('1729%', 9)+$this->arrecadado('174%', 9)+$this->arrecadado('179%', 9), 2),
            'F33' => round($this->arrecadado('1712%', 8)+$this->arrecadado('1713%', 8)+$this->arrecadado('1714%', 8)+$this->arrecadado('1716%', 8)+$this->arrecadado('1717%', 8)+$this->arrecadado('1719%', 8)+$this->arrecadado('172153%', 8)+$this->arrecadado('1723%', 8)+$this->arrecadado('1724%', 8)+$this->arrecadado('1729%', 8)+$this->arrecadado('174%', 8)+$this->arrecadado('179%', 8), 2),
            'G33' => round($this->arrecadado('1712%', 7)+$this->arrecadado('1713%', 7)+$this->arrecadado('1714%', 7)+$this->arrecadado('1716%', 7)+$this->arrecadado('1717%', 7)+$this->arrecadado('1719%', 7)+$this->arrecadado('172153%', 7)+$this->arrecadado('1723%', 7)+$this->arrecadado('1724%', 7)+$this->arrecadado('1729%', 7)+$this->arrecadado('174%', 7)+$this->arrecadado('179%', 7), 2),
            'H33' => round($this->arrecadado('1712%', 6)+$this->arrecadado('1713%', 6)+$this->arrecadado('1714%', 6)+$this->arrecadado('1716%', 6)+$this->arrecadado('1717%', 6)+$this->arrecadado('1719%', 6)+$this->arrecadado('172153%', 6)+$this->arrecadado('1723%', 6)+$this->arrecadado('1724%', 6)+$this->arrecadado('1729%', 6)+$this->arrecadado('174%', 6)+$this->arrecadado('179%', 6), 2),
            'I33' => round($this->arrecadado('1712%', 5)+$this->arrecadado('1713%', 5)+$this->arrecadado('1714%', 5)+$this->arrecadado('1716%', 5)+$this->arrecadado('1717%', 5)+$this->arrecadado('1719%', 5)+$this->arrecadado('172153%', 5)+$this->arrecadado('1723%', 5)+$this->arrecadado('1724%', 5)+$this->arrecadado('1729%', 5)+$this->arrecadado('174%', 5)+$this->arrecadado('179%', 5), 2),
            'J33' => round($this->arrecadado('1712%', 4)+$this->arrecadado('1713%', 4)+$this->arrecadado('1714%', 4)+$this->arrecadado('1716%', 4)+$this->arrecadado('1717%', 4)+$this->arrecadado('1719%', 4)+$this->arrecadado('172153%', 4)+$this->arrecadado('1723%', 4)+$this->arrecadado('1724%', 4)+$this->arrecadado('1729%', 4)+$this->arrecadado('174%', 4)+$this->arrecadado('179%', 4), 2),
            'K33' => round($this->arrecadado('1712%', 3)+$this->arrecadado('1713%', 3)+$this->arrecadado('1714%', 3)+$this->arrecadado('1716%', 3)+$this->arrecadado('1717%', 3)+$this->arrecadado('1719%', 3)+$this->arrecadado('172153%', 3)+$this->arrecadado('1723%', 3)+$this->arrecadado('1724%', 3)+$this->arrecadado('1729%', 3)+$this->arrecadado('174%', 3)+$this->arrecadado('179%', 3), 2),
            'L33' => round($this->arrecadado('1712%', 2)+$this->arrecadado('1713%', 2)+$this->arrecadado('1714%', 2)+$this->arrecadado('1716%', 2)+$this->arrecadado('1717%', 2)+$this->arrecadado('1719%', 2)+$this->arrecadado('172153%', 2)+$this->arrecadado('1723%', 2)+$this->arrecadado('1724%', 2)+$this->arrecadado('1729%', 2)+$this->arrecadado('174%', 2)+$this->arrecadado('179%', 2), 2),
            'M33' => round($this->arrecadado('1712%', 1)+$this->arrecadado('1713%', 1)+$this->arrecadado('1714%', 1)+$this->arrecadado('1716%', 1)+$this->arrecadado('1717%', 1)+$this->arrecadado('1719%', 1)+$this->arrecadado('172153%', 1)+$this->arrecadado('1723%', 1)+$this->arrecadado('1724%', 1)+$this->arrecadado('1729%', 1)+$this->arrecadado('174%', 1)+$this->arrecadado('179%', 1), 2),
            'N33' => round($this->arrecadado('1712%', 0)+$this->arrecadado('1713%', 0)+$this->arrecadado('1714%', 0)+$this->arrecadado('1716%', 0)+$this->arrecadado('1717%', 0)+$this->arrecadado('1719%', 0)+$this->arrecadado('172153%', 0)+$this->arrecadado('1723%', 0)+$this->arrecadado('1724%', 0)+$this->arrecadado('1729%', 0)+$this->arrecadado('174%', 0)+$this->arrecadado('179%', 0), 2),
            
            'C34' => $this->arrecadado('19%', 11),
            'D34' => $this->arrecadado('19%', 10),
            'E34' => $this->arrecadado('19%', 9),
            'F34' => $this->arrecadado('19%', 8),
            'G34' => $this->arrecadado('19%', 7),
            'H34' => $this->arrecadado('19%', 6),
            'I34' => $this->arrecadado('19%', 5),
            'J34' => $this->arrecadado('19%', 4),
            'K34' => $this->arrecadado('19%', 3),
            'L34' => $this->arrecadado('19%', 2),
            'M34' => $this->arrecadado('19%', 1),
            'N34' => $this->arrecadado('19%', 0),
            
            'C36' => $this->arrecadado('1215%', 11),
            'D36' => $this->arrecadado('1215%', 10),
            'E36' => $this->arrecadado('1215%', 9),
            'F36' => $this->arrecadado('1215%', 8),
            'G36' => $this->arrecadado('1215%', 7),
            'H36' => $this->arrecadado('1215%', 6),
            'I36' => $this->arrecadado('1215%', 5),
            'J36' => $this->arrecadado('1215%', 4),
            'K36' => $this->arrecadado('1215%', 3),
            'L36' => $this->arrecadado('1215%', 2),
            'M36' => $this->arrecadado('1215%', 1),
            'N36' => $this->arrecadado('1215%', 0),
            
            'C37' => $this->arrecadado('199903%', 11),
            'D37' => $this->arrecadado('199903%', 10),
            'E37' => $this->arrecadado('199903%', 9),
            'F37' => $this->arrecadado('199903%', 8),
            'G37' => $this->arrecadado('199903%', 7),
            'H37' => $this->arrecadado('199903%', 6),
            'I37' => $this->arrecadado('199903%', 5),
            'J37' => $this->arrecadado('199903%', 4),
            'K37' => $this->arrecadado('199903%', 3),
            'L37' => $this->arrecadado('199903%', 2),
            'M37' => $this->arrecadado('199903%', 1),
            'N37' => $this->arrecadado('199903%', 0),
            
            'C38' => $this->arrecadado('132104%', 11),
            'D38' => $this->arrecadado('132104%', 10),
            'E38' => $this->arrecadado('132104%', 9),
            'F38' => $this->arrecadado('132104%', 8),
            'G38' => $this->arrecadado('132104%', 7),
            'H38' => $this->arrecadado('132104%', 6),
            'I38' => $this->arrecadado('132104%', 5),
            'J38' => $this->arrecadado('132104%', 4),
            'K38' => $this->arrecadado('132104%', 3),
            'L38' => $this->arrecadado('132104%', 2),
            'M38' => $this->arrecadado('132104%', 1),
            'N38' => $this->arrecadado('132104%', 0),
            
            'C39' => $this->deducaoFundeb(11),
            'D39' => $this->deducaoFundeb(10),
            'E39' => $this->deducaoFundeb(9),
            'F39' => $this->deducaoFundeb(8),
            'G39' => $this->deducaoFundeb(7),
            'H39' => $this->deducaoFundeb(6),
            'I39' => $this->deducaoFundeb(5),
            'J39' => $this->deducaoFundeb(4),
            'K39' => $this->deducaoFundeb(3),
            'L39' => $this->deducaoFundeb(2),
            'M39' => $this->deducaoFundeb(1),
            'N39' => $this->deducaoFundeb(0),
            
            'C41' => $this->emendas(3110, 11),
            'D41' => $this->emendas(3110, 10),
            'E41' => $this->emendas(3110, 9),
            'F41' => $this->emendas(3110, 8),
            'G41' => $this->emendas(3110, 7),
            'H41' => $this->emendas(3110, 6),
            'I41' => $this->emendas(3110, 5),
            'J41' => $this->emendas(3110, 4),
            'K41' => $this->emendas(3110, 3),
            'L41' => $this->emendas(3110, 2),
            'M41' => $this->emendas(3110, 1),
            'N41' => $this->emendas(3110, 0),
            
            'C43' => $this->emendas(3120, 11),
            'D43' => $this->emendas(3120, 10),
            'E43' => $this->emendas(3120, 9),
            'F43' => $this->emendas(3120, 8),
            'G43' => $this->emendas(3120, 7),
            'H43' => $this->emendas(3120, 6),
            'I43' => $this->emendas(3120, 5),
            'J43' => $this->emendas(3120, 4),
            'K43' => $this->emendas(3120, 3),
            'L43' => $this->emendas(3120, 2),
            'M43' => $this->emendas(3120, 1),
            'N43' => $this->emendas(3120, 0),
            
            'C44' => $this->pisoAcsAce(11),
            'D44' => $this->pisoAcsAce(10),
            'E44' => $this->pisoAcsAce(9),
            'F44' => $this->pisoAcsAce(8),
            'G44' => $this->pisoAcsAce(7),
            'H44' => $this->pisoAcsAce(6),
            'I44' => $this->pisoAcsAce(5),
            'J44' => $this->pisoAcsAce(4),
            'K44' => $this->pisoAcsAce(3),
            'L44' => $this->pisoAcsAce(2),
            'M44' => $this->pisoAcsAce(1),
            'N44' => $this->pisoAcsAce(0),
            
            'C45' => $this->outrasDeducoes(11),
            'D45' => $this->outrasDeducoes(10),
            'E45' => $this->outrasDeducoes(9),
            'F45' => $this->outrasDeducoes(8),
            'G45' => $this->outrasDeducoes(7),
            'H45' => $this->outrasDeducoes(6),
            'I45' => $this->outrasDeducoes(5),
            'J45' => $this->outrasDeducoes(4),
            'K45' => $this->outrasDeducoes(3),
            'L45' => $this->outrasDeducoes(2),
            'M45' => $this->outrasDeducoes(1),
            'N45' => $this->outrasDeducoes(0),
            
            'P14' => $this->previsto('111250%'),
            'P15' => $this->previsto('1114511%'),
            'P15' => $this->previsto('1114511%'),
            'P16' => $this->previsto('111253%'),
            'P17' => $this->previsto('111303%'),
            'P18' => round($this->previsto('1119%')+$this->previsto('112%')+$this->previsto('113%'), 2),
            'P19' => $this->previsto('12%'),
            'P21' => $this->previsto('132%'),
            'P22' => round($this->previsto('131%')+$this->previsto('133%')+$this->previsto('136%')+$this->previsto('139%'), 2),
            'P23' => $this->previsto('14%'),
            'P24' => $this->previsto('15%'),
            'P25' => $this->previsto('16%'),
            'P27' => $this->previsto('171151%'),
            'P28' => $this->previsto('172150%'),
            'P29' => $this->previsto('172151%'),
            'P30' => $this->previsto('171152%'),
            'P31' => $this->previsto('172152%'),
            'P32' => round($this->previsto('175150%')+$this->previsto('1715%'), 2),
            'P33' => round($this->previsto('1712%')+$this->previsto('1713%')+$this->previsto('1714%')+$this->previsto('1716%')+$this->previsto('1717%')+$this->previsto('1719%')+$this->previsto('172153%')+$this->previsto('1723%')+$this->previsto('1724%')+$this->previsto('1729%')+$this->previsto('174%')+$this->previsto('179%'), 2),
            'P34' => $this->previsto('19%'),
            'P36' => $this->previsto('1215%'),
            'P37' => $this->previsto('199903%'),
            'P38' => $this->previsto('132104%'),
            'P39' => $this->previstoDeducaoFundeb(),
            'P41' => $this->previstoEmendas(3110),
            'P43' => $this->previstoEmendas(3120),
            'P44' => $this->previstoPisoAcsAce(),
            'P45' => $this->previstoOutrasDeducoes(),

            
        ];
    }
    
    private function previstoOutrasDeducoes(): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        --AND NATUREZA_RECEITA LIKE '171%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = 605
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previstoPisoAcsAce(): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        --AND NATUREZA_RECEITA LIKE '171%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO = 604
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previstoEmendas(int $co): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '171%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = %d"
        ;
        $query = sprintf($sql, $this->remessa, $co);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previstoDeducaoFundeb(): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal * -1
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '17%%'
                        AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
                        AND CARACTERISTICA_PECULIAR_RECEITA = 105"
        ;
        $query = sprintf($sql, $this->remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function previsto(string $nro): float {
        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
                FROM PAD.BAL_REC
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        --AND TIPO_NIVEL_RECEITA LIKE 'A'
                        AND FONTE_RECURSO > 0
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
                        AND CARACTERISTICA_PECULIAR_RECEITA != 105"
        ;
        $query = sprintf($sql, $this->remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function outrasDeducoes(int $posicao): float {
        $sql = "SELECT SUM(%s)::decimal
                FROM PAD.RECEITA
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '171%%'
                        AND FONTE_RECURSO = 605
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
        ;
        $dt = $this->getMesBase($posicao);
        $campo = $this->getCampoMes((int) $dt->format('m'));
        $remessa = $this->getRemessa($dt);
        
        $query = sprintf($sql, $campo, $remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function pisoAcsAce(int $posicao): float {
        $sql = "SELECT SUM(%s)::decimal
                FROM PAD.RECEITA
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '171%%'
                        AND FONTE_RECURSO = 604
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
        ;
        $dt = $this->getMesBase($posicao);
        $campo = $this->getCampoMes((int) $dt->format('m'));
        $remessa = $this->getRemessa($dt);
        
        $query = sprintf($sql, $campo, $remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function emendas(int $co, int $posicao): float {
        $sql = "SELECT SUM(%s)::decimal
                FROM PAD.RECEITA
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '171%%'
                        AND FONTE_RECURSO > 0
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
                        AND CODIGO_ACOMPANHAMENTO_ORCAMENTARIO = %d"
        ;
        $dt = $this->getMesBase($posicao);
        $campo = $this->getCampoMes((int) $dt->format('m'));
        $remessa = $this->getRemessa($dt);
        
        $query = sprintf($sql, $campo, $remessa, $co);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function deducaoFundeb(int $posicao): float {
        $sql = "SELECT SUM(%s)::decimal * -1
                FROM PAD.RECEITA
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '17%%'
                        AND FONTE_RECURSO > 0
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
                        AND CARACTERISTICA_PECULIAR_RECEITA = 105"
        ;
        $dt = $this->getMesBase($posicao);
        $campo = $this->getCampoMes((int) $dt->format('m'));
        $remessa = $this->getRemessa($dt);
        
        $query = sprintf($sql, $campo, $remessa);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function arrecadado(string $nro, int $posicao): float {
        $sql = "SELECT SUM(%s)::decimal
                FROM PAD.RECEITA
                WHERE REMESSA = %s
                        AND NATUREZA_RECEITA LIKE '%s'
                        AND FONTE_RECURSO > 0
                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
                        AND CARACTERISTICA_PECULIAR_RECEITA != 105"
        ;
        $dt = $this->getMesBase($posicao);
        $campo = $this->getCampoMes((int) $dt->format('m'));
        $remessa = $this->getRemessa($dt);
        
        $query = sprintf($sql, $campo, $remessa, $nro);
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
    private function getRemessa(\DateTime $dt): int {
        $ano = $dt->format('Y');
        if($ano != $this->dataBase->format('Y')) {
            $mes = 12;
        }else{
            $mes = $this->dataBase->format('m');
        }
        return (int) sprintf('%s%s', $ano, str_pad($mes, 2, '0', STR_PAD_LEFT));
    }
    
    private function getCampoMes(int $mes): string {
        switch ($mes){
            case 1:
                return 'realizada_jan';
            case 2:
                return 'realizada_fev';
            case 3:
                return 'realizada_mar';
            case 4:
                return 'realizada_abr';
            case 5:
                return 'realizada_mai';
            case 6:
                return 'realizada_jun';
            case 7:
                return 'realizada_jul';
            case 8:
                return 'realizada_ago';
            case 9:
                return 'realizada_set';
            case 10:
                return 'realizada_out';
            case 11:
                return 'realizada_nov';
            case 12:
                return 'realizada_dez';
        }
    }
    
    private function getMesBase(int $posicao): \DateTime {
        if ($posicao === 0) return $this->dataBase;
        $dt = clone $this->dataBase;
        for($i = 1; $i <= $posicao; $i++){
            $dt->modify('last day of previous month');
        }
        
        return $dt;
    }

//    private function superavitFinanceiroUtilizadoParaCreditosAdicionais(): float {
//        $sql = "SELECT SUM(SALDO_ATUAL)::decimal
//                FROM PAD.BAL_VER
//                WHERE REMESSA = %s
//                        AND CONTA_CONTABIL LIKE '5221301%%'
//                        AND ESCRITURACAO LIKE 'S'"
//        ;
//        $query = sprintf($sql, $this->remessa);
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//
//    private function previsaoInicial(string $nro): float {
//        $sql = "SELECT SUM(RECEITA_ORCADA)::decimal
//                FROM PAD.BAL_REC
//                WHERE REMESSA = %d
//                        AND TIPO_NIVEL_RECEITA LIKE 'A'
//                        AND NATUREZA_RECEITA LIKE '%s'
//                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
//        ;
//        $query = sprintf($sql, $this->remessa, $nro);
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//
//    private function previsaoAtualizada(string $nro): float {
//        $sql = "SELECT SUM(PREVISAO_ATUALIZADA)::decimal
//                FROM PAD.BAL_REC
//                WHERE REMESSA = %d
//                        AND TIPO_NIVEL_RECEITA LIKE 'A'
//                        AND NATUREZA_RECEITA LIKE '%s'
//                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
//        ;
//        $query = sprintf($sql, $this->remessa, $nro);
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//
//    private function realizadaNoBimestre(string $nro): float {
//        switch ($this->bimestre) {
//            case 1:
//                $mes1 = 'realizada_jan';
//                $mes2 = 'realizada_fev';
//                break;
//            case 2:
//                $mes1 = 'realizada_mar';
//                $mes2 = 'realizada_abr';
//                break;
//            case 3:
//                $mes1 = 'realizada_mai';
//                $mes2 = 'realizada_jun';
//                break;
//            case 4:
//                $mes1 = 'realizada_jul';
//                $mes2 = 'realizada_ago';
//                break;
//            case 5:
//                $mes1 = 'realizada_set';
//                $mes2 = 'realizada_out';
//                break;
//            case 6:
//                $mes1 = 'realizada_nov';
//                $mes2 = 'realizada_dez';
//                break;
//        }
//        $sql = "SELECT (SUM(%s) + SUM(%s))::decimal
//                FROM PAD.RECEITA
//                WHERE REMESSA = %s
//                        AND CATEGORIA_RECEITA NOT LIKE 'intra'
//                        AND NATUREZA_RECEITA LIKE '%s'
//                        AND FONTE_RECURSO > 0"
//        ;
//        $query = sprintf($sql, $mes1, $mes2, $this->remessa, $nro);
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
//
//    private function RealizadaAteBimestre(string $nro): float {
//        $sql = "SELECT SUM(RECEITA_REALIZADA)::decimal
//                FROM PAD.BAL_REC
//                WHERE REMESSA = %d
//                        AND TIPO_NIVEL_RECEITA LIKE 'A'
//                        AND NATUREZA_RECEITA LIKE '%s'
//                        AND CATEGORIA_RECEITA NOT LIKE 'intra'"
//        ;
//        $query = sprintf($sql, $this->remessa, $nro);
//        $result = $this->con->query($query);
//        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
//    }
}
