-- ----------------------------------------------------------
-- CS340 Intrdoduction to Datbases
-- Fall 2016
-- Class Project
-- Joe Valencia
-- Tom Woods
-- ----------------------------------------------------------
-- Test Data
-- ----------------------------------------------------------

-- Reference for the Dev Database on AWS.  Comment out for deployment elswhere
use CS340;

-- Add the artist and galleries first

insert into artist
values
(1,"Ivan","Aivazovsky","Academic Classicism"),
(2,"Thomas","Couture","Academic Classicism"),
(3,"Antonio","Canova","Neoclassism"),
(4,"Rembrandt","Peal","Neoclassism"),
(5,"Jacques Louis", "David", "Neoclassism"),
(6,"William","Blake","Romanticism"),
(7,"Jean","Delacroix","Romanticism"),
(8,"John","Constable","Romanticism"),
(9,"Pierre-Auguste","Cot","Academic Classicism"),
(10,"Paul","Cezane","Impressionism"),
(11,"Pierre August","Renior","Impressionism"),
(12,"Claude","Monet","Impressionism"),
(13,"Edgar","Degas","Impressionism"),
(14,"Georges","Lemmen","Pointillism"),
(15,"Georges","Seurat","Pointillism"),
(16,"Paul","Signac","Pointillism"),
(17,"Maximilien","Luce","Pointillism"),
(18,"James","Ensor","Expressionism"),
(19,"Alexei","von Jawlensky","Expressionism"),
(20,"Paul","Klee","Expressionism");


-- Gallery names come from http://topyaps.com/top-10-famous-art-galleries-in-the-world
insert into gallery
values
(1, "Musee d’Orsay", "Paris"),
(2, "National Museum of Korea", "Seoul"),
(3, "Centre Pompidou", "Paris"),
(4, "National Palace Museum", "Tapie"),
(5, "National Gallery of Art", "Washington DC"),
(6, "Tate Modern", "London"),
(7, "National Gallery", "London"),
(8, "British Museum", "London"),
(9, "Metropolitan Museum of Art", "New York"),
(10, "The Louvre Museum", "Paris");

-- Floors
-- Starting out for testing, each gallery has two floors, each floor has two sections
-- also for testing, these have unoriginal names

insert into section
values
(1,"one",1),
(2,"two",1),
(3,"one",2),
(4,"two",2),
(5,"one",3),
(6,"two",3),
(7,"one",4),
(8,"two",4),
(9,"one",5),
(10,"two",5),
(11,"one",6),
(12,"two",6),
(13,"one",7),
(14,"two",7),
(15,"one",8),
(16,"two",8),
(17,"one",9),
(18,"two",9),
(19,"one",10),
(20,"two",10);


insert into artwork
values
(1,"The Ninth Wave",1850,1,1,  210000 ),					-- https://en.wikipedia.org/wiki/Ivan_Aivazovsky
(2,"The Black Sea at Night",1879,2,1,250000),
(3,"Bay of Naples",1842,1,1,500000 ),
(4,"American Shipping off the Rock of Gibraltar ",1873,1,1,372000),
(5,"Rainbow",1873,2,1, 126000 ),
(6,"Ship 'Twelve Apostles' ",1878,3,1,241000),
(7,"Tempest by Sounion",1856,3,1,198000 ),
(8,"Seascape with a steamer",1886,5,1,315000),
(9,"Romans during the Decadence ",1847,4,2,37400),		-- https://en.wikipedia.org/wiki/Thomas_Couture
(10,"Anselm Feuerbach",1852,3,2,52000),
(11,"Daydreams",1859,5,2,49150 ),
(12,"A Lawyer Going to Court",1860,5,2, 61000),
(13,"The Duel After the Masked Ball",1857,6,2,97000),
(14,"Orpheus",1777,6,3,1700000), 						-- https://en.wikipedia.org/wiki/Antonio_Canova
(15,"Washington",1777,7,3,982000),
(16,"Psyche Revived by Cupid's Kiss",1777,8,3,1210000),
(17,"Perseus with the Head of Medusa",1777,7,3,823000),
(18,"The Three Graces",1777,9,3,1172500),
(19,"Working Sketch of the Mastodon,",1801,9,4,3730),	-- https://en.wikipedia.org/wiki/Rembrandt_Peale
(20,"Samuel Fisher Bradford",1803,8,4,64000),
(21,"Painting of Thomas Jefferson ",1800,10,4,29500),
(22,"Portrait of Henry Robinson",1806,10,4,112000),
(23,"John Armstrong, Jr.",1808,10,4,97000),
(24,"The Roman Daughter",1811,9,4,52900),
(25,"William Henry Harrison ",1814,9,4,76000);


insert into customer
values
(1,"Bill", "Gates"),
(2,"Mark", "Zuckerberg"),
(3,"Larry", "Ellison"),
(4,"Tim", "Cook"),
(5,"Larry", "Page"),
(6,"Sergy", "Brin");

insert into visitorLog
values
(1,1,1),
(2,1,2),
(3,1,3),
(4,1,5),
(5,1,7),
(6,2,1),
(7,2,6),
(8,2,8),
(9,2,9),
(10,2,3),
(11,3,1),
(12,3,3),
(13,3,5),
(14,3,6),
(15,3,7),
(16,4,1),
(17,4,2),
(18,4,3),
(19,4,5),
(20,4,7);

insert into sales
values
(1,"This is a sale",1,1),
(2,"This is a sale",2,2),
(3,"This is a sale",3,3),
(4,"This is a sale",4,4),
(5,"This is a sale",5,1),
(6,"This is a sale",6,2),
(7,"This is a sale",7,3),
(8,"This is a sale",8,4),
(9,"This is a sale",9,1);


