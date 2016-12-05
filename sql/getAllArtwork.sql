-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- getAllArtwork
-- ----------------------------------------------------------


-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 21 to php
set @statement = '
select ar.artworkID, ar.artworkTitle, ar.artworkYearCreated, g.galleryName, s.sectionName, a.artistFirstName, a.artistLastName, ar.artworkPrice, ar.isSold from artwork ar
JOIN artist a ON ar.artworkArtistID = a.artistID
JOIN section s ON ar.artworkSectionID = s.sectionID
JOIN gallery g ON s.galleryID = g.galleryID
ORDER BY g.galleryName, s.sectionName, ar.artworkTitle
';

-- test
prepare stmt from @statement;

execute stmt