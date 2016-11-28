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
(1,"Ivan","Aivazovsky","Academic Classicism","Russia"),
(2,"Thomas","Couture","Academic Classicism","France"),
(3,"Antonio","Canova","Neoclassism","Italy"),
(4,"Rembrandt","Peal","Neoclassism","United States of America"),
(5,"Jacques Louis", "David", "Neoclassism", "France"),
(6,"William","Blake","Romanticism","Britain"),
(7,"Jean","Delacroix","Romanticism","France"),
(8,"John","Constable","Romanticism","England"),
(9,"Pierre-Auguste","Cot","Academic Classicism","France"),
(10,"Paul","Cezane","Impressionism","France"),
(11,"Pierre August","Renior","Impressionism","France"),
(12,"Claude","Monet","Impressionism","France"),
(13,"Edgar","Degas","Impressionism","France"),
(14,"Georges","Lemmen","Pointillism","Belgium"),
(15,"Georges","Seurat","Pointillism","France"),
(16,"Paul","Signac","Pointillism","France"),
(17,"Maximilien","Luce","Pointillism","France"),
(18,"James","Ensor","Expressionism","Belgium"),
(19,"Alexei","von Jawlensky","Expressionism","Russia"),
(20,"Paul","Klee","Expressionism","Switzerland");


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

insert into floor
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

Insert into section
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
(20,"two",10),
(21,"one",11),
(22,"two",11),
(23,"one",12),
(24,"two",12),
(25,"one",13),
(26,"two",13),
(27,"one",14),
(28,"two",14),
(29,"one",15),
(30,"two",15),
(31,"one",16),
(32,"two",16),
(33,"one",17),
(34,"two",17),
(35,"one",18),
(36,"two",18),
(37,"one",19),
(38,"two",19),
(39,"one",20),
(40,"two",20);


insert into art
values
(1,"The Ninth Wave",1850,0,1,"Painting" ),					-- https://en.wikipedia.org/wiki/Ivan_Aivazovsky
(2,"The Black Sea at Night",1879,0,1,"Painting"),
(3,"Bay of Naples",1842,0,1,"Painting" ),
(4,"American Shipping off the Rock of Gibraltar ",1873,0,1,"Painting"),
(5,"Rainbow",1873,0,1,"Painting" ),
(6,"Ship 'Twelve Apostles' ",1878,0,1,"Painting"),
(7,"Tempest by Sounion",1856,0,1,"Painting" ),
(8,"Seascape with a steamer",1886,0,1,"Painting"),
(9,"Romans during the Decadence ",1847,0,2,"Painting"),		-- https://en.wikipedia.org/wiki/Thomas_Couture
(10,"Anselm Feuerbach",1852,0,2,"Painting"),
(11,"Daydreams",1859,0,2,"Painting" ),
(12,"A Lawyer Going to Court",1860,0,2,"Painting"),
(13,"The Duel After the Masked Ball",1857,0,2,"Painting"),
(14,"Orpheus",1777,0,3,"Sculpture"), 						-- https://en.wikipedia.org/wiki/Antonio_Canova
(15,"Washington",1777,0,3,"Sculpture"),
(16,"Psyche Revived by Cupid's Kiss",1777,0,3,"Sculpture"),
(17,"Perseus with the Head of Medusa",1777,0,3,"Sculpture"),
(18,"The Three Graces",1777,0,3,"Sculpture"),
(19,"Working Sketch of the Mastodon,",1801,0,4,"Sketch"),	-- https://en.wikipedia.org/wiki/Rembrandt_Peale
(20,"Samuel Fisher Bradford",1803,0,4,"Painting"),
(21,"Painting of Thomas Jefferson ",1800,0,0,"Painting"),
(22,"Portrait of Henry Robinson",1806,0,0,"Painting"),
(23,"John Armstrong, Jr.",1808,0,0,"Painting"),
(24,"The Roman Daughter",1811,0,0,"Painting"),
(25,"William Henry Harrison ",1814,0,0,"Painting");

