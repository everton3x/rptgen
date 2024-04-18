select sum(saldo_inicial)::decimal from pad.bver_enc%s
where remessa = %d
and entidade in %s
and escrituracao like 'S'
and (
    conta_contabil like '21%%'
    or conta_contabil like '22%%'
)
and indicador_superavit_financeiro like 'P'