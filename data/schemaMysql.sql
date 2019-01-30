CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `img` varchar(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=4 ;

INSERT INTO `products` (`id`, `name`, `description`, `img`) VALUES
(1, 'iphone', 'celular caro', null),
(2, 'tomate', 'vermelhinho', null),
(3, 'ipod', 'ja foi util', null);
