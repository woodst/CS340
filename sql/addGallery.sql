-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- Add Gallery
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
INSERT INTO gallery (galleryName, galleryCity) VALUES (?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 'TestMuseum';
set @p2 = 'TestCity';
execute stmt using @p1, @p2;

/*
	galleryID 			int not null auto_increment primary key,
    galleryName 		varchar(200),
    galleryCity			varchar(200)
*/