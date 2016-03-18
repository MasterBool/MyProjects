DROP DATABASE IF EXISTS WebDisk;
CREATE DATABASE IF NOT EXISTS WebDisk;
USE WebDisk;

# 创建管理员表
DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    admin_name VARCHAR(20) NOT NULL ,
    password VARCHAR(32) NOT NULL ,
    email VARCHAR(50) NOT NULL
);

# 创建用户表
DROP TABLE IF EXISTS User;
CREATE TABLE User(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    user_name VARCHAR(20) NOT NULL ,
    password VARCHAR(32) NOT NULL ,
    email VARCHAR(50) NOT NULL,
    file_xml VARCHAR(50) NOT NULL ,
    available TINYINT(1) DEFAULT 1
);

# 创建文件表 size/MB
DROP TABLE IF EXISTS File;
CREATE TABLE File(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    file_name VARCHAR(50) NOT NULL ,
    path VARCHAR(50) NOT NULL ,
    md5 VARCHAR(30) NOT NULL ,
    size DECIMAL(10,2) NOT NULL ,
    category VARCHAR(10) NOT NULL
);

INSERT INTO File (file_name, path, md5, size, category) VALUES (
    'npm.js',
    '/home/wwwroot/default/PhpWorkPlace/WebDisk/app/upload/2016-03-17/npm.js',
    '8015042d0b4ac125867af5b096b175ce',
    '0.5',
    'unkoown'
);