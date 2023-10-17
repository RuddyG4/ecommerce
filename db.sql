CREATE TABLE "roles" (
	id SERIAL PRIMARY KEY,
	NAME VARCHAR(40) NOT NULL,
	description VARCHAR(150) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE "users" (
	id SERIAL PRIMARY KEY,
	email VARCHAR(60) NOT NULL,
	password VARCHAR(255) NOT NULL,
	remember_token BOOL DEFAULT '0',
	role_id INT REFERENCES roles(id)
);

CREATE TABLE "permissions" (
	id SERIAL PRIMARY KEY,
	name VARCHAR(40) NOT NULL,
	description VARCHAR(150) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE "permission_role" (
	permission_id INT NOT NULL REFERENCES permissions(id),
	role_id INT NOT NULL REFERENCES roles(id),
	PRIMARY KEY (permission_id, role_id)
);

CREATE TABLE cities (
	id SERIAl PRIMARY KEY,
	city_name VARCHAR(10) NOT NULL
);

CREATE TABLE customers (
	id SERIAL,
	first_name VARCHAR(60) NOT NULL,
	last_name VARCHAR(60) NOT NULL,
	phone VARCHAR(30) UNIQUE,
	city_id INT NOT NULL,
	user_id INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES users (id),
	FOREIGN KEY (city_id) REFERENCES cities (id)
);

CREATE TABLE shipping_addresses (
	id SERIAL PRIMARY KEY,
	city_id INT NOT NULL REFERENCES cities (id),
	shipping_address1 VARCHAR(80) NOT NULL,
	shipping_address2 VARCHAR(80),
	customer_id INT NOT NULL REFERENCES customers (id)
);

-- ------------------------ PRODUCTOS ------------------------------

CREATE TABLE brands (
	id SERIAL PRIMARY KEY,
	brand_name VARCHAR(30) NOT NULL
);

CREATE TABLE product_types (
	id SERIAL PRIMARY KEY,
	name VARCHAR(30) NOT NULL
);

CREATE TABLE vendors (
	id SERIAL PRIMARY KEY,
	vendor_name VARCHAR(30) NOT NULL
);

CREATE TABLE categories (
	id SERIAL PRIMARY KEY,
	category_name VARCHAR(30) NOT NULL,
	category_id INT REFERENCES categories (id)
);

CREATE TABLE tags (
	id SERIAL PRIMARY KEY,
	tag_name VARCHAR(30) NOT NULL
);

CREATE TABLE products (
	id SERIAL PRIMARY KEY,
	product_name VARCHAR(40) NOT NULL,
	description VARCHAR(150) NOT NULL,
	state BOOL NOT NULL DEFAULT '0',
	weight NUMERIC(5, 2) NOT NULL DEFAULT 0.00,
	brand_id INT REFERENCES brands (id),
	product_type_id INT REFERENCES product_types (id),
	vendor INT REFERENCES vendors (id),
	category_id INT REFERENCES categories (id),
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE product_tag (
	product_id INT NOT NULL REFERENCES products (id),
	tag_id INT NOT NULL REFERENCES tags (id),
	PRIMARY KEY (product_id, tag_id)
);

CREATE TABLE product_images (
	id SERIAL PRIMARY KEY,
	photo_path VARCHAR(255) NOT NULL,
	product_id INT NOT NULL REFERENCES products (id)
);

CREATE TABLE branches (
	id SERIAL PRIMARY KEY,
	branch_name VARCHAR(40) NOT NULL,
	address VARCHAR(140) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP,
	city_id INT NOT NULL REFERENCES cities (id)
);

CREATE TABLE inventory (
	product_id INT NOT NULL REFERENCES products (id),
	branch_id INT NOT NULL REFERENCES branches (id),
	stock SMALLINT NOT NULL DEFAULT 0,
	sale_price NUMERIC(8, 2) NOT NULL DEFAULT 0.00,
	purchase_price NUMERIC(8, 2) NOT NULL DEFAULT 0.00,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP,

	PRIMARY KEY (product_id, branch_id)
);

CREATE TABLE collections (
	id SERIAL PRIMARY KEY,
	collection_name VARCHAR(40) NOT NULL,
	description VARCHAR(255) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE product_collection (
	product_id INT NOT NULL REFERENCES products (id),
	collection_id INT NOT NULL REFERENCES collections (id),
	PRIMARY KEY (product_id, collection_id)
);

CREATE TABLE wishlists (
	customer_id INT NOT NULL REFERENCES customers (id),
	product_id INT NOT NULL REFERENCES products (id),
	created_at TIMESTAMP NOT NULL,
	PRIMARY KEY (customer_id, product_id)
);

CREATE TABLE shopping_carts (
	id SERIAL PRIMARY KEY,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP,
	customer_id INT NOT NULL REFERENCES customers (id)
);

CREATE TABLE cart_items (
	id SERIAL,
	qty SMALLINT NOT NULL,
	cart_id INT NOT NULL,
	product_id INT NOT NULL,
	FOREIGN KEY (cart_id) REFERENCES shopping_carts (id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (product_id) REFERENCES products (id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY (id, cart_id)
);

-- ----------------- ORDERS -----------------

CREATE TABLE shipping_methods (
	id SERIAL PRIMARY KEY,
	method_name VARCHAR(40) NOT NULL,
	method_description VARCHAR(255) NOT NULL,
	price_per_kg NUMERIC(5, 2) NOT NULL DEFAULT 0.00,
	price_per_km NUMERIC(5, 2) NOT NULL DEFAULT 0.00
);

CREATE TABLE discounts (
	id SERIAL PRIMARY KEY,
	discount_name VARCHAR(30) NOT NULL,
	discount_description VARCHAR(255) NOT NULL,
	discount_type BOOL NOT NULL DEFAULT '0', -- 0 = fixed, 1 = percentage
	value NUMERIC(5, 2) NOT NULL,
	allowed_uses SMALLINT NOT NULL DEFAULT 0,
	start_date TIMESTAMP NOT NULL,
	end_date TIMESTAMP,
	is_active BOOL NOT NULL DEFAULT '0' -- 0 = activo, 1 = inactivo
);

CREATE TABLE orders (
	id SERIAL PRIMARY KEY,
	branch_id INT NOT NULL REFERENCES branches (id),
	curstomer_id INT NOT NULL REFERENCES customers (id),
	order_date TIMESTAMP NOT NULL,
	shipping_method_id INT NOT NULL REFERENCES shipping_methods (id),
	city_id INT NOT NULL REFERENCES cities (id),
	shipping_address1 VARCHAR(255) NOT NULL,
	shipping_address2 VARCHAR(255),
	order_instructions VARCHAR(255) NOT NULL,
	guest_email VARCHAR(60),
	discount_id INT REFERENCES discounts (id)
);

CREATE TABLE order_items (
	id SERIAL,
	order_id INT NOT NULL,
	product_id INT NOT NULL,
	qty SMALLINT NOT NULL,
	tax_amount NUMERIC(12, 2) NOT NULL DEFAULT 0.00,
	unit_price NUMERIC(12, 2) NOT NULL,
	subtotal NUMERIC (12, 2) NOT NULL DEFAULT 0.00,
	total NUMERIC (12, 2) NOT NULL DEFAULT 0.00,
	PRIMARY KEY (id, order_id),
	FOREIGN KEY (order_id) REFERENCES orders (id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (product_id) REFERENCES products (id)
	ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE shipping_trackings(
	id SERIAL,
	order_id INT NOT NULL REFERENCES orders (id),
	tracking_name VARCHAR(40) NOT NULL,
	tracking_description VARCHAR(255) NOT NULL,
	tracking_datetime TIMESTAMP NOT NULL,
	PRIMARY KEY (id, order_id)
);