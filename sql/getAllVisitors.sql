-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- getAllVisitors
-- ----------------------------------------------------------
-- Gets all individual visits

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 through 19 to php
set @statement = '
SELECT v.logID, c.customerFirstName, c.customerLastName, g.galleryName, s.sectionName FROM visitorLog v
JOIN customer c ON v.customerID = c.customerID JOIN section s ON v.sectionID = s.sectionID JOIN gallery g ON s.galleryID = g.galleryID
ORDER BY c.customerLastName
';

-- test
-- N/A
prepare stmt from @statement;
execute stmt;