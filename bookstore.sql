--
-- Table structure for table "Categories"
--

DROP TABLE IF EXISTS "Categories";
CREATE TABLE "Categories" (
  "CategoryID" INTEGER PRIMARY KEY,
  "CategoryName" TEXT NOT NULL
);

--
-- Dumping data for table "Categories"
--

INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (4, 'Children');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (6, 'Classics');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (11, 'Fantasy');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (12, 'Fiction');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (14, 'History');
INSERT INTO "Categories" ("CategoryID", "CategoryName") VALUES (28, 'Science Fiction');

-- --------------------------------------------------------

--
-- Table structure for table "Authors"
--

DROP TABLE IF EXISTS "Authors";
CREATE TABLE "Authors" (
  "AuthorID" INTEGER PRIMARY KEY,
  "AuthorName" TEXT NOT NULL
);

--
-- Dumping data for table "Authors"
--

INSERT INTO "Authors" VALUES (368,'Bernard Cornwell');
INSERT INTO "Authors" VALUES (480,'C.S. Lewis');
INSERT INTO "Authors" VALUES (553,'Charles Dickens');
INSERT INTO "Authors" VALUES (891,'Dr. Seuss');
INSERT INTO "Authors" VALUES (1289,'Haruki Murakami');
INSERT INTO "Authors" VALUES (1406,'Isaac Asimov');
INSERT INTO "Authors" VALUES (1434,'J.K. Rowling');
INSERT INTO "Authors" VALUES (1690,'Jodi Picoult');
INSERT INTO "Authors" VALUES (1734,'John Grisham');
INSERT INTO "Authors" VALUES (1998,'Ken Follett');
INSERT INTO "Authors" VALUES (2069,'Kristin Hannah');
INSERT INTO "Authors" VALUES (2074,'Kurt Vonnegut Jr.');
INSERT INTO "Authors" VALUES (2167,'Lemony Snicket');
INSERT INTO "Authors" VALUES (2490,'Michael Crichton');
INSERT INTO "Authors" VALUES (2624,'Neil Gaiman');
INSERT INTO "Authors" VALUES (2696,'Orson Scott Card');
INSERT INTO "Authors" VALUES (2950,'Rick Riordan');
INSERT INTO "Authors" VALUES (2958,'Roald Dahl');
INSERT INTO "Authors" VALUES (3275,'Stephen King');
INSERT INTO "Authors" VALUES (3396,'Terry Pratchett');
INSERT INTO "Authors" VALUES (3459,'Tom Clancy');
INSERT INTO "Authors" VALUES (3608,'William Shakespeare');

-- --------------------------------------------------------
--
-- Table structure for table "Customers"
--

DROP TABLE IF EXISTS "Customers";
CREATE TABLE "Customers" (
  "CustomerID" INTEGER PRIMARY KEY,
  "UserName" TEXT NOT NULL,
  "Email" TEXT NOT NULL,
  "Passwd" TEXT NOT NULL,
  "PhoneNumber" TEXT DEFAULT NULL
);

INSERT INTO "Customers" ("UserName", "Email", "Passwd", "PhoneNumber")
            VALUES ("jcarelli", "jc@ku.edu", "11111", "8005551212");

-- --------------------------------------------------------

--
-- Table structure for table "OrderDetails"
--

DROP TABLE IF EXISTS "OrderDetails";
CREATE TABLE "OrderDetails" (
  "OrderID" INTEGER NOT NULL,
  "BookID" TEXT NOT NULL,
  "Quantity" INTEGER NOT NULL,
  "LineTotal" REAL DEFAULT NULL
);

--
-- Table structure for table "Orders"
--

DROP TABLE IF EXISTS "Orders";
CREATE TABLE "Orders" (
  "OrderID" INTEGER PRIMARY KEY,
  "CustomerID" INTEGER NOT NULL,
  "BookCost" REAL DEFAULT NULL,
  "Shipping" REAL DEFAULT NULL,
  "Tax" REAL DEFAULT NULL,
  "Total" REAL DEFAULT NULL,
  "OrderDate" INTEGER DEFAULT NULL
);

--
-- Table structure for table "Books"
--

DROP TABLE IF EXISTS "Books";
CREATE TABLE "Books" (
	"BookID"	INTEGER PRIMARY KEY,
	"CategoryID"	INTEGER NOT NULL,
	"Price"	REAL DEFAULT NULL,
	"ISBN"	INTEGER NOT NULL,
	"ISBN13"	INTEGER NOT NULL,
	"AuthorID"	INTEGER NOT NULL,
	"Year"	TEXT DEFAULT NULL,
	"Title"	TEXT NOT NULL,
	"Rating"	REAL DEFAULT NULL,
	"RatingsCount"	REAL DEFAULT NULL,
	"Image"	TEXT DEFAULT NULL
);

--
-- Data for table "Books"
--
INSERT INTO "Books" VALUES (3,11,24.5,439554934,9780439554930,1434,1997,'Harry Potter and the Sorcerer''s Stone',4.44,4602479,'https://images.gr-assets.com/books/1474154022m/3.jpg');
INSERT INTO "Books" VALUES (5,11,42.95,43965548,9780439655480,1434,1999,'Harry Potter and the Prisoner of Azkaban',4.53,1832823,'https://images.gr-assets.com/books/1499277281m/5.jpg');
INSERT INTO "Books" VALUES (2,11,43.5,439358078,9780439358070,1434,2003,'Harry Potter and the Order of the Phoenix',4.46,1735368,'https://images.gr-assets.com/books/1387141547m/2.jpg');
INSERT INTO "Books" VALUES (15881,11,49.49,439064864,9780439064870,1434,1998,'Harry Potter and the Chamber of Secrets',4.37,1779331,'https://images.gr-assets.com/books/1474169725m/15881.jpg');
INSERT INTO "Books" VALUES (6,11,31.49,439139600,9780439139600,1434,2000,'Harry Potter and the Goblet of Fire',4.53,1753043,'https://images.gr-assets.com/books/1361482611m/6.jpg');
INSERT INTO "Books" VALUES (136251,11,41.49,545010225,9780545010220,1434,2007,'Harry Potter and the Deathly Hallows',4.61,1746574,'https://images.gr-assets.com/books/1474171184m/136251.jpg');
INSERT INTO "Books" VALUES (1,11,46.5,439785960,9780439785970,1434,2005,'Harry Potter and the Half-Blood Prince',4.54,1678823,'https://images.gr-assets.com/books/1361039191m/1.jpg');
INSERT INTO "Books" VALUES (18135,6,45.99,743477111,9780743477120,3608,1595,'Romeo and Juliet',3.73,1628519,'https://images.gr-assets.com/books/1327872146m/18135.jpg');
INSERT INTO "Books" VALUES (100915,11,49.49,60764899,9780060764890,480,1950,'The Lion, the Witch, and the Wardrobe',4.19,1531800,'https://images.gr-assets.com/books/1353029077m/100915.jpg');
INSERT INTO "Books" VALUES (28187,11,29.95,786838655,9780786838650,2950,2005,'The Lightning Thief',4.23,1366265,'https://images.gr-assets.com/books/1400602609m/28187.jpg');
INSERT INTO "Books" VALUES (10917,12,17,743454537,9780743454540,1690,2004,'My Sister''s Keeper',4.06,863879,'https://images.gr-assets.com/books/1369504683m/10917.jpg');
INSERT INTO "Books" VALUES (4981,6,47.95,385333846,9780385333850,2074,1969,'Slaughterhouse-Five',4.06,846488,'https://images.gr-assets.com/books/1440319389m/4981.jpg');
INSERT INTO "Books" VALUES (375802,28,14.49,812550706,9780812550700,2696,1985,'Ender''s Game',4.3,813439,'https://images.gr-assets.com/books/1408303130m/375802.jpg');
INSERT INTO "Books" VALUES (11588,12,17.49,450040186,9780450040180,3275,1977,'The Shining',4.17,791850,'https://images.gr-assets.com/books/1353277730m/11588.jpg');
INSERT INTO "Books" VALUES (1953,6,25.5,141439602,9780141439600,553,1859,'A Tale of Two Cities',3.81,637412,'https://images.gr-assets.com/books/1344922523m/1953.jpg');
INSERT INTO "Books" VALUES (7677,28,21,'030734813X',9780307348140,2490,1990,'Jurassic Park',3.96,447833,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (32542,12,17.49,385338600,9780385338610,1734,1989,'A Time to Kill',4.03,597775,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (5358,12,12.5,582418275,9780582418270,1734,1991,'The Firm',3.99,488269,'https://images.gr-assets.com/books/1418465200m/5358.jpg');
INSERT INTO "Books" VALUES (1420,6,41,521618746,9780521618750,3608,1600,'Hamlet',4,515820,'https://images.gr-assets.com/books/1351051208m/1420.jpg');
INSERT INTO "Books" VALUES (5043,14,20,451207149,9780451207140,1998,1989,'The Pillars of the Earth',4.29,462517,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (28186,11,49,786856866,9780786856860,2950,2006,'The Sea of Monsters',4.23,514932,'https://images.gr-assets.com/books/1400602661m/28186.jpg');
INSERT INTO "Books" VALUES (23772,4,14.49,394800168,9780394800160,891,1960,'Green Eggs and Ham',4.29,457475,'https://images.gr-assets.com/books/1468680100m/23772.jpg');
INSERT INTO "Books" VALUES (6310,12,10.99,142403881,9780142403880,2958,1964,'Charlie and the Chocolate Factory',4.1,453959,'https://images.gr-assets.com/books/1309211401m/6310.jpg');
INSERT INTO "Books" VALUES (2120932,11,32.5,1423101464,9781423101470,2950,2008,'The Battle of the Labyrinth',4.39,508214,'https://images.gr-assets.com/books/1443142158m/2120932.jpg');
INSERT INTO "Books" VALUES (2623,6,29.49,192833596,9780192833590,553,1860,'Great Expectations',3.75,459247,'https://images.gr-assets.com/books/1327920219m/2623.jpg');
INSERT INTO "Books" VALUES (7736182,11,48.99,'142311339X',9781423113390,2950,2010,'The Lost Hero',4.35,271576,'https://images.gr-assets.com/books/1464201003m/7736182.jpg');
INSERT INTO "Books" VALUES (4407,11,49.99,747263744,9780747263750,2624,2001,'American Gods',4.11,378019,'https://images.gr-assets.com/books/1258417001m/4407.jpg');
INSERT INTO "Books" VALUES (4502507,11,31.49,739380338,9780739380340,2950,2009,'The Last Olympian',4.5,397500,'https://images.gr-assets.com/books/1327924597m/4502507.jpg');
INSERT INTO "Books" VALUES (39988,4,30,141301066,9780141301070,2958,1988,'Matilda',4.29,440743,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (5326,6,36.5,1561797464,9781561797460,553,1843,'A Christmas Carol',4.02,394540,'https://images.gr-assets.com/books/1406512317m/5326.jpg');
INSERT INTO "Books" VALUES (561456,11,33.95,141382899,9780141382890,2950,2007,'The Titan''s Curse',4.33,446668,'https://images.gr-assets.com/books/1361038385m/561456.jpg');
INSERT INTO "Books" VALUES (11127,4,42.5,66238501,9780066238500,480,1956,'The Chronicles of Narnia',4.24,376385,'https://images.gr-assets.com/books/1449868701m/11127.jpg');
INSERT INTO "Books" VALUES (5359,12,35.5,385339089,9780385339090,1734,1993,'The Client',3.97,320083,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (43615,11,13.5,452284694,9780452284690,3275,1982,'The Gunslinger',3.99,332494,'https://images.gr-assets.com/books/1375776480m/43615.jpg');
INSERT INTO "Books" VALUES (1622,6,38,743477545,9780743477540,3608,1595,'A Midsummer Night''s Dream',3.94,334241,'https://images.gr-assets.com/books/1327874534m/1622.jpg');
INSERT INTO "Books" VALUES (233093,4,48.99,'039480001X',9780394800010,891,1957,'The Cat in the Hat',4.15,314016,'https://images.gr-assets.com/books/1468890477m/233093.jpg');
INSERT INTO "Books" VALUES (21853621,14,40.99,312577222,9780312577220,2069,2015,'The Nightingale',4.54,253606,'https://images.gr-assets.com/books/1451446316m/21853621.jpg');
INSERT INTO "Books" VALUES (29579,28,43.5,553803719,9780553803720,1406,1951,'Foundation',4.13,279688,'https://images.gr-assets.com/books/1417900846m/29579.jpg');
INSERT INTO "Books" VALUES (15783514,12,48.5,62255657,9780062255660,2624,2013,'The Ocean at the End of the Lane',3.99,293844,'https://images.gr-assets.com/books/1497098563m/15783514.jpg');
INSERT INTO "Books" VALUES (17061,11,25.49,61139378,9780061139380,2624,2002,'Coraline',4.03,316379,'https://images.gr-assets.com/books/1493497435m/17061.jpg');
INSERT INTO "Books" VALUES (12067,11,47,60853980,9780060853980,3396,1990,'Good Omens: The Nice and Accurate Prophecies of Agnes Nutter, Witch',4.25,298304,'https://images.gr-assets.com/books/1392528568m/12067.jpg');
INSERT INTO "Books" VALUES (19691,12,30.5,425172902,9780425172900,3459,1984,'The Hunt for Red October',4.01,270318,'https://images.gr-assets.com/books/1281995542m/19691.jpg');
INSERT INTO "Books" VALUES (140225,6,46.95,'006112527X',9780061125270,480,1951,'The Voyage of the Dawn Treader',4.08,306492,'https://images.gr-assets.com/books/1343185059m/140225.jpg');
INSERT INTO "Books" VALUES (9520360,11,35.95,1423140591,9781423140600,2950,2011,'The Son of Neptune',4.44,299980,'https://images.gr-assets.com/books/1464201114m/9520360.jpg');
INSERT INTO "Books" VALUES (10644930,12,43,1451627289,9781451627280,3275,2011,'11/22/1963',4.29,258464,'https://images.gr-assets.com/books/1327876792m/10644930.jpg');
INSERT INTO "Books" VALUES (135479,12,30.99,140285601,9780140285600,2074,1963,'Cat''s Cradle',4.18,238940,'https://images.gr-assets.com/books/1327867150m/135479.jpg');
INSERT INTO "Books" VALUES (2213661,11,45,60530928,9780060530920,2624,2008,'The Graveyard Book',4.12,302303,'https://images.gr-assets.com/books/1303859949m/2213661.jpg');
INSERT INTO "Books" VALUES (14866,12,16.99,743496728,9780743496730,1690,2007,'Nineteen Minutes',4.1,235978,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (10916,12,32.49,61150142,9780061150140,1690,1998,'The Pact',4,221225,'https://images.gr-assets.com/books/1410754561m/10916.jpg');
INSERT INTO "Books" VALUES (65605,4,44.99,60764902,9780060764910,480,1953,'The Magician''s Nephew',4.01,268355,'https://images.gr-assets.com/books/1308814770m/65605.jpg');
INSERT INTO "Books" VALUES (6689,4,13.95,375814248,9780375814240,2958,1961,'James and the Giant Peach',3.99,270402,'https://images.gr-assets.com/books/1320412586m/6689.jpg');
INSERT INTO "Books" VALUES (24192,12,41.99,385339690,9780385339700,1734,1996,'The Runaway Jury',3.96,222712,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (121749,6,11,'000720230X',9780007202300,480,1951,'Prince Caspian',3.96,250221,'https://images.gr-assets.com/books/1308814880m/121749.jpg');
INSERT INTO "Books" VALUES (12996,6,27,743477553,9780743477550,3608,1603,'Othello',3.88,238875,'https://images.gr-assets.com/books/1459795105m/12996.jpg');
INSERT INTO "Books" VALUES (78411,12,41.5,439206472,9780439206470,2167,1999,'The Bad Beginning',3.89,275670,'https://images.gr-assets.com/books/1490085391m/78411.jpg');
INSERT INTO "Books" VALUES (191139,4,15.5,679805273,9780679805270,891,1990,'Oh, The Places You''ll Go!',4.34,257260,'https://images.gr-assets.com/books/1421708635m/191139.jpg');
INSERT INTO "Books" VALUES (18254,6,20.49,141439742,9780141439750,553,1838,'Oliver Twist',3.85,230181,'https://images.gr-assets.com/books/1327868529m/18254.jpg');
INSERT INTO "Books" VALUES (11149,12,10,60652896,9780060652890,480,1942,'The Screwtape Letters',4.21,116277,'https://images.gr-assets.com/books/1347801873m/11149.jpg');
INSERT INTO "Books" VALUES (113946,4,35.95,7173040,9780007173040,891,1957,'How the Grinch Stole Christmas!',4.36,250602,'https://images.gr-assets.com/books/1327958149m/113946.jpg');
INSERT INTO "Books" VALUES (6319,4,25.95,141311371,9780141311370,2958,1982,'The BFG',4.22,245855,'https://images.gr-assets.com/books/1327872673m/6319.jpg');
INSERT INTO "Books" VALUES (11297,12,24,375704027,9780375704020,1289,1987,'Norwegian Wood',4.02,183988,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (7784,4,22.5,679889108,9780679889110,891,1971,'The Lorax',4.35,226564,'https://images.gr-assets.com/books/1327879938m/7784.jpg');
INSERT INTO "Books" VALUES (4980,6,21.5,385334206,9780385334200,2074,1973,'Breakfast of Champions',4.08,178154,'https://images.gr-assets.com/books/1327934446m/4980.jpg');
INSERT INTO "Books" VALUES (6327,4,39,590032496,9780590032490,2958,1983,'The Witches',4.17,221431,'https://images.gr-assets.com/books/1351707720m/6327.jpg');
INSERT INTO "Books" VALUES (862041,12,34.5,545044251,9780545044260,1434,1998,'Harry Potter Boxset',4.74,190050,'https://images.gr-assets.com/books/1392579059m/862041.jpg');
INSERT INTO "Books" VALUES (4929,12,33,1400079276,9781400079280,1289,2002,'Kafka on the Shore',4.13,167593,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (41804,28,10.99,553803700,9780553803710,1406,1950,'I, Robot',4.17,198368,'https://images.gr-assets.com/books/1388321463m/41804.jpg');
INSERT INTO "Books" VALUES (7315573,14,12.95,525951652,9780525951650,1998,2010,'Fall of Giants',4.26,168911,'https://images.gr-assets.com/books/1470384630m/7315573.jpg');
INSERT INTO "Books" VALUES (7670,28,38.5,60541814,9780060541810,2490,1969,'The Andromeda Strain',3.87,173186,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (7967,28,19.5,812550757,9780812550760,2696,1986,'Speaker for the Dead',4.04,164287,'https://images.gr-assets.com/books/1295660894m/7967.jpg');
INSERT INTO "Books" VALUES (11275,12,14.99,965341984,9780965341980,1289,1994,'The Wind-Up Bird Chronicle',4.17,133408,'https://images.gr-assets.com/books/1327872639m/11275.jpg');
INSERT INTO "Books" VALUES (12957,6,40.99,743482751,9780743482750,3608,1598,'Much Ado About Nothing',4.06,175616,'https://images.gr-assets.com/books/1327885569m/12957.jpg');
INSERT INTO "Books" VALUES (107291,12,22.5,'045057458X',9780450574580,3275,1991,'Needful Things',3.87,153821,'https://images.gr-assets.com/books/1315767817m/107291.jpg');
INSERT INTO "Books" VALUES (58696,6,46.5,140439447,9780140439440,553,1849,'David Copperfield',3.96,150512,'https://images.gr-assets.com/books/1461452762m/58696.jpg');
INSERT INTO "Books" VALUES (83763,28,17.49,61015725,9780061015720,2490,2002,'Prey',3.72,131352,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (5064,14,38.5,525950079,9780525950070,1998,2007,'World Without End',4.23,128715,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (455373,28,31.49,345418972,9780345418980,2490,1987,'Sphere',3.77,128244,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (12938,6,40.99,'074348276X',9780743482770,3608,1603,'King Lear',3.89,135448,'https://images.gr-assets.com/books/1331563731m/12938.jpg');
INSERT INTO "Books" VALUES (9532,28,16.95,765342405,9780765342410,2696,1998,'Ender''s Shadow',4.3,115521,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (13006,6,37.95,198320272,9780198320270,3608,1599,'Julius Caesar',3.65,119933,'https://images.gr-assets.com/books/1354574927m/13006.jpg');
INSERT INTO "Books" VALUES (47021,6,40.95,'074347757X',9780743477570,3608,1593,'The Taming of the Shrew',3.81,126318,'https://images.gr-assets.com/books/1327935253m/47021.jpg');
INSERT INTO "Books" VALUES (29581,28,31.5,553803727,9780553803720,1406,1952,'Foundation and Empire',4.2,105595,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (7770,4,48.99,7173687,9780007173690,891,1960,'One Fish, Two Fish, Red Fish, Blue Fish',4.12,117582,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (8648,28,33.49,312861877,9780312861870,2696,1991,'Xenocide',3.77,104467,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (24128,6,11.95,743477561,9780743477570,3608,1596,'The Merchant of Venice',3.78,115621,'https://images.gr-assets.com/books/1327871054m/24128.jpg');
INSERT INTO "Books" VALUES (1625,6,40.49,743482778,9780743482780,3608,1601,'Twelfth Night',3.97,119607,'https://images.gr-assets.com/books/1416628008m/1625.jpg');
INSERT INTO "Books" VALUES (29580,28,19,553803735,9780553803730,1406,1953,'Second Foundation',4.23,96865,'https://images.gr-assets.com/books/1417900922m/29580.jpg');
INSERT INTO "Books" VALUES (4982,28,29.49,1857988841,9781857988840,2074,1959,'The Sirens of Titan',4.16,72493,'https://images.gr-assets.com/books/1419363185m/4982.jpg');
INSERT INTO "Books" VALUES (12959233,14,38,525952926,9780525952920,1998,2012,'Winter of the World',4.29,71971,'https://images.gr-assets.com/books/1369453743m/12959233.jpg');
INSERT INTO "Books" VALUES (31360,28,38.5,765304740,9780765304740,2696,1996,'Children of the Mind',3.74,74517,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (46654,28,28,380508567,9780380508560,1406,1953,'The Foundation Trilogy',4.39,72311,'https://images.gr-assets.com/books/1316412178m/46654.jpg');
INSERT INTO "Books" VALUES (31456,4,42.95,141318309,9780141318300,2958,1980,'The Twits',3.94,82458,'https://images.gr-assets.com/books/1406090629m/31456.jpg');
INSERT INTO "Books" VALUES (7779,4,41,679800034,9780679800030,891,1954,'Horton Hears a Who!',4.16,80883,'https://images.gr-assets.com/books/1327924655m/7779.jpg');
INSERT INTO "Books" VALUES (31242,6,12,143037617,9780143037610,553,1853,'Bleak House',4,67433,'https://images.gr-assets.com/books/1280113147m/31242.jpg');
INSERT INTO "Books" VALUES (9534,28,38.5,812565959,9780812565960,2696,2000,'Shadow of the Hegemon',3.93,58991,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (6693,4,44.49,375822070,9780375822070,2958,1970,'Fantastic Mr. Fox',4.03,66015,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (9593,28,33.95,385333870,9780385333870,2074,1985,'Galápagos',3.87,48330,'https://images.gr-assets.com/books/1355012643m/9593.jpg');
INSERT INTO "Books" VALUES (11389875,14,48.5,525953094,9780525953100,1998,2014,'Edge of Eternity',4.04,21459,'https://images.gr-assets.com/books/1377871984m/11389875.jpg');
INSERT INTO "Books" VALUES (41811,28,38.99,586008357,9780586008360,1406,1954,'The Caves of Steel',4.14,51059,'https://images.gr-assets.com/books/1335782224m/41811.jpg');
INSERT INTO "Books" VALUES (25350,28,13,7157150,9780007157150,480,1938,'Out of the Silent Planet',3.92,49617,'https://images.gr-assets.com/books/1310984018m/25350.jpg');
INSERT INTO "Books" VALUES (6687,4,44.49,142404128,9780142404130,2958,1972,'Charlie and the Great Glass Elevator',3.64,62359,'https://images.gr-assets.com/books/1309211607m/6687.jpg');
INSERT INTO "Books" VALUES (105549,4,15,7158505,9780007158510,891,1961,'The Sneetches and Other Stories',4.31,52954,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (74532,4,13.49,224064908,9780224064900,2958,1981,'George''s Marvellous Medicine',4.02,49863,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (7788,4,42.5,807218731,9780807218730,891,2003,'The Cat in the Hat and Other Dr. Seuss Favorites',4.41,46279,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (76683,28,48.49,553293389,9780553293390,1406,1982,'Foundation''s Edge',4.08,47641,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (68527,14,10,60887184,9780060887190,368,2004,'The Last Kingdom',4.23,38890,'https://images.gr-assets.com/books/1407107780m/68527.jpg');
INSERT INTO "Books" VALUES (105552,4,44.95,7169914,9780007169920,891,1970,'Mr. Brown Can Moo! Can You?',4.11,41437,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (68520,14,20.99,312156960,9780312156960,368,1995,'The Winter King',4.27,23540,'https://images.gr-assets.com/books/1311987677m/68520.jpg');
INSERT INTO "Books" VALUES (68528,14,40,61144835,9780061144840,368,2005,'The Pale Horseman',4.27,21686,'https://images.gr-assets.com/books/1421710510m/68528.jpg');
INSERT INTO "Books" VALUES (68526,14,49.99,60888628,9780060888630,368,2006,'Lords of the North',4.32,20296,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (825508,14,42.95,440217490,9780440217500,1998,1993,'A Dangerous Fortune',3.99,18219,'https://images.gr-assets.com/books/1387637715m/825508.jpg');
INSERT INTO "Books" VALUES (1297150,14,22,60888644,9780060888640,368,2007,'Sword Song',4.28,17106,'https://images.gr-assets.com/books/1407111536m/1297150.jpg');
INSERT INTO "Books" VALUES (68531,14,25,60935766,9780060935760,368,2000,'The Archer''s Tale',4.12,16032,'https://images.gr-assets.com/books/1407709312m/68531.jpg');
INSERT INTO "Books" VALUES (5062,14,42.99,451219597,9780451219600,1998,2001,'Jackdaws',3.91,17489,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (3276012,14,32.95,7271212,9780007271210,368,2008,'Azincourt',4.11,14098,'https://images.gr-assets.com/books/1327151016m/3276012.jpg');
INSERT INTO "Books" VALUES (68521,14,24.99,312206488,9780312206480,368,1997,'Excalibur',4.38,12925,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (13516846,14,47.99,62009494,9780062009490,3396,2012,'Dodger',3.9,14775,'https://images.gr-assets.com/books/1343828971m/13516846.jpg');
INSERT INTO "Books" VALUES (5053,14,11,451208706,9780451208700,1998,1982,'The Man From St. Petersburg',3.84,13193,'https://images.gr-assets.com/books/1411331808m/5053.jpg');
INSERT INTO "Books" VALUES (328907,14,37.49,60932309,9780060932300,368,1997,'Sharpe''s Tiger',4.08,12793,'https://s.gr-assets.com/assets/nophoto/book/111x148-bcc042a9c91a29c1d680899eff700a03.png');
INSERT INTO "Books" VALUES (11734251,14,45.95,7331789,9780007331790,368,2011,'Death of Kings',4.28,10479,'https://images.gr-assets.com/books/1327963375m/11734251.jpg');

