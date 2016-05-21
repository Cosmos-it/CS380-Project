#------Create apartmentTable------

CREATE TABLE apartmentDB.apartmentInfo (
  Apt_id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  leaseTerm INT,
  pets ENUM('yes', 'no'),
  PRIMARY KEY (Apt_id)

);

#------Create location table-------
/*
    Location Table has
    1. address
    2. Points to apartment's rooms.

    If a room is in a different location, that is taken
    care off as well.

*/

CREATE TABLE location (
  id INT(11) AUTO_INCREMENT NOT NULL,
  adddress VARCHAR(11) NOT NULL,
  Apt_id int,
  CONSTRAINT apart_fr_key FOREIGN KEY(Apt_id) REFERENCES apartmentInfo(Apt_id),
  PRIMARY KEY (id)
);





#-------Create room types table

CREATE TABLE rooms (
  room_id INT NOT NULL AUTO_INCREMENT,
  studio INT(11) NOT NULL,
  twoBedroom INT(11) NOT NULL,
  threeBedroom INT(11) NOT NULL,
  Apt_id int,
  CONSTRAINT fr_key FOREIGN KEY(Apt_id) REFERENCES apartmentInfo(Apt_id),
  PRIMARY KEY (room_id)
);



#----- Price table ------

CREATE TABLE price (
  p_id INT NOT NULL AUTO_INCREMENT,
  price FLOAT,
  room_id int,
  CONSTRAINT foreign_key FOREIGN KEY(room_id) REFERENCES rooms(room_id),
  PRIMARY KEY (p_id)

);