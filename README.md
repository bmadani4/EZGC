Before running the website, you need to run the newdb.sql file to create the EZGC database. If you cannot find the file then run this:

create database EZGC;
use EZGC;
create table users(username varchar(30) primary key, password varchar(30), school varchar(30), level varchar(30), age int(10));
create table courses(username varchar(30), coursename varchar(30), primary key(coursename,username),foreign key(username) references users(username) on delete cascade on update cascade);
create table gradedist(username varchar(30), coursename varchar(30), assign_type varchar(30), assign_weight varchar(30),primary key(assign_type,username,coursename), foreign key(username) references users(username) on delete cascade on update cascade, foreign key(coursename) references courses(coursename) on delete cascade);
create table grades(username varchar(30), coursename varchar(30), grade varchar(30),primary key(username,coursename),foreign key(username) references users(username) on delete cascade on update cascade, foreign key(coursename) references courses(coursename) on delete cascade);
create table assign_grades(username varchar(30), coursename varchar(30),assign_name varchar(30), assign_type varchar(30), grade varchar(30),foreign key(username) references users(username) on delete cascade on update cascade, foreign key(coursename) references courses(coursename) on delete cascade, foreign key(assign_type) references gradedist(assign_type) on update cascade on delete cascade); 
