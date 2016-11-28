-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- Total Customers
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

select
galleryName as 'gallery name',
count(distinct(c.customerID)) as 'customer count'

from gallery g
join sales s on g.galleryID = s.galleryID
join customer c on s.customerID = c.customerID