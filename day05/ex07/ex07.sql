select title, summary
from film
where LOWER(summary) like '%42%'
OR LOWER(title) like '%42%'
ORDER BY duration ASC;