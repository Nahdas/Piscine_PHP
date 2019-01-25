select count(*) as films
from member_history
where
`date` between '2006-10-30 00:00:00'
    and
        '2007-07-27 00:00:00'
OR `date` like '%12-24%';
