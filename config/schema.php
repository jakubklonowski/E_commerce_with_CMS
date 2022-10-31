<?php
    $create[] = "CREATE TABLE IF NOT EXISTS `users` (
                `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
                `Email` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL DEFAULT '',
                `Password` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL DEFAULT '',
                `Name` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
                `Admin` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `Active` tinyint(1) unsigned NOT NULL DEFAULT 0,
                PRIMARY KEY (`ID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci COMMENT='Table for registered clients data';";

    $create[] .= "CREATE TABLE IF NOT EXISTS `products` (
                `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'ID number',
                `Price` double NOT NULL DEFAULT 1,
                `Name` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
                `DescriptionShort` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
                `DescriptionLong` varchar(800) COLLATE utf8mb4_polish_ci DEFAULT NULL,
                `Cover` varchar(500) COLLATE utf8mb4_polish_ci DEFAULT NULL COMMENT 'link to cover image',
                `Category` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
                `Recommended` tinyint(1) unsigned NOT NULL DEFAULT 0,
                PRIMARY KEY (`ID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci COMMENT='Model kits etc sold by e-shop';";

    $create[] .= "CREATE TABLE IF NOT EXISTS `orders` (
                `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
                `ID_client` int(3) unsigned NOT NULL,
                `Date` timestamp NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY (`ID`),
                KEY `ID_client` (`ID_client`),
                CONSTRAINT `ID_client` FOREIGN KEY (`ID_client`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci COMMENT='List of orders';";

    $create[] .= "CREATE TABLE IF NOT EXISTS `orders_positions` (
                `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
                `ID_order` int(3) unsigned NOT NULL,
                `ID_product` int(3) unsigned NOT NULL,
                `Quantity` int(3) unsigned NOT NULL DEFAULT 0,
                PRIMARY KEY (`ID`),
                KEY `ID_order` (`ID_order`),
                KEY `ID_product` (`ID_product`),
                CONSTRAINT `ID_order` FOREIGN KEY (`ID_order`) REFERENCES `orders` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                CONSTRAINT `ID_product` FOREIGN KEY (`ID_product`) REFERENCES `products` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci COMMENT='Order positions by order';";

    $create[] .= "COMMIT;";
?>