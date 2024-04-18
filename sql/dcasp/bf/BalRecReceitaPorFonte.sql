select sum(receita_realizada)::decimal from pad.bal_rec%s
where remessa = %d
and entidade in %s
and fonte_recurso between %d and %d
and tipo_nivel_receita like 'A'
and categoria_receita in %s