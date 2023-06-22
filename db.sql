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
