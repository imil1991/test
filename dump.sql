CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `email` varchar(127) NOT NULL,
  `ip` int(11) NOT NULL,
  `phone` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_clients_id_fk` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_products_products_id_fk` (`product_id`),
  KEY `order_products_orders_id_fk` (`order_id`),
  CONSTRAINT `order_products_orders_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_products_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SELECT o.id, op.product_id, count(op.product_id) as prod_cnt FROM orders o, order_products op
WHERE op.order_id = o.id AND o.id = 1 GROUP BY op.product_id;

SELECT o.id order_id, o.created, count(op.product_id) prod_cnt, avg(p.price) avg_product_price
FROM orders o, order_products op, products p
WHERE o.id = op.order_id AND op.product_id = p.id
GROUP BY o.id HAVING prod_cnt > 1 ORDER BY created LIMIT 10;