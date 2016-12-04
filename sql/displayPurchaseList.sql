-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- displayPurchaseList
-- ----------------------------------------------------------
-- Prerequisite:  
-- Gallery MUST exist.
-- Section MUST exist
-- Artist MUST exist
-- Artwork MUST exist
-- Customer MUST exist
-- ----------------------------------------------------------
-- Modified for simplified sales table
-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy lines 23 through 25 to php
set @statement = '
SELECT c.customerFirstName, c.customerLastName, g.galleryName, se.sectionName, a.artworkTitle, ar.artistFirstName, ar.artistLastName, sa.saleDescription, a.artworkPrice
FROM customer c JOIN sales sa on c.customerID = sa.customerID JOIN artwork a on sa.artworkID = a.artworkID JOIN section se on a.artWorkSectionID = se.sectionID JOIN gallery g on se.galleryID = g.galleryID JOIN artist ar on a.artworkArtistID = ar.artistID 
ORDER BY ?
';

-- test
prepare stmt from @statement;
set @p1 = 'c.CustomerLastName';

execute stmt using @p1;

/*
		See the DDL file - this uses all nearly ALL the tables.
*/