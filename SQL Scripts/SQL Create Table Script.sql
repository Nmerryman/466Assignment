DROP TABLE IF EXISTS SongContributors;
DROP TABLE IF EXISTS RequestQueue;
DROP TABLE IF EXISTS Contributors;
DROP TABLE IF EXISTS SongVersions;
DROP TABLE IF EXISTS Songs;
DROP TABLE IF EXISTS Users;


CREATE TABLE Users (
  UserID INT PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(255)
);

CREATE TABLE Songs (
  SongID INT PRIMARY KEY AUTO_INCREMENT,
  Title VARCHAR(255),
  BandName VARCHAR(255)
);

CREATE TABLE SongVersions (
  VersionID INT PRIMARY KEY AUTO_INCREMENT,
  SongID INT,
  FileName VARCHAR(255),
  Description VARCHAR(255),
  FOREIGN KEY (SongID) REFERENCES Songs(SongID)
);

CREATE TABLE Contributors (
  ContributorID INT PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(255)
);

CREATE TABLE RequestQueue (
    RequestID INT PRIMARY KEY AUTO_INCREMENT,
    VersionID INT,
    UserID INT,
    Time DATETIME,
    AmountPaid DECIMAL(10,2),
    Played BIT,
    QueueType VARCHAR(255),
    FOREIGN KEY (VersionID) REFERENCES SongVersions(VersionID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE SongContributors (
  SongID INT,
  ContributorID INT,
  Role VARCHAR(255),
  PRIMARY KEY (SongID, ContributorID),
  FOREIGN KEY (SongID) REFERENCES Songs(SongID),
  FOREIGN KEY (ContributorID) REFERENCES Contributors(ContributorID)
);






