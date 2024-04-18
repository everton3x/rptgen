select sum(previsao_atualizada)::decimal from pad.bal_rec%s
where remessa = %d
and entidade in %s
and natureza_receita like '%s'
and tipo_nivel_receita like 'A'
and categoria_receita in %s