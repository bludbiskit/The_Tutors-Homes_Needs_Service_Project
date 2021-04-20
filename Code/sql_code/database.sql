-- Just Writing Some Basic Sql Functions

CREATE TABLE SessionTimeout(
    Timeout Int(11)
);

CREATE TABLE User(
    User_ID INT(11) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Phone_Number INT(11) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Address_Number INT(11) NOT NULL,
    Street VARCHAR(255) NOT NULL,
    Zip_Code VARCHAR(255) NOT NULL,
    City VARCHAR(255) NOT NULL,
    State VARCHAR(2) NOT NULL,
    Driver_License_Picture VARCHAR(255) NOT NULL,
    Driver_License_Number INT(11) NOT NULL,
);

CREATE TABLE UserSession(
    Email VARCHAR(255) NOT NULL,
    Session_ID INT(11) NOT NULL,
    Session_Time INT(11) NOT NULL,
    Session_IP VARCHAR(255) NOT NULL,
);

CREATE TABLE Servicers(
    Servicers_ID INT(11) NOT NULL,
    User_ID INT(11) NOT NULL,
    Distance_From_Address INT(11) NOT NULL,
    Average_Rating INT(1) NOT NULL,
);

CREATE TABLE Clients(
    Client_ID INT(11) NOT NULL,
    User_ID INT(11) NOT NULL,
);

