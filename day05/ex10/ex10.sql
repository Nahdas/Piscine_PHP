select film.title as Title,
       film.summary as Summary,
       film.prod_year as prod_year
from genre
INNER JOIN film ON genre.id_genre = film.id_genre
where genre.name = "erotic"
ORDER BY film.prod_year DESC;
