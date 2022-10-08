


CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_category` varchar(255) DEFAULT 'none',
  `product_type` varchar(255) DEFAULT 'none',
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL, /* 9999.99 */
  `product_special_offer` integer(2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'not paid',
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `order_date` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100)  NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_Constraint` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`,
`product_type`, `product_image`, `product_price`, `product_special_offer`)
VALUES (NULL, 'Paste Primavera', 'Paste cu rosii, ardei si masline', 'none', 'none', 'f4.png', '35', '15');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`,
`product_type`, `product_image`, `product_price`, `product_special_offer`) 
VALUES (NULL, 'Classic Burger', 'Burger clasic american cu cheddar, ceapa si rosii', 'none', 'none', 'f2.png', '35', '5');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, 
`product_type`, `product_image`, `product_price`, `product_special_offer`)
VALUES (NULL, 'Chicken Pizza', 'Pizza cu pui, mozzarela si rosii', 'none', 'none', 'f1.png', '35', '15');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`,
`product_type`, `product_image`, `product_price`, `product_special_offer`) 
VALUES (NULL, 'Classic Fries', 'Cartofi prajiti cu sare', 'none', 'none', 'f5.png', '15', '5');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`,
`product_type`, `product_image`, `product_price`, `product_special_offer`) 
 VALUES (NULL, 'Pizza Quattro Stagioni', 'Mozzarella, sos de roșii, ciuperci, măsline, prosciutto cotto', 
'none', 'none', 'f6.png', '35', '0');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_type`, 
`product_image`, `product_price`, `product_special_offer`) VALUES (NULL, 'Diet Burger', 
'Burger cu piept de pui la gratar si legume', 'none', 'none', 'f8.png', '45', '25');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_type`, 
`product_image`, `product_price`, `product_special_offer`) VALUES (NULL, 'Paste Milaneze', 
'Sos de Rosii, sunca, ciuperci, cascaval, usturoi, sare, piper, busuioc', 'none', 'none', 'f9.png', '45', '25');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_type`, 
`product_image`, `product_price`, `product_special_offer`) VALUES (NULL, 'Cheese Checken Burger', 
'Un burger cu carne de pui, branza, salata, rosii', 'none', 'none', 'f7.png', '35.00', '3');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_type`, 
`product_image`, `product_price`, `product_special_offer`) VALUES (NULL, 'Orange Chicken', 
'Pui cu sos orange, ulei de susan, seminte de susan', 'none', 'none', 'f10.png', '45.00', '0');

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_type`, `product_image`, 
`product_price`, `product_special_offer`) VALUES (NULL, 'Pizza Primavera', 'Sos de rosii, mozzarele, ardei in trei culori, busuioc prospat', 
'none', 'none', 'f3.png', '35.00', '0');