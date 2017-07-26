CREATE TABLE `users` (
 `users_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `users_login` varchar(30) NOT NULL,
 `users_password` varchar(32) NOT NULL,
 `users_hash` varchar(32) NOT NULL,
 PRIMARY KEY (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8