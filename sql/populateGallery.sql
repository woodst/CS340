-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- populateGallery
-- ----------------------------------------------------------
-- Prerequisite:  
-- Gallery MUST exist.
-- Section MUST exist
-- Artist MUST exist
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 21 to php
set @statement = '
INSERT INTO artwork (artworkTitle, artworkYearCreated, artworkSectionId, artworkArtistID, artworkPrice) VALUES (?,?,?,?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 'Youre a good man Charlie Brown';
set @p2 = 1964;
set @p3 = 5;
set @p4 = 21;
set @p5 = 29.95;
execute stmt using @p1, @p2, @p3, @p4, @p5;


/*
	artworkID 				int not null auto_increment primary key, 
    artworkTitle			varchar(50),
    artworkYearCreated		int,
    artworkSectionID		int,
	artworkArtistID			int, 
    artworkPrice			int,
	Foreign key fk_artwork_section (artworkSectionID) references section(sectionID)
    on delete cascade
    on update cascade,
	Foreign key fk_artwork_artist (artworkArtistID) references artist(artistID)
    on delete cascade
    on update cascade
    
    
*/