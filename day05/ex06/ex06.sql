select title, summary
from film
where LOWER(summary) like '%vincent%'
ORDER BY id_film ASC;