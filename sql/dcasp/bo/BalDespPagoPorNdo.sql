select sum(valor_pago)::decimal from pad.bal_desp%s
where remessa = %d
and entidade in %s
and elemento like '%s'