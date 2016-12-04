-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- addSectionByGalleryName
-- ----------------------------------------------------------
-- Prerequisite:  
-- Gallery MUST exist.
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 19 to php
set @statement = '
INSERT INTO section (sectionName, galleryID) VALUES (?,( SELECT galleryID from gallery where galleryName = ? order by galleryID LIMIT 1))
';

-- test
prepare stmt from @statement;
set @p1 = 'Romantics';
set @p2 = 'Tate Modern';
execute stmt using @p1, @p2;

/*
	sectionID 			int not null auto_increment primary key,
    sectionName 		varchar(50),
    galleryID			int not null,
    Foreign key fk_section_gallery (galleryID) references section(sectionID)
    on delete cascade
    on update cascade
    
	galleryID 			int not null auto_increment primary key,
    galleryName 		varchar(200),
    galleryCity			varchar(200)

/