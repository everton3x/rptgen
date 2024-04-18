select sum(%s)::decimal from pad.restos_pagar%s
where remessa = %d
and entidade in %s
and rubrica like '%s'