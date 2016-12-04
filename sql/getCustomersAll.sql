-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- getCustomersAll
-- ----------------------------------------------------------


-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
SELECT customerID, customerFirstName, customerLastName FROM customer order by customerLastName
';

-- test
-- N/A
prepare stmt from @statement;
execute stmt;