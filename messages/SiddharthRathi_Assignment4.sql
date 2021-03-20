create database siddharthrathi_message_board;
use siddharthrathi_message_board;

CREATE TABLE messages (
	id int not null auto_increment,
	username varchar(10) not null,
    message varchar(50) not null,
    PRIMARY KEY (id)
);