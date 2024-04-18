select sum(valor_pagamento)::decimal from pad.pagamento%s
where remessa = %d
and entidade in %s
and data_pagamento between '%s' and '%s'
and rubrica like '%s'