select SUBSTRING(reverse(phone_number),  1, CHAR_LENGTH(phone_number) - 1) as rebmunenohp 
from distrib 
where phone_number like "05%";