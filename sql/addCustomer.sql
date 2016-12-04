-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- addCustomer
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 16 to php
set @statement = '
INSERT INTO customer (customerFirstName, customerLastName) VALUES (?,?)
';

-- test
prepare stmt from @statement;
set @p1 = 'William';
set @p2 = 'Gates';

execute stmt using @p1, @p2;

/*
	customerID			int not null auto_increment primary key,
    customerFirstName	varchar(50),
    customerLastName	varchar(50)
    */