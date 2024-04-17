<?php

namespace RptGen;

/**
 * Interação com o banco de dados.
 *
 * @author Everton
 */
class Db {
    
    private \PgSql\Connection $con;
    
    public function __construct(string $dsn) {
        $this->con = pg_connect($dsn);
    }
    
    public function query(string $query): \PgSql\Result {
        return pg_query(connection: $this->con, query: $query);
    }
    
    public function importaDespesasConsorcio(array $data): void {
        $this->query('DELETE FROM consorcio.despesas');
        foreach ($data as $row){
            $insert = [
                'consorcio' => $row[0],
                'data_base' => date_create_from_format('m/d/Y', $row[1])->format('Y-m-d'),
                'funcao' => $row[2],
                'subfuncao' => $row[3],
                'ndo' => str_replace('.', '', $row[4]),
                'empenhado' => round((float) str_replace(',', '.', str_replace('.', '', $row[5])), 2),
                'liquidado' => round((float) str_replace(',', '.', str_replace('.', '', $row[6])), 2),
                'pago' => round((float) str_replace(',', '.', str_replace('.', '', $row[7])), 2),
                'ano' => $row[8],
                'bimestre' => $row[9],
                'mes' => $row[10],
            ];
            pg_insert($this->con, 'consorcio.despesas', $insert);
        }
    }
    
    public function importaEmpenhosTerceirizacao(array $data): void {
        $this->query('DELETE FROM tmp.dtp_empenhos_terceirizacao');
        foreach ($data as $row){
            $insert = [
                'empenho' => $row[0],
                'ano' => $row[1]
            ];
            pg_insert($this->con, 'tmp.dtp_empenhos_terceirizacao', $insert);
        }
    }
    
}
