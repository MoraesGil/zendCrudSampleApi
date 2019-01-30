CREATE TABLE products (id INTEGER PRIMARY KEY AUTOINCREMENT, name varchar(50) NOT NULL, description varchar(100) NOT NULL, img varchar(255) NULL);

-- INSERT INTO products (id, name, description, img) VALUES  (1, 'iphone', 'celular caro', null);
-- INSERT INTO products (id, name, description, img) VALUES  (2, 'tomate', 'vermelhinho', null);
-- INSERT INTO products (id, name, description, img) VALUES  (3, 'ipod', 'ja foi util', null);


INSERT INTO products (id, name, description) VALUES  (1, 'iphone', 'celular caro');
INSERT INTO products (id, name, description) VALUES  (2, 'tomate', 'vermelhinho');
INSERT INTO products (id, name, description) VALUES  (3, 'ipod', 'ja foi util');
