-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- deleteArtist
-- ----------------------------------------------------------
-- casades to artwork, sales
-- 

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
DELETE from artist where artistID = ?
';

-- test
-- N/A
prepare stmt from @statement;
set @p1 = 1;
execute stmt using @p1;