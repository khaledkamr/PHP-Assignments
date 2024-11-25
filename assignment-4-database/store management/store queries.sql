CREATE DATABASE IF NOT EXISTS store_management;

CREATE TABLE governorates (
    `governorate_id` INT AUTO_INCREMENT PRIMARY KEY,
    `governorate_name` VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE stores (
    `store_id` INT AUTO_INCREMENT PRIMARY KEY,
    `store_name` VARCHAR(20) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `governorate_id` INT NOT NULL,
    FOREIGN KEY (governorate_id) REFERENCES governorates(governorate_id) ON DELETE CASCADE
);

CREATE TABLE suppliers (
    `suppliers_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20) NOT NULL,
    `phone` VARCHAR(11) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `brief_data` TEXT
);

CREATE TABLE products (
    `product_id` INT AUTO_INCREMENT PRIMARY KEY,
    `product_name` VARCHAR(20) NOT NULL,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `description` TEXT,
    `price` INT NOT NULL,
    `suppliers_id` INT NOT NULL,
    FOREIGN KEY (suppliers_id) REFERENCES suppliers(suppliers_id) ON DELETE CASCADE
);

CREATE TABLE store_products (
    store_id INT NOT NULL,
    product_id INT NOT NULL,
    PRIMARY KEY (store_id, product_id),
    FOREIGN KEY (store_id) REFERENCES stores(store_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);