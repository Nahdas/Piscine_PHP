select DATEDIFF(MAX(date), MIN(date)) as uptime  
from member_history;