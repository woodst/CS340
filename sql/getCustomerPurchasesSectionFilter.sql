-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- getCustomerPurchasesSectionFilter
-- ----------------------------------------------------------
-- 

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Copy line 17 through 21 to php
set @statement = '
SELECT c.customerFirstName, c.customerLastName, g.galleryName, s.sectionName, count(sa.transactionID) as "Number of Purchases", sum(a.artworkPrice) as "Total $ Purchased" FROM sales sa
JOIN artwork a ON sa.artworkID = a.artworkID JOIN customer c ON sa.customerID = c.customerID JOIN section s ON a.artworkSectionID = s.sectionID JOIN gallery g ON s.galleryID = g.galleryID
GROUP BY c.customerFirstName, c.customerLastName, g.galleryName, s.sectionName
HAVING count(sa.transactionID)  > ?
ORDER BY c.customerLastName, galleryName, sectionName
';

-- test
-- N/A
prepare stmt from @statement;
set @p1 = 1;	-- Purchases per section threshold
execute stmt using @p1;