select last_name, first_name, cast(birthdate as DATE) as birthdate
from user_card
where 
    birthdate between '1989-01-01'
and
    '1990-01-01'
ORDER BY last_name ASC;