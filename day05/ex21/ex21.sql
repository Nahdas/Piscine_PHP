SELECT MD5(replace(concat(phone_number, "42"), "7", "9")) AS ft5 
from distrib 
where id_distrib=42;