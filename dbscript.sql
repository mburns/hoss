DROP TABLE IF EXISTS Suggest_Project;
CREATE TABLE Suggest_Project(
		SPID INT(10) Not Null AUTO_INCREMENT,
		fullname varchar(30),
		email varchar(40),
		organization varchar(30),
		address TEXT,
		city varchar(20),
		stateA varchar(20),
		zip int(10),
		projectName varchar(20),
		projectDescription TEXT,
		status varchar(20),
		primary key (SPID)
		)
DROP TABLE IF EXISTS users;
CREATE TABLE users(
		id INT(11) NOT NULL AUTO_INCREMENT,
		status varchar(20) NOT NULL,
		username varchar(40),
		password varchar(40),
		fullname varchar(40),
		email varchar(40),
		activationkey int(100) NOT NULL,
		primary key (id)
		
		)

DROP TABLE IF EXISTS Search_Project;
CREATE TABLE Search_Project(
	PID Int(10) Not Null AUTO_INCREMENT,
	projectName varchar(30),
	projectDescription TEXT,
	primary key (PID)
	)
DROP TABLE IF EXISTS Software_Review;
CREATE TABLE Software_Review(
	SRID INT(10) Not Null AUTO_INCREMENT,
	summary TEXT,
	users_id INT(10),
	pros TEXT,
	cons TEXT,
	review TEXT,
	datesubmitted DATE,
	recommended varchar(4),
	softwarename varchar(15),
	primary key (SRID),
	Foreign Key (users_id) references users(id)
	)
	
