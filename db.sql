CREATE  database airticket;

use airticket;

CREATE TABLE `airports` (
                            `id` bigint NOT NULL AUTO_INCREMENT,
                            `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
                            `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
                            `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO airticket.airports VALUES
                                   (1, 'Boryspil', 'KBP', CURRENT_TIMESTAMP),
                                   (2, 'Viena', 'VIE', CURRENT_TIMESTAMP),
                                   (3, 'Warsaw', 'WCP', CURRENT_TIMESTAMP);

CREATE TABLE `transporter` (
                            `id` bigint NOT NULL AUTO_INCREMENT,
                            `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
                            `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
                            `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO airticket.transporter VALUES
                                   (1, 'Wizzair', 'W6', CURRENT_TIMESTAMP),
                                   (2, 'UkraineInternational', 'PS', CURRENT_TIMESTAMP),
                                   (3, 'LOT', 'LT', CURRENT_TIMESTAMP);

CREATE TABLE `flight` (
                               `id` bigint NOT NULL AUTO_INCREMENT,
                               `transporter_id` bigint NOT NULL,
                               `origin` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
                               `destination` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
                               `departure_date` date NOT NULL,
                               `departure_time` datetime NOT NULL,
                               `arrival_time` datetime NOT NULL,
                               `flight_number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,

                               PRIMARY KEY (`id`),
                               KEY `flight_FK` (`transporter_id`),
                               CONSTRAINT `flight_FK` FOREIGN KEY (`transporter_id`) REFERENCES `transporter` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO airticket.flight VALUES
                                      (1, 1, 'KBP', 'VIE', '2023-11-23' , '2023-11-23 11:12:44', '2023-11-24 23:15:59' , 'number123'),
                                      (2, 1, 'KBP', 'WCP', '2023-11-23' , '2023-11-23 01:12:44', '2023-11-23 09:15:59' , 'number21'),
                                      (3, 2, 'KBP', 'VIE', '2023-11-22' , '2023-11-22 11:12:44', '2023-11-23 23:15:59' , 'number32'),
                                      (4, 2, 'KBP', 'WCP', '2023-11-23' , '2023-11-23 11:12:44', '2023-11-24 23:15:59' , 'number42'),
                                      (5, 3, 'KBP', 'VIE', '2023-11-21' , '2023-11-21 11:12:44', '2023-11-24 23:15:59' , 'number53'),
                                      (6, 3, 'KBP', 'VIE', '2023-11-23' , '2023-11-23 11:12:44', '2023-11-24 23:15:59' , 'number63'),
                                      (7, 3, 'KBP', 'VIE', '2023-11-23' , '2023-11-23 11:12:44', '2023-11-24 23:15:59' , 'number73');
