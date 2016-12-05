-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- deleteCustomer
-- ----------------------------------------------------------
-- Cascades to sales and visitorLog

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
DELETE from customer where customerID = ?
';

-- test
-- N/A
prepare stmt from @statement;
set @p1 = 1;
execute stmt using @p1;