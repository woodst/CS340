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
-- Gallery MUST exist.
-- Section MUST exist
-- Artist MUST exist
-- Artwork MUST exist
-- Customer MUST exist
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 23 to php
set @statement = '
INSERT INTO sales (saleDescription, transactionType, artworkID, customerID, sectionID, amount) VALUES (?,?,?,?,?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 'Purchase at auction';
set @p2 = 'PURCHASE';
set @p3 = 26;
set @p4 = 1;
set @p5 = 1;
set @p6 = 32;
execute stmt using @p1, @p2, @p3, @p4, @p5, @p6;

/*
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
*/