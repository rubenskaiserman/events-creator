DROP DATABASE IF EXISTS events_creator;
CREATE DATABASE events_creator;
\c events_creator;
CREATE ROLE creator LOGIN SUPERUSER PASSWORD 'events';
CREATE TABLE users (userId SERIAL PRIMARY KEY, email VARCHAR,  name VARCHAR, password VARCHAR);
CREATE TABLE events (eventId SERIAL, title VARCHAR, discription VARCHAR, startDate DATE, endDate DATE, startHour TIME, endHour TIME, userId INT);