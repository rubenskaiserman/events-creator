DROP DATABASE IF EXISTS calendar;
CREATE DATABASE calendar;
\c calendar;
CREATE TABLE users (userId VARCHAR, name VARCHAR, senha VARCHAR);