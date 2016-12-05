-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- SectionsByGallery
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
SELECT g.galleryName, s.sectionName from gallery g JOIN section s on g.galleryID = s.galleryID where g.galleryID = ? ORDER BY sectionName
';

-- test
prepare stmt from @statement;
set @p1 = 4;
execute stmt using @p1;