INSERT INTO Songs (Title, BandName) VALUES
('Grand', 'Kane Brown'),
('Old Town Road', 'Lil Nas X'),
('Better Now', 'Post Malone'),
('Congratulations', 'Post Malone'),
('This Aint A Scene', 'Fall Out Boy'),
('Thnks Fr th Mmrs', 'Fall Out Boy'),
('Flowers', 'Miley Cyrus'),
('Kill Bill', 'SZA'),
('Love Again', 'The Kid LAROI'),
('Gossip', 'Maneskin'),
('Im not here to make friends', 'Sam Smith'),
('Giddy Up', 'Shania Twain'),
('Trustfall', 'P!nk'),
('Queen of Kings', 'Alessandra'),
('F64', 'Ed Sheeran'),
('Voices', 'KSI, Oliver Tree'),
('I Want It That Way', 'Back Street Boys'),
('I Will Survive', 'Gloria Gaynor'),
('Bohemian Rhapsody', 'Queen'),
('Say It Ain\'t So', 'Weezer'),
('Love Shack', 'B-52s'),
('Life\'s A Mess II', 'Juice WRLD'),
('Circles', 'Post Malone'),
('White Iverson', 'Post Malone'),
('Heroes', 'David Bowie'), 
('Satellite of Love', 'Lou Reed'), 
('Under Pressure', 'Queen & David Bowie'), 
('Lust for Life', 'Iggy Pop'), 
('Raw Power', 'Iggy and The Stooges'),
('Heat Waves', 'Glass Animals');

INSERT INTO Contributors (Name)
VALUES
('Kane Brown'),
('Lil Nas X'),
('Billy Ray Cyrus'),
('YoungKio'),
('Austin Post'),
('Frank Dukes'),
('Quavo'),
('Fall Out Boy'),
('Pete Wentz'),
('Patrick Stump'),
('Joe Trohman'),
('Andy Hurley'),
('Neal Avron'),
('Babyface'),
('Miley Cyrus'),
('Kid Harpoon'),
('Tyler Johnson'),
('SZA'),
('Solana Rowe'),
('Carter Lang'),
('The Kid LAROI'),
('Charlton Howard'),
('Omer Fedi'),
('Maneskin'),
('Tom Morello'),
('Sam Smith'),
('Calvin Harris'),
('Shania Twain'),
('David Stewart'),
('P!nk'),
('Fred Again'),
('Alessandra Mele'),
('Ed Sheeran'),
('Fred again'),
('Oliver Tree'),
('Olajide Olatunji'),
('Digital Farm Animals'),
('Back Street Boys'),
('Andreas Carlsson'),
('Max Martin'),
('Kristian Lundin'),
('Gloria Gaynor'),
('Freddier Perren'),
('Dino Fekaris'),
('Queen'),
('Freddie Mercury'),
('Roy Thomas Baker'),
('Weezer'),
('Rivers Cuomo'),
('Ric Ocasek'),
('B-52s'),
('Don Was'),
('Juice WRLD'),
('Jarad Higgins'),
('Rick Rubin'),
('Louis Bell'),
('David Bowie'),
('Brian Eno'),
('Tony Visconti'),
('Lou Reed'),
('Mick Ronson'),
('Reinhold Mack'),
('Iggy Pop'),
('Hunt Sales'),
('James Williamson'),
('Glass Animals'),
('Dave Bayley'),
('Mike Posner'),
('Kameron Alexander'),
('Andrew Goldstein'),
('Montero Lamar Hill'),
('Trent Reznor'),
('Atticus Ross'),
('Adam Feeney'),
('Billy Walsh'),
('Leland Wayne'),
('Aldae'),
('Michael Pollack'),
('Rob Bisel'),
('Damiano David'),
('Victoria De Angelis'),
('Thomas Raggi'),
('Ethan Torchio'),
('Jimmy Napes'),
('James Napier'),
('Mikkel Eriksen'),
('ROMANS'),
('Jessica Agombar'),
('Johnny McDaid'),
('Alecia Moore'),
('Henning Olerud'),
('Stanley Ferdinandez'),
('Daniel Benson'),
('Fred Gibson'),
('David Omoregie'),
('Brian May'),
('Roger Taylor'),
('John Deacon'),
('Patrick Wilson'),
('Brian Bell'),
('Scott Shriner'),
('Fred Schneider'),
('Kate Pierson'),
('Cindy Wilson'),
('Ricky Wilson'),
('Keith Strickland'),
('Clever'),
('Andre Jackson'),
('Idan Kalai'),
('Drew McFarlane'),
('Edmund Irwin-Singer'),
('Joe Seaward'),
('Robert Fripp'),
('Carlos Alomar'), 
('George Murray'),
('Dennis David'),
('John Halsey'),
('Klaus Voorman'),
('Trevor Bolder'),
('Herbie Flowers'), 
('Ricky Gardiner'),
('Tony Sales'),
('Ron Asheton'),
('Scott Asheton');

INSERT INTO SongContributors (SongID, ContributorID, Role) VALUES 
(1, 1, 'Performer, Songwriter'), (1, 68, 'Songwriter'), (1, 69, 'Songwriter'), (1,70, 'Producer'),
(2, 2, 'Performer, Songwriter'), (2, 3, 'Performer'), (2, 4, 'Producer'), (2, 71, 'Songwriter'), (2, 72, 'Songwriter, Producer'), (2, 73, 'Songwriter, Producer'),
(3, 5, 'Performer, Songwriter'), (3, 6, 'Producer'), (3, 56, 'Songwriter, Producer'), (3, 74, 'Songwriter'), (3, 75, 'Songwriter'), 
(4, 5, 'Performer, Songwriter'), (4, 7, 'Performer, Songwriter'), (4, 6, 'Songwriter, Producer'), (4, 56, 'Songwriter, Producer'), (4, 74, 'Songwriter'), (4, 76, 'Songwriter'),
(5, 9, 'Bass, Guitarist, Singer, Songwriter'), (5, 10, 'Guitarist, Singer, Songwriter'), (5, 11, 'Guitarist, Singer, Songwriter'), (5, 12, 'Drummer, Singer, Songwriter'), (5, 13, 'Producer'),
(6, 9, 'Bass, Guitarist, Singer, Songwriter'), (6, 10, 'Guitarist, Singer, Songwriter'), (6, 11, 'Guitarist, Singer, Songwriter'), (6, 12, 'Drummer, Singer, Songwriter'), (6, 14, 'Producer'),
(7, 15, 'Singer, Songwriter'), (7, 16, 'Producer'), (7, 17, 'Producer'), (7, 77, 'Songwriter'), (7, 78, 'Songwriter'),
(8, 19, 'Singer, Songwriter'), (8, 20, 'Songwriter, Producer'), (8, 79, 'Songwriter, Producer'),
(9, 21, 'Performer'), (9, 22, 'Singer, Songwriter'), (9, 23, 'Songwriter, Producer'), (9, 75, 'Songwriter'),
(10, 25, 'Performer, Songwriter'), (10, 80, 'Singer'), (10, 81, 'Bass Guitarist'), (10, 82, 'Lead Guitarist'), (10, 83, 'Drummer'),
(11, 26, 'Singer, Songwriter'), (11, 27, 'Producer'), (11, 84, 'Producer'), (11, 85, 'Songwriter'), (11, 86, 'Songwriter'),
(12, 28, 'Singer, Songwriter'), (12, 29, 'Songwriter, Producer'), (12, 87, 'Songwriter'), (12, 88, 'Songwriter'),
(13, 30, 'Singer, Performer'), (13, 31, 'Producer'), (13, 89, 'Songwriter'), (13, 90, 'Songwriter'),
(14, 32, 'Singer, Songwriter'), (14, 91, 'Songwriter, Producer'), (14, 92, 'Songwriter, Producer'),
(15, 33, 'Singer, Songwriter'), (15, 34, 'Producer'), (15, 93, 'Songwriter'), (15, 94, 'Songwriter'), (15, 95, 'Songwriter'),
(16, 35, 'Singer, Songwriter'), (16, 36, 'Singer, Songwriter'), (16, 37, 'Producer'),
(17, 39, 'Singer, Songwriter'), (17, 40, 'Singer, Songwriter, Producer'), (17, 41, 'Producer'),
(18, 42, 'Performer'), (18, 43, 'Songwriter, Producer'), (18, 44, 'Songwriter, Producer'),
(19, 46, 'Singer, Songwriter'), (19, 47, 'Producer'), (19, 96, 'Singer, Lead Guitarist, Songwriter'), (19, 97, 'Drummer, Singer, Songwriter'), (19, 98, 'Bass Guitarist, Songwriter'),
(20, 49, 'Singer, Songwriter'), (20, 50, 'Producer'), (20, 99, 'Singer, Drummer, Songwriter'), (20, 100, 'Guitarist, Keyboard'), (20, 101, 'Singer, Bass Guitarist, Keyboard'),
(21, 52, 'Producer'), (21, 102, 'Singer, Percussion'), (21, 103, 'Singer, Songwriter, Keyboard'), (21, 104, 'Singer, Percussion'), (21, 105, 'Guitarist'), (21, 106, 'Drummer, Guitarist, Keyboard'),
(22, 54, 'Performer, Singer, Songwriter'), (22, 55, 'Producer'), (22, 107, 'Performer, Songwriter'), (22, 5, 'Singer, Songwriter'),
(23, 5, 'Performer, Songwriter'), (23, 56, 'Songwriter, Producer'), (23, 6, 'Songwriter, Producer'), (23, 74, 'Songwriter'), (23, 75, 'Songwriter'),
(24, 5, 'Performer, Songwriter, Producer'), (24, 108, 'Songwriter'), (24, 109, 'Songwriter'), 
(25, 57, 'Performer, Songwriter'), (25, 58, 'Songwriter, Producer'), (25, 59, 'Percussion, Singer, Producer'), (25, 113, 'Lead Guitarist'), (25, 114, 'Guitarist'), (25, 115, 'Bass Guitarist'), (25, 116, 'Drummer'),
(26, 60, 'Singer, Guitarist, Songwriter'), (26, 61, 'Piano, Producer'), (26, 57, 'Singer, Producer'), (26, 117, 'Drummer'), (26, 118, 'Bass Guitarist'), (26, 119, 'Trumpet'), (26, 120, 'Tuba'),
(27, 57, 'Performer, Songwriter'), (27, 62, 'Producer'), (27, 46, 'Singer, Songwriter'), (27, 96, 'Singer, Lead Guitarist, Songwriter'), (27, 97, 'Drummer, Singer, Songwriter'), (27, 98, 'Bass Guitarist, Songwriter'),
(28, 63, 'Singer, Songwriter'), (28, 57, 'Songwriter, Producer'), (28, 64, 'Singer, Drummer, Producer'), (28, 114, 'Guitarist'), (28, 121, 'Lead Guitarist'), (28, 122, 'Singer, Bass Guitarist'),
(29, 63, 'Singer, Songwriter, Piano'), (29, 65, 'Singer, Guitarist, Songwriter'), (29, 57, 'Producer'), (29, 123, 'Singer, Bass Guitarist'), (29, 124, 'Drummer'),
(30, 67, 'Lead Singer, Guitarist, Keyboard, Percussion, Songwriter, Producer'), (30, 110, 'Guitarist, Keyboard, Singer'), (30, 111, 'Bass Guitarist, Keyboard, Singer'), (30, 112, 'Drummer, Percussion');

INSERT INTO Users (Name) VALUES 
("Axel"), 
("Shelly"),
("James"),
("Mary"),
("Patricia"),
("Linda"),
("John"),
("Robert"),
("Michael"),
("William");



INSERT INTO SongVersions (SongID, FileName, Description)
SELECT s.SongID, f.FileName, f.Description
FROM (
  SELECT DISTINCT SongID
  FROM Songs
) s
CROSS JOIN (
  SELECT 'solo_version.mp3' AS FileName, 'Solo Version' AS Description
  UNION ALL
  SELECT 'duet_version.mp3' AS FileName, 'Duet Version' AS Description
) f;

INSERT INTO RequestQueue (VersionID, UserID, Time, AmountPaid, Played, QueueType) VALUES
(22, 10, NOW(), 0, 0, 'playing'),
(1, 1, NOW(), 0, 0, 'free'),
(30, 2, NOW(), 0, 0, 'free'),
(2, 3, NOW(), 0, 0, 'free'),
(9, 4, NOW(), 0, 0, 'free'),
(21, 5, NOW(), 0, 0, 'free'),
(18, 6, NOW(), 10.00, 0, 'priority'),
(4, 7, NOW(), 5.00, 0, 'priority'),
(27, 8, NOW(), 60.00, 0, 'priority'),
(3, 9, NOW(), 4.28, 0, 'priority'),
(6, 10, NOW(), 5.08, 0, 'priority');



