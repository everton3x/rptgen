<?php

namespace RptGen\Report\Fiscal\Rreo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use RptGen\Db;

/**
 * RREO, Anexo 7 - Restos a pagar
 *
 * @author Everton
 */
final class A7RestosPagar extends RreoBase {

    public function __construct(Db $con, Spreadsheet $spreadsheet, int $remessa) {
        parent::__construct('RREO A7', $con, $spreadsheet, $remessa);
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
            
            'C15' => $this->restos('saldo_processado_inscritos_exercicios_anteriores', ['pm', 'fpsm']),
            'D15' => $this->restos('processado_inscritos_ultimo_exercicio', ['pm', 'fpsm']),
            'E15' => $this->restos('processado_pago', ['pm', 'fpsm']),
            'F15' => $this->restos('processado_cancelado', ['pm', 'fpsm']),
            'H15' => $this->restos('saldo_nao_processado_inscritos_exercicios_anteriores', ['pm', 'fpsm']),
            'I15' => $this->restos('nao_processado_inscritos_ultimo_exercicio', ['pm', 'fpsm']),
            'J15' => $this->restos('rp_liquidado', ['pm', 'fpsm']),
            'K15' => $this->restos('nao_processado_pago', ['pm', 'fpsm']),
            'L15' => $this->restos('nao_processado_cancelado', ['pm', 'fpsm']),
            
            'C17' => $this->restos('saldo_processado_inscritos_exercicios_anteriores', ['cm']),
            'D17' => $this->restos('processado_inscritos_ultimo_exercicio', ['cm']),
            'E17' => $this->restos('processado_pago', ['cm']),
            'F17' => $this->restos('processado_cancelado', ['cm']),
            'H17' => $this->restos('saldo_nao_processado_inscritos_exercicios_anteriores', ['cm']),
            'I17' => $this->restos('nao_processado_inscritos_ultimo_exercicio', ['cm']),
            'J17' => $this->restos('rp_liquidado', ['cm']),
            'K17' => $this->restos('nao_processado_pago', ['cm']),
            'L17' => $this->restos('nao_processado_cancelado', ['cm']),
            
        ];
        
    }
    
    private function restos(string $campo, array $entidades): float {
        $in = [];
        foreach ($entidades as $item){
            $in[] = "'$item'";
        }
        $sql = "SELECT SUM(%s)::decimal
                FROM PAD.RESTOS_PAGAR
                WHERE REMESSA = %s
                        AND ENTIDADE IN (%s)
                        AND RUBRICA NOT LIKE '__91%%'"
        ;
        $query = sprintf($sql, strtoupper($campo), $this->remessa, join(', ', $in));
        $result = $this->con->query($query);
        return round(array_sum(pg_fetch_all_columns($result, 0)), 2);
    }
    
        
}
