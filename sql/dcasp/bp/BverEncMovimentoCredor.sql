select sum(movimento_credor)::decimal from pad.bver_enc%s
where remessa = %d
and entidade in %s
and escrituracao like 'S'
and conta_contabil like '%s'