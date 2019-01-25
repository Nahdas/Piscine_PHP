select `name` from distrib 
where
LOWER(name) rlike "^[^y]*y[^y]*y[^y]*$"
or id_distrib = 42
or id_distrib = 62
or id_distrib = 63
or id_distrib = 64
or id_distrib = 65
or id_distrib = 66
or id_distrib = 67
or id_distrib = 68
or id_distrib = 69
or id_distrib = 71
or id_distrib = 89
or id_distrib = 88
or id_distrib = 90
LIMIT 5
OFFSET 2;