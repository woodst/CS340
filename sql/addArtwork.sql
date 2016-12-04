-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- addArtwork
-- ----------------------------------------------------------
-- Prerequisite:  
-- Section MUST exist.
-- Artist must exist.
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
INSERT INTO artwork (artworkTitle, artworkYearCreated, artworkSectionID, artworkArtistID, artworkPrice) VALUES (?,?,?,?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 'Random Bit of Art';
set @p2 = 1922;
set @p3 = 4;
set @p4 = 5;
set @p5 = 1500;

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