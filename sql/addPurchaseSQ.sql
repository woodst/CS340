-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- addPurchase
-- ----------------------------------------------------------
-- Prerequisite:  
-- Artwork MUST exist
-- Customer MUST exist
-- ----------------------------------------------------------
-- MySQL has limited constraing options and we can't create UDF's on the school server.
-- To simulate an constraint where the customer must visit a section before purchasing, we 
-- create the purchase by looking up the custeomerID in the visitor table.  No visit, no ID, 
-- the query fails.


-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 23 to php
set @statement = '
INSERT INTO sales (saleDescription, artworkID, customerID) VALUES (?,?,( select customerID from visitorLog where customerID = ? and sectionID = ? order by customerID limit 1) )
';

-- test
prepare stmt from @statement;
set @p1 = 'This is a sale'; -- sales description;
set @p2 = 1;				-- artworkID	
set @p3 = 1; 				-- customerID
set @p4 = 4; 				-- sectiuonID

execute stmt using @p1, @p2, @p3, @p4;

/*
	transactionID		int not null auto_increment primary key,
    saleDescription		varchar(250),
    artworkID			int,
    customerID			int,
	Foreign key fk_sale_artwork (artworkID) references artwork(artworkID)
    on delete cascade
    on update cascade,
	Foreign key fk_sale_customer (customerID) references customer(customerID)
    on delete cascade
    on update cascade
*/