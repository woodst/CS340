-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- addCustomerVist
-- ----------------------------------------------------------
-- Prerequisite:  
-- Section MUST exist
-- Customer MUST exist
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 19 to php
set @statement = '
INSERT INTO visitorLog (customerID, sectionID ) VALUES (?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 1;
set @p2 = 1;

execute stmt using @p1, @p2;

/*
	logID				int not null primary key,
	customerID			int,
    sectionID				int,
    foreign key fk_visitor_customer (customerID) references customer(customerID)
    on delete cascade
    on update cascade,
    foreign key fk_visitor_section (sectionID) references section(sectionID)
    on delete cascade
    on update cascade
*/