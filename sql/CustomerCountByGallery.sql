-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- CustomerCountByGallery
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 through 18 to php
set @statement = '
SELECT g.galleryName, count(c.customerID) from gallery g 
JOIN section s ON s.galleryID = g.galleryID JOIN artwork a ON s.sectionID = a.artworkSectionID JOIN sales sa ON a.artworkID = sa.artworkID JOIN customer c ON sa.customerID = c.customerID
GROUP BY g.galleryName ORDER BY galleryName
';

-- test
prepare stmt from @statement;

execute stmt;