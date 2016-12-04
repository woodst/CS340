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

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy lines 23 through 25 to php
set @statement = '
SELECT c.customerFirstName, c.customerLastName, g.galleryName, se.sectionName, a.artworkTitle, ar.artistFirstName, ar.artistLastName, sa.saleDescription, sa.amount
FROM CS340.customer c JOIN CS340.sales sa on c.customerID = sa.customerID JOIN CS340.artwork a on sa.artworkID = a.artworkID JOIN CS340.section se on sa.sectionID = se.sectionID JOIN CS340.gallery g on se.galleryID = g.galleryID JOIN CS340.artist ar on a.artworkArtistID = ar.artistID 
ORDER BY ?
';

-- test
prepare stmt from @statement;
set @p1 = 'c.CustomerLastName';

execute stmt using @p1;

/*
		See the DDL file - this uses all nearly ALL the tables.
*/