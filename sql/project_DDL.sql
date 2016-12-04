-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- Data Definition
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Turn off foreign key checks to allow dropping tables that hold data
set FOREIGN_KEY_CHECKS = 0;


-- gallery
drop table if exists gallery;
create table gallery
(
	galleryID 			int not null auto_increment primary key,
    galleryName 		varchar(200),
    galleryCity			varchar(200)

) engine = innodb;

-- floor
-- One or more floors belong to a gallery
-- Removed to simplify the work - tmw
/*
drop table if exists floor;
create table floor
(
	floorID				int not null auto_increment primary key,
    floorName			varchar(50),
    galleryID			int not null,
    Foreign key fk_floor_gallery (galleryID) references gallery(galleryID)
    on delete cascade
    on update cascade
) engine = innodb;
*/

-- section
-- One or more sections belong to a Gallery Floor
drop table if exists section;
create table section
(
	sectionID 			int not null auto_increment primary key,
    sectionName 		varchar(50),
    galleryID			int not null,
    Foreign key fk_section_gallery (galleryID) references section(sectionID)
    on delete cascade
    on update cascade
) engine = innodb;


-- art
-- each art is made by one artist
drop table if exists artwork;
create table artwork
(
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
    
) engine = innodb;

-- artist
drop table if exists artist;
create table artist
(
	artistID			int not null auto_increment primary key,
    artistFirstName		varchar(50),
    artistLastName		varchar(50),
    artistMovement		varchar(50)
) engine = innodb;

-- customer
drop table if exists customer;
create table customer
(
	customerID			int not null auto_increment primary key,
    customerFirstName	varchar(50),
    customerLastName	varchar(50)
) engine = innodb;

-- sales
-- Sales are made in individual transactions to customers by a gallery 
-- for a specific peice of Art
drop table if exists sales;
create table sales
(
	transactionID		int not null auto_increment primary key,
    saleDescription		varchar(250),
    transactionType		varchar(50),
    artworkID			int,
    customerID			int,
    sectionID			int,
    Amount				decimal(10,2),
	Foreign key fk_sale_artwork (artworkID) references artwork(artworkID)
    on delete cascade
    on update cascade,
	Foreign key fk_sale_customer (customerID) references customer(customerID)
    on delete cascade
    on update cascade,
	Foreign key fk_sale_section (sectionID) references section(sectionID)
    on delete cascade
    on update cascade
) engine = innodb;

-- visitorLog
-- table to track which customers have visited which museum
drop table if exists visitorLog;
create table visitorLog
(
	logID				int not null auto_increment primary key,
	customerID			int,
    sectionID				int,
    foreign key fk_visitor_customer (customerID) references customer(customerID)
    on delete cascade
    on update cascade,
    foreign key fk_visitor_section (sectionID) references section(sectionID)
    on delete cascade
    on update cascade
) engine = innodb;

-- restore the foreign key checks
set FOREIGN_KEY_CHECKS = 1;
