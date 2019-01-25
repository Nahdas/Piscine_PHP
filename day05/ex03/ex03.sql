INSERT INTO ft_table (login, `group`, creation_date)
select last_name, 'other', birthdate
from user_card 
where last_name like '%a%' 
AND LENGTH(last_name) < 9
ORDER BY last_name ASC
LIMIT 10;