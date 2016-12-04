-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- addArtist
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
INSERT INTO artist (artistFirstName, artistLastName, artistMovement) VALUES (?,?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 'Charles';
set @p2 = 'Schultz';
set @p3 = 'Animation';
execute stmt using @p1, @p2, @p3;

/*
	artistID			int not null auto_increment primary key,
    artistFirstName		varchar(50),
    artistLastName		varchar(50),
    artistMovement		varchar(50)
    
    */
