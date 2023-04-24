INSERT INTO Songs (Title, BandName) VALUES
('Grand', 'Kane Brown'),
('Old Town Road', 'Lil Nas X'),
('Better Now', 'Post Malone'),
('Congratulations', 'Post Malone'),
('This Aint A Scene', 'Fall Out Boy'),
('Thnks Fr th Mmrs', 'Fall Out Boy'),
('Flowers', 'Miley Cyrus'),
('Kill Bill', 'SZA'),
('Love Again', 'The Kid LARIO'),
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
('Transformer', 'Lou Reed'), 
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
('Post Malone'),
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
('The Kid LARIO'),
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
('Fred'),
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
('Dave Bayley');

INSERT INTO SongContributors (SongID, ContributorID, Role) VALUES 
(1, 1, 'Performer and Songwriter'), 
(2, 2, 'Performer and Songwriter'), (2, 3, 'Performer'), (2, 4, 'Producer'),
(3, 5, 'Performer and Songwriter'), (3, 6, 'Producer'),
(4, 5, 'Performer and Songwriter'), (4, 7, 'Performer and Songwriter'), (4, 6, 'Songwriter and Producer'),
(5, 8, 'Performers'), (5, 9, 'Bass Guitarist Singer and Songwriter'), (5, 10, 'Guitarist Singer and Songwriter'), (5, 11, 'Guitarist Singer and Songwriter'), (5, 12, 'Drummer Singer and Songwriter'), (5, 13, 'Producer'),
(6, 8, 'Performers'), (6, 9, 'Bass Guitarist Singer and Songwriter'), (6, 10, 'Guitarist Singer and Songwriter'), (6, 11, 'Guitarist Singer and Songwriter'), (6, 12, 'Drummer Singer and Songwriter'), (6, 14, 'Producer'),
(7, 15, 'Singer and Songwriter'), (7, 16, 'Producer'), (7, 17, 'Producer'),
(8, 18, 'Performer'), (8, 19, 'Singer and Songwriter'), (8, 20, 'Producer'),
(9, 21, 'Performer'), (9, 22, 'Singer and Songwriter'), (9, 23, 'Producer'),
(10, 24, 'Performers Songwriters and Producers'), (10, 25, 'Performer and Songwriter'),
(11, 26, 'Singer and Songwriter'), (11, 27, 'Producer'),
(12, 28, 'Singer and Songwriter'), (12, 29, 'Songwriter and Producer'),
(13, 30, 'Singer and Songwriter'), (13, 31, 'Producer'),
(14, 32, 'Singer and Songwriter'),
(15, 33, 'Singer and Songwriter'), (15, 34, 'Producer'),
(16, 35, 'Singer and Songwriter'), (16, 36, 'Singer and Songwriter'), (16, 37, 'Producer'),
(17, 38, 'Performers'), (17, 39, 'Singer and Songwriter'), (17, 40, 'Singer Songwriter and Producer'), (17, 41, 'Producer'),
(18, 42, 'Performer'), (18, 43, 'Songwriter and Producer'), (18, 44, 'Songwriter and Producer'),
(19, 45, 'Performers and Producers'), (19, 46, 'Songwriter'), (19, 47, 'Producer'),
(20, 48, 'Performers'), (20, 49, 'Songwriter'), (20, 50, 'Producer'),
(21, 51, 'Performers and Songwriters'), (21, 52, 'Producer'),
(22, 53, 'Performers'), (22, 54, 'Performer and Songwriter'), (22, 55, 'Producer'),
(23, 5, 'Performer and Songwriter'), (23, 56, 'Producer'), (23, 6, 'Producer'),
(24, 5, 'Performer and Songwriter'), 
(25, 57, 'Performer and Songwriter'), (25, 58, 'Songwriter and Producer'), (25, 59, 'Producer'),
(26, 60, 'Performer and Songwriter'), (26, 61, 'Performer and Producer'), (26, 57, 'Producer'),
(27, 45, 'Performers and Producers'), (27, 57, 'Performer and Songwriter'), (27, 62, 'Producer'),
(28, 63, 'Performer and Songwriter'), (28, 57, 'Songwriter and Producer'), (28, 64, 'Performer and Producer'),
(29, 63, 'Performer and Songwriter'), (29, 65, 'Performer and Songwriter'), (29, 57, 'Producer'),
(30, 66, 'Performers and Songwriters'), (30, 67, 'Producer');

-- TODO probably remove these later
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





