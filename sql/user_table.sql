DROP DATABASE IF EXISTS events_creator;
CREATE DATABASE events_creator;
\c events_creator;
CREATE TABLE users (userId VARCHAR, name VARCHAR, senha VARCHAR);
CREATE TABLE events (eventId SERIAL, title VARCHAR, discription VARCHAR, startDate DATE, endDate DATE);