select  film.id_genre as id_genre,         
        COALESCE(genre.name, 'N/A') as name_genre,        
        film.id_distrib as id_distrib,        
        COALESCE(distrib.name, 'N/A') as name_distrib,        
        film.title as title_film        
from ((genre INNER JOIN film ON genre.id_genre = film.id_genre)
INNER JOIN distrib ON distrib.id_distrib = film.id_distrib) 
where genre.id_genre between 4 and 8;