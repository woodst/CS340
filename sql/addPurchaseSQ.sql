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

-- Copy line 25 through 26 to php
set @statement = '
INSERT INTO sales (saleDescription, artworkID, customerID ) 
VALUES (?,?,(select customerID from visitorLog where customerID = ? and sectionID = (select artworkSectionID from artwork where artworkID = ? limit 1 )));
';

-- test
prepare stmt from @statement;
set @p1 = 'This is a sale'; -- sales description;
set @p2 = 1;				-- artworkID	
set @p3 = 1; 				-- customerID

execute stmt using @p1, @p2, @p3, @p2;
