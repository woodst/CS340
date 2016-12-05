-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- allGalerySections
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
SELECT g.galleryName, s.sectionName from gallery g JOIN section s on g.galleryID = s.galleryID ORDER BY galleryName, sectionName
';

-- test
prepare stmt from @statement;

execute stmt;