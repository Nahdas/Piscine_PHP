select COUNT(*) as `nb_short-films`
from film
where
    duration <= 42;