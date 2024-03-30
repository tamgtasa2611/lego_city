CREATE DATABASE legocity;
USE legocity;

CREATE TABLE brands (
	id INT auto_increment,
    name VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE ages (
	id INT auto_increment,
    name VARCHAR(255),
    description TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE categories (
	id INT auto_increment,
    name VARCHAR(255),
    image TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE products (
	id INT auto_increment,
    name VARCHAR(255),
    quantity INT,
    price FLOAT,
    description TEXT,
    image TEXT,
    category_id INT,
    age_id INT,
    brand_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (age_id) REFERENCES ages(id) ON DELETE SET NULL,
    FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE SET NULL
);

CREATE TABLE admins (
	id INT auto_increment,
    email VARCHAR(255) unique,
    password VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    phone_number VARCHAR(13),
    level INT,
    image TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE customers (
	id INT auto_increment,
    email VARCHAR(255) unique,
    password VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    phone_number VARCHAR(13),
    address TEXT,
	image TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE payment_methods (
	id INT auto_increment,
    method_name VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE orders (
	id INT auto_increment,
    date DATETIME,
    status INT,
    receiver_name VARCHAR(255),
    receiver_phone VARCHAR(13),
    receiver_address TEXT,
    admin_id INT,
    customer_id INT,
	method_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL,
	FOREIGN KEY (method_id) REFERENCES payment_methods(id) ON DELETE SET NULL
);

CREATE TABLE orders_details (
	order_id INT,
    product_id INT,
    sold_price FLOAT,
    sold_quantity INT,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

/*================================================================*/

INSERT INTO brands(name) VALUES
("Mojang Studios"),
("Disney"),
("Marvel"),
("DC"),
("Sega"),
("Nintendo");

INSERT INTO ages(name) VALUES
("1.5+"),
("4+"),
("6+"),
("9+"),
("13+"),
("18+");

INSERT INTO categories(name) VALUES
("Batman"),
("Minecraft"),
("Lunar New Year"),
("Valentine"),
("Disney"),
("Marvel");

INSERT INTO products(name, quantity, price, description, image, category_id, age_id, brand_id) VALUES
("Auspicious Dragon", 100, 49.99, "", "images/products/product_1.webp", 3, 6, 2),
("Batmobile™: Batman™ vs. The Joker™ Chase", 100, 88.99, "", "images/products/product_2.webp", 1, 3, 4),
("Spring Festival Mickey Mouse", 100, 79.99, "", "images/products/product_3.webp", 5, 1, 2),
("Nano Gauntlet", 100, 76.99, "", "images/products/product_4.webp", 3, 4, 6),
("The Abandoned Mine", 100, 85.99, "", "images/products/product_5.webp", 2, 4, 1),
("Heart Ornament", 100, 29.99, "", "images/products/product_6.webp", 4, 5, 5);

USE legocity;
INSERT INTO admins(email, password) VALUES
('a@gmail.com', '$2y$12$SPWt2wlVqJKFkSw9OuwJr.R5hA/w1gTmITxLKey5DpfAkUkgXWW5i');
/*123456 */

select * from categories;
select * from products;

select categories.*, count(category_id) from categories
left join products on categories.id = products.category_id
group by id, name, image;
