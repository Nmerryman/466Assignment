CREATE TABLE Users (
  UserID INT PRIMARY KEY,
  Name VARCHAR(255)
);

CREATE TABLE Songs (
  SongID INT PRIMARY KEY,
  Title VARCHAR(255),
  BandName VARCHAR(255)
);

CREATE TABLE Requests (
  RequestID INT PRIMARY KEY,
  SongID INT,
  UserID INT,
  Time DATETIME,
  AmountPaid DECIMAL(10,2),
  QueueType VARCHAR(255),
  FOREIGN KEY (SongID) REFERENCES Songs(SongID),
  FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE SongVersions (
  VersionID INT PRIMARY KEY,
  SongID INT,
  KaraokeFile VARCHAR(255),
  FOREIGN KEY (SongID) REFERENCES Songs(SongID)
);

CREATE TABLE Contributors (
  ContributorID INT PRIMARY KEY,
  Name VARCHAR(255)
);

CREATE TABLE SongContributors (
  SongID INT,
  ContributorID INT,
  Role VARCHAR(255),
  PRIMARY KEY (SongID, ContributorID),
  FOREIGN KEY (SongID) REFERENCES Songs(SongID),
  FOREIGN KEY (ContributorID) REFERENCES Contributors(ContributorID)
);
