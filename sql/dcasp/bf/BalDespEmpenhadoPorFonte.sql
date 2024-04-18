select sum(valor_empenhado)::decimal from pad.bal_desp%s
where remessa = %d
and entidade in %s
and fonte_recurso between %d and %d