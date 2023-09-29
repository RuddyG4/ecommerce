DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE customers(
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    company_name VARCHAR(50),
    vat_no VARCHAR(50),
    meta JSON,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

