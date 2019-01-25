select last_name, first_name 
from user_card 
where first_name like "%-%" 
OR last_name like "%-%" 
ORDER BY last_name ASC, first_name ASC;