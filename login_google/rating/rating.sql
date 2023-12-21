CREATE TABLE DestinationRating (
    RatingID VARCHAR(5),
    DestinationID VARCHAR(5),
    DestinationName VARCHAR(50),
    Location VARCHAR(50),
    Date DATE,
    Rating INT
);

INSERT INTO DestinationRating (RatingID, DestinationID, DestinationName, Location, Date, Rating)
VALUES 
    ('RG01', 'DES11', 'Istana Maimun', 'Medan', '2023-09-01', 4),
    ('RG02', 'DES12', 'Mesjid Raya', 'Medan', '2023-09-01', 4),
    ('RG03', 'DES03', 'Giant Hill', 'Langkat', '2023-10-21', 5),
    ('RG04', 'DES19', 'Mickie Holiday', 'Berastagi', '2023-11-02', 5),
    ('RG05', 'DES13', 'Tangkahan', 'Langkat', '2023-11-22', 5);