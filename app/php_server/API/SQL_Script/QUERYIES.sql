-- MySQL dump

-- @author Taban Cosmos
-- Date: 08/24/2015
-- ------------------------------
-- Host: localhost
-- Database ROOMLY.SPACE_DB
-- SERVER version 0.1
-- TABLE Structure FOR Roomly.space

/* USER TABLE FOR USER ACCOUNTS */


CREATE TABLE admin (
  id TINYINT AUTO_INCREMENT,
  email varchar(50) NOT NULL,
  time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS users (
  _userId      TINYINT AUTO_INCREMENT,
  PRIMARY KEY (_userId),
  username     VARCHAR(20)  NOT NULL,
  email        VARCHAR(100) NOT NULL,
  Password     VARCHAR(20)  NOT NULL,
  verifystring VARCHAR(20),
  active       TINYINT
);

# MESSAGE TABLE
CREATE TABLE messages (
  _mId        INT UNIQUE        NOT NULL AUTO_INCREMENT,
  sendTime    TIMESTAMP                  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  receiveTime TIMESTAMP                  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  messagebody VARCHAR(450)      NOT NULL,
  PRIMARY KEY (_mId),
  fk_user_id  SMALLINT UNSIGNED NOT NULL REFERENCES users (_userId)
);




# PREFERENCE TABLE
CREATE TABLE preference (
  _pId  INT               NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY (_pId),
  aboutUser      VARCHAR(1000),
  smoking        TINYINT           NOT NULL,
  partyingStatus TINYINT           NOT NULL,
  hygieneStatus  TINYINT           NOT NULL,
  drinkingStatus TINYINT           NOT NULL,
  fk_user_id     SMALLINT UNSIGNED NOT NULL REFERENCES users (_userId)
);




# APARTMENT TABLE
CREATE TABLE apartment (
  _id INT          NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY (_id),
  name         VARCHAR(20)  NOT NULL,
  location     VARCHAR(200) NOT NULL,
  price        DOUBLE      NOT NULL,
  lease        TINYINT      NOT NULL,
  fk_user_id SMALLINT UNSIGNED NOT NULL REFERENCES users(_userId)
);









# Accounts
CREATE TABLE Account (
  _AccountID      INT UNIQUE NOT NULL AUTO_INCREMENT,
  _UsersIDFK      INT        NOT NULL,
  _PreferenceIDFK INT        NOT NULL,
  _ApartmentIDFK  INT        NOT NULL,
  _MessageIDFK    INT        NOT NULL,
  INDEX (_UsersIDFK),
  INDEX (_PreferenceIDFK),
  INDEX (_ApartmentIDFK),
  INDEX (_MessageIDFK),
  AccountTime     TIMESTAMP

);


#ALTER STATEMENT

#INSERT STATEMENT

INSERT INTO users;
INSERT INTO apartment;
INSERT INTO preference;
INSERT INTO messages;




#SELECT STATEMENT

#Users data manipulation
SELECT * FROM users WHERE username = 'username';

SELECT username, Password FROM users WHERE Password = 'password' AND username = 'username' LIMIT 1;

#Preference data manipulation.

SELECT * FROM preference;













