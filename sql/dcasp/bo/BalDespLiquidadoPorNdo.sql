select sum(valor_liquidado)::decimal from pad.bal_desp%s
where remessa = %d
and entidade in %s
and elemento like '%s'