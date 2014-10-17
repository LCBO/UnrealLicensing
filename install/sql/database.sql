CREATE TABLE IF NOT EXISTS `licenseinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) NOT NULL,
  `domain` text NOT NULL,
  `product` text NOT NULL,
  `licensekey` text NOT NULL,
  `status` text NOT NULL,
  `expiry_date` date NOT NULL,
  `comments` text NOT NULL,
  `notification_days` int(11) NOT NULL,
  `customer_email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26;
INSERT INTO `licenseinfo` (`id`, `usrid`, `domain`, `product`, `licensekey`, `status`, `expiry_date`, `comments`, `notification_days`, `customer_email`) VALUES (21, 1, '127.0.0.1', 'Teste', '8D1488E2-5C46-090-7DDE-9B7E65D5E5F8', 'ACTIVE', '2014-04-14', '', 0, 'teste@test.com');
CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(256) DEFAULT NULL,
  `product_fullname` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `recurring_frequency` text NOT NULL,
  `product_currency` text NOT NULL,
  `paypalemail` text NOT NULL,
  `product_paypal` text NOT NULL,
  `dateadded` date NOT NULL,
  `sandbox` int(11) NOT NULL,
  `downloadlink` text,
  `trial_period` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9;
INSERT INTO `products` (`productid`, `product_code`, `product_fullname`, `product_price`, `recurring_frequency`, `product_currency`, `paypalemail`, `product_paypal`, `dateadded`, `sandbox`, `downloadlink`, `trial_period`, `created_by`) VALUES(8, '', 'Teste', '50.00', 'NEVR', 'BRL`', 'jhollsantos@gmail.com', '1', '2014-03-06', 1, '', 30, 1);
CREATE TABLE IF NOT EXISTS `settings` (
  `version` int(11) NOT NULL,
  `installation_date` date NOT NULL,
  `pagi_limit` int(11) NOT NULL,
  `pagi_type` text NOT NULL,
  `enable_notifactions` text NOT NULL,
  `log_license_requests` text NOT NULL,
  `log_email` text NOT NULL,
  `auto_setup` text NOT NULL,
  `email_from` text NOT NULL,
  `display_chart` text NOT NULL,
  `dashboard_chart_query` text NOT NULL,
  `cron_job_runtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`version`, `installation_date`, `pagi_limit`, `pagi_type`, `enable_notifactions`, `log_license_requests`, `log_email`, `auto_setup`, `email_from`, `display_chart`, `dashboard_chart_query`, `cron_job_runtime`) VALUES(2, '2014-02-28', 7, 'link', 'TRUE', 'TRUE', 'TRUE', 'FALSE', 'demo@demo.com', 'FALSE', 'select domain,count(domain) from `licenselog` where result = "License Valid" group by domain', '2014-02-28 00:00:00');
CREATE TABLE IF NOT EXISTS `users` (
  `usrid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `last_login` date NOT NULL,
  `last_login_ip` text NOT NULL,
  `role` int(11) DEFAULT '1',
  `license_expiration_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`usrid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;
