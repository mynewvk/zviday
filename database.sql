-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 23 2014 г., 23:15
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bf_activities`
--

CREATE TABLE IF NOT EXISTS `bf_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `bf_activities`
--

INSERT INTO `bf_activities` (`activity_id`, `user_id`, `activity`, `module`, `created_on`, `deleted`) VALUES
(1, 1, 'logged in from: 127.0.0.1', 'users', '2014-01-15 18:08:21', 0),
(2, 1, 'logged in from: 127.0.0.1', 'users', '2014-01-16 21:10:54', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bf_countries`
--

CREATE TABLE IF NOT EXISTS `bf_countries` (
  `iso` char(2) NOT NULL DEFAULT 'US',
  `name` varchar(80) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bf_countries`
--

INSERT INTO `bf_countries` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES
('AD', 'ANDORRA', 'Andorra', 'AND', 20),
('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
('AL', 'ALBANIA', 'Albania', 'ALB', 8),
('AM', 'ARMENIA', 'Armenia', 'ARM', 51),
('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
('AO', 'ANGOLA', 'Angola', 'AGO', 24),
('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
('AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
('AT', 'AUSTRIA', 'Austria', 'AUT', 40),
('AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
('AW', 'ARUBA', 'Aruba', 'ABW', 533),
('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
('BB', 'BARBADOS', 'Barbados', 'BRB', 52),
('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
('BE', 'BELGIUM', 'Belgium', 'BEL', 56),
('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
('BI', 'BURUNDI', 'Burundi', 'BDI', 108),
('BJ', 'BENIN', 'Benin', 'BEN', 204),
('BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
('BR', 'BRAZIL', 'Brazil', 'BRA', 76),
('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
('BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
('BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
('BY', 'BELARUS', 'Belarus', 'BLR', 112),
('BZ', 'BELIZE', 'Belize', 'BLZ', 84),
('CA', 'CANADA', 'Canada', 'CAN', 124),
('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
('CG', 'CONGO', 'Congo', 'COG', 178),
('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
('CL', 'CHILE', 'Chile', 'CHL', 152),
('CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
('CN', 'CHINA', 'China', 'CHN', 156),
('CO', 'COLOMBIA', 'Colombia', 'COL', 170),
('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
('CU', 'CUBA', 'Cuba', 'CUB', 192),
('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
('CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
('DE', 'GERMANY', 'Germany', 'DEU', 276),
('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
('DK', 'DENMARK', 'Denmark', 'DNK', 208),
('DM', 'DOMINICA', 'Dominica', 'DMA', 212),
('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
('DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
('EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
('EE', 'ESTONIA', 'Estonia', 'EST', 233),
('EG', 'EGYPT', 'Egypt', 'EGY', 818),
('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
('ER', 'ERITREA', 'Eritrea', 'ERI', 232),
('ES', 'SPAIN', 'Spain', 'ESP', 724),
('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
('FI', 'FINLAND', 'Finland', 'FIN', 246),
('FJ', 'FIJI', 'Fiji', 'FJI', 242),
('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
('FR', 'FRANCE', 'France', 'FRA', 250),
('GA', 'GABON', 'Gabon', 'GAB', 266),
('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
('GD', 'GRENADA', 'Grenada', 'GRD', 308),
('GE', 'GEORGIA', 'Georgia', 'GEO', 268),
('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
('GH', 'GHANA', 'Ghana', 'GHA', 288),
('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
('GL', 'GREENLAND', 'Greenland', 'GRL', 304),
('GM', 'GAMBIA', 'Gambia', 'GMB', 270),
('GN', 'GUINEA', 'Guinea', 'GIN', 324),
('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
('GR', 'GREECE', 'Greece', 'GRC', 300),
('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
('GU', 'GUAM', 'Guam', 'GUM', 316),
('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
('GY', 'GUYANA', 'Guyana', 'GUY', 328),
('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
('HN', 'HONDURAS', 'Honduras', 'HND', 340),
('HR', 'CROATIA', 'Croatia', 'HRV', 191),
('HT', 'HAITI', 'Haiti', 'HTI', 332),
('HU', 'HUNGARY', 'Hungary', 'HUN', 348),
('ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
('IE', 'IRELAND', 'Ireland', 'IRL', 372),
('IL', 'ISRAEL', 'Israel', 'ISR', 376),
('IN', 'INDIA', 'India', 'IND', 356),
('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
('IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
('IS', 'ICELAND', 'Iceland', 'ISL', 352),
('IT', 'ITALY', 'Italy', 'ITA', 380),
('JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
('JO', 'JORDAN', 'Jordan', 'JOR', 400),
('JP', 'JAPAN', 'Japan', 'JPN', 392),
('KE', 'KENYA', 'Kenya', 'KEN', 404),
('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
('KM', 'COMOROS', 'Comoros', 'COM', 174),
('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408),
('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
('KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
('LB', 'LEBANON', 'Lebanon', 'LBN', 422),
('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
('LR', 'LIBERIA', 'Liberia', 'LBR', 430),
('LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
('LV', 'LATVIA', 'Latvia', 'LVA', 428),
('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
('MA', 'MOROCCO', 'Morocco', 'MAR', 504),
('MC', 'MONACO', 'Monaco', 'MCO', 492),
('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
('ML', 'MALI', 'Mali', 'MLI', 466),
('MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
('MO', 'MACAO', 'Macao', 'MAC', 446),
('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
('MT', 'MALTA', 'Malta', 'MLT', 470),
('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
('MV', 'MALDIVES', 'Maldives', 'MDV', 462),
('MW', 'MALAWI', 'Malawi', 'MWI', 454),
('MX', 'MEXICO', 'Mexico', 'MEX', 484),
('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
('NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
('NE', 'NIGER', 'Niger', 'NER', 562),
('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
('NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
('NO', 'NORWAY', 'Norway', 'NOR', 578),
('NP', 'NEPAL', 'Nepal', 'NPL', 524),
('NR', 'NAURU', 'Nauru', 'NRU', 520),
('NU', 'NIUE', 'Niue', 'NIU', 570),
('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
('OM', 'OMAN', 'Oman', 'OMN', 512),
('PA', 'PANAMA', 'Panama', 'PAN', 591),
('PE', 'PERU', 'Peru', 'PER', 604),
('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
('PL', 'POLAND', 'Poland', 'POL', 616),
('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
('PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
('PW', 'PALAU', 'Palau', 'PLW', 585),
('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
('QA', 'QATAR', 'Qatar', 'QAT', 634),
('RE', 'REUNION', 'Reunion', 'REU', 638),
('RO', 'ROMANIA', 'Romania', 'ROM', 642),
('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
('RW', 'RWANDA', 'Rwanda', 'RWA', 646),
('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
('SD', 'SUDAN', 'Sudan', 'SDN', 736),
('SE', 'SWEDEN', 'Sweden', 'SWE', 752),
('SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
('SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
('SN', 'SENEGAL', 'Senegal', 'SEN', 686),
('SO', 'SOMALIA', 'Somalia', 'SOM', 706),
('SR', 'SURINAME', 'Suriname', 'SUR', 740),
('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
('TD', 'CHAD', 'Chad', 'TCD', 148),
('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
('TG', 'TOGO', 'Togo', 'TGO', 768),
('TH', 'THAILAND', 'Thailand', 'THA', 764),
('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
('TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
('TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
('TO', 'TONGA', 'Tonga', 'TON', 776),
('TR', 'TURKEY', 'Turkey', 'TUR', 792),
('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
('TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
('UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
('UG', 'UGANDA', 'Uganda', 'UGA', 800),
('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
('US', 'UNITED STATES', 'United States', 'USA', 840),
('UY', 'URUGUAY', 'Uruguay', 'URY', 858),
('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
('VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
('WS', 'SAMOA', 'Samoa', 'WSM', 882),
('YE', 'YEMEN', 'Yemen', 'YEM', 887),
('YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Структура таблицы `bf_email_queue`
--

CREATE TABLE IF NOT EXISTS `bf_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `bf_login_attempts`
--

CREATE TABLE IF NOT EXISTS `bf_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `bf_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Дамп данных таблицы `bf_permissions`
--

INSERT INTO `bf_permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(2, 'Site.Content.View', 'Allow users to view the Content Context', 'active'),
(3, 'Site.Reports.View', 'Allow users to view the Reports Context', 'active'),
(4, 'Site.Settings.View', 'Allow users to view the Settings Context', 'active'),
(5, 'Site.Developer.View', 'Allow users to view the Developer Context', 'active'),
(6, 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active'),
(7, 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active'),
(8, 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active'),
(9, 'Bonfire.Users.Add', 'Allow users to add new Users', 'active'),
(10, 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active'),
(11, 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active'),
(12, 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active'),
(13, 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active'),
(14, 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active'),
(15, 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active'),
(16, 'Bonfire.Permissions.View', 'Allow access to view the Permissions menu unders Settings Context', 'active'),
(17, 'Bonfire.Permissions.Manage', 'Allow access to manage the Permissions in the system', 'active'),
(18, 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active'),
(19, 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active'),
(20, 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active'),
(21, 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(22, 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active'),
(24, 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active'),
(25, 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active'),
(27, 'Activities.Own.View', 'To view the users own activity logs', 'active'),
(28, 'Activities.Own.Delete', 'To delete the users own activity logs', 'active'),
(29, 'Activities.User.View', 'To view the user activity logs', 'active'),
(30, 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active'),
(31, 'Activities.Module.View', 'To view the module activity logs', 'active'),
(32, 'Activities.Module.Delete', 'To delete the module activity logs', 'active'),
(33, 'Activities.Date.View', 'To view the users own activity logs', 'active'),
(34, 'Activities.Date.Delete', 'To delete the dated activity logs', 'active'),
(35, 'Bonfire.UI.Manage', 'Manage the Bonfire UI settings', 'active'),
(36, 'Bonfire.Settings.View', 'To view the site settings page.', 'active'),
(37, 'Bonfire.Settings.Manage', 'To manage the site settings.', 'active'),
(38, 'Bonfire.Activities.View', 'To view the Activities menu.', 'active'),
(39, 'Bonfire.Database.View', 'To view the Database menu.', 'active'),
(40, 'Bonfire.Migrations.View', 'To view the Migrations menu.', 'active'),
(41, 'Bonfire.Builder.View', 'To view the Modulebuilder menu.', 'active'),
(42, 'Bonfire.Roles.View', 'To view the Roles menu.', 'active'),
(43, 'Bonfire.Sysinfo.View', 'To view the System Information page.', 'active'),
(44, 'Bonfire.Translate.Manage', 'To manage the Language Translation.', 'active'),
(45, 'Bonfire.Translate.View', 'To view the Language Translate menu.', 'active'),
(46, 'Bonfire.UI.View', 'To view the UI/Keyboard Shortcut menu.', 'active'),
(49, 'Bonfire.Profiler.View', 'To view the Console Profiler Bar.', 'active'),
(50, 'Bonfire.Roles.Add', 'To add New Roles', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `bf_roles`
--

CREATE TABLE IF NOT EXISTS `bf_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `default_context` varchar(255) NOT NULL DEFAULT 'content',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `bf_roles`
--

INSERT INTO `bf_roles` (`role_id`, `role_name`, `description`, `default`, `can_delete`, `login_destination`, `deleted`, `default_context`) VALUES
(1, 'Administrator', 'Has full control over every aspect of the site.', 0, 0, '', 0, 'content'),
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, '', 0, 'content'),
(4, 'User', 'This is the default user with access to login.', 1, 0, '', 0, 'content'),
(6, 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', 0, 1, '', 0, 'content');

-- --------------------------------------------------------

--
-- Структура таблицы `bf_role_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bf_role_permissions`
--

INSERT INTO `bf_role_permissions` (`role_id`, `permission_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 24),
(1, 25),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 49),
(1, 50),
(2, 2),
(2, 3),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 49);

-- --------------------------------------------------------

--
-- Структура таблицы `bf_schema_version`
--

CREATE TABLE IF NOT EXISTS `bf_schema_version` (
  `type` varchar(40) NOT NULL,
  `version` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bf_schema_version`
--

INSERT INTO `bf_schema_version` (`type`, `version`) VALUES
('core', 37);

-- --------------------------------------------------------

--
-- Структура таблицы `bf_sessions`
--

CREATE TABLE IF NOT EXISTS `bf_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bf_settings`
--

CREATE TABLE IF NOT EXISTS `bf_settings` (
  `name` varchar(30) NOT NULL,
  `module` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bf_settings`
--

INSERT INTO `bf_settings` (`name`, `module`, `value`) VALUES
('auth.allow_name_change', 'core', '1'),
('auth.allow_register', 'core', '1'),
('auth.allow_remember', 'core', '1'),
('auth.do_login_redirect', 'core', '1'),
('auth.login_type', 'core', 'email'),
('auth.name_change_frequency', 'core', '1'),
('auth.name_change_limit', 'core', '1'),
('auth.password_force_mixed_case', 'core', '0'),
('auth.password_force_numbers', 'core', '0'),
('auth.password_force_symbols', 'core', '0'),
('auth.password_min_length', 'core', '8'),
('auth.password_show_labels', 'core', '0'),
('auth.remember_length', 'core', '1209600'),
('auth.user_activation_method', 'core', '0'),
('auth.use_extended_profile', 'core', '0'),
('auth.use_usernames', 'core', '1'),
('form_save', 'core.ui', 'ctrl+s/⌘+s'),
('goto_content', 'core.ui', 'alt+c'),
('mailpath', 'email', '/usr/sbin/sendmail'),
('mailtype', 'email', 'text'),
('password_iterations', 'users', '8'),
('protocol', 'email', 'mail'),
('sender_email', 'email', ''),
('site.languages', 'core', 'a:3:{i:0;s:7:"english";i:1;s:10:"portuguese";i:2;s:7:"persian";}'),
('site.list_limit', 'core', '25'),
('site.show_front_profiler', 'core', '1'),
('site.show_profiler', 'core', '1'),
('site.status', 'core', '1'),
('site.system_email', 'core', 'admin@mybonfire.com'),
('site.title', 'core', 'My Bonfire'),
('smtp_host', 'email', ''),
('smtp_pass', 'email', ''),
('smtp_port', 'email', ''),
('smtp_timeout', 'email', ''),
('smtp_user', 'email', ''),
('updates.bleeding_edge', 'core', '0'),
('updates.do_check', 'core', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `bf_states`
--

CREATE TABLE IF NOT EXISTS `bf_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `abbrev` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Дамп данных таблицы `bf_states`
--

INSERT INTO `bf_states` (`id`, `name`, `abbrev`) VALUES
(1, 'Alaska', 'AK'),
(2, 'Alabama', 'AL'),
(3, 'American Samoa', 'AS'),
(4, 'Arizona', 'AZ'),
(5, 'Arkansas', 'AR'),
(6, 'California', 'CA'),
(7, 'Colorado', 'CO'),
(8, 'Connecticut', 'CT'),
(9, 'Delaware', 'DE'),
(10, 'District of Columbia', 'DC'),
(11, 'Florida', 'FL'),
(12, 'Georgia', 'GA'),
(13, 'Guam', 'GU'),
(14, 'Hawaii', 'HI'),
(15, 'Idaho', 'ID'),
(16, 'Illinois', 'IL'),
(17, 'Indiana', 'IN'),
(18, 'Iowa', 'IA'),
(19, 'Kansas', 'KS'),
(20, 'Kentucky', 'KY'),
(21, 'Louisiana', 'LA'),
(22, 'Maine', 'ME'),
(23, 'Marshall Islands', 'MH'),
(24, 'Maryland', 'MD'),
(25, 'Massachusetts', 'MA'),
(26, 'Michigan', 'MI'),
(27, 'Minnesota', 'MN'),
(28, 'Mississippi', 'MS'),
(29, 'Missouri', 'MO'),
(30, 'Montana', 'MT'),
(31, 'Nebraska', 'NE'),
(32, 'Nevada', 'NV'),
(33, 'New Hampshire', 'NH'),
(34, 'New Jersey', 'NJ'),
(35, 'New Mexico', 'NM'),
(36, 'New York', 'NY'),
(37, 'North Carolina', 'NC'),
(38, 'North Dakota', 'ND'),
(39, 'Northern Mariana Islands', 'MP'),
(40, 'Ohio', 'OH'),
(41, 'Oklahoma', 'OK'),
(42, 'Oregon', 'OR'),
(43, 'Palau', 'PW'),
(44, 'Pennsylvania', 'PA'),
(45, 'Puerto Rico', 'PR'),
(46, 'Rhode Island', 'RI'),
(47, 'South Carolina', 'SC'),
(48, 'South Dakota', 'SD'),
(49, 'Tennessee', 'TN'),
(50, 'Texas', 'TX'),
(51, 'Utah', 'UT'),
(52, 'Vermont', 'VT'),
(53, 'Virgin Islands', 'VI'),
(54, 'Virginia', 'VA'),
(55, 'Washington', 'WA'),
(56, 'West Virginia', 'WV'),
(57, 'Wisconsin', 'WI'),
(58, 'Wyoming', 'WY'),
(59, 'Armed Forces Africa', 'AE'),
(60, 'Armed Forces Canada', 'AE'),
(61, 'Armed Forces Europe', 'AE'),
(62, 'Armed Forces Middle East', 'AE'),
(63, 'Armed Forces Pacific', 'AP');

-- --------------------------------------------------------

--
-- Структура таблицы `bf_users`
--

CREATE TABLE IF NOT EXISTS `bf_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` char(60) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `reset_by` int(10) DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_message` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT '',
  `display_name_changed` date DEFAULT NULL,
  `timezone` char(4) NOT NULL DEFAULT 'UM6',
  `language` varchar(20) NOT NULL DEFAULT 'english',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  `password_iterations` int(4) NOT NULL,
  `force_password_reset` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `bf_users`
--

INSERT INTO `bf_users` (`id`, `role_id`, `email`, `username`, `password_hash`, `reset_hash`, `last_login`, `last_ip`, `created_on`, `deleted`, `reset_by`, `banned`, `ban_message`, `display_name`, `display_name_changed`, `timezone`, `language`, `active`, `activate_hash`, `password_iterations`, `force_password_reset`) VALUES
(1, 1, 'admin@mybonfire.com', 'admin', '$2a$08$3vtb0kSy1Sw7COQctU.v1.KdxIaBIT29Uyr.McQgzRS4P/3mNEozu', NULL, '2014-01-16 21:10:54', '127.0.0.1', '2014-01-15 18:06:32', 0, NULL, 0, NULL, 'admin', NULL, 'UM6', 'english', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bf_user_cookies`
--

CREATE TABLE IF NOT EXISTS `bf_user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bf_user_meta`
--

CREATE TABLE IF NOT EXISTS `bf_user_meta` (
  `meta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ask_hash` varchar(80) NOT NULL,
  `to` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `is_new` int(2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `ask_hash`, `to`, `date`, `is_new`, `comment`) VALUES
(1, '08995af77b469b63ab142298f38eb4df', 22, '1395574128', 0, ':D'),
(2, '08995af77b469b63ab142298f38eb4df', 22, '1395574558', 0, 'бла бла бла'),
(3, '08995af77b469b63ab142298f38eb4df', 22, '1395574894', 0, 'юююю'),
(4, '08995af77b469b63ab142298f38eb4df', 22, '1395574956', 0, 'фывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфы'),
(5, '4f6d7bbaa215b49a8a63fc75e6f135a0', 22, '1395576012', 0, 'aaaaa'),
(6, '08995af77b469b63ab142298f38eb4df', 22, '2014-03-23T19:33:27+', 0, 'as dsa'),
(7, '08995af77b469b63ab142298f38eb4df', 22, '2014-03-23T19:35:57+', 0, 'фывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфывфывфывфыфы'),
(8, '08995af77b469b63ab142298f38eb4df', 22, '2014-03-23T20:04:12+', 0, 'іваіва'),
(9, '08995af77b469b63ab142298f38eb4df', 22, '2014-03-23T21:28:50+', 0, 'SSS'),
(10, '150d20063570d0c0228c58fa272c5255', 24, '2014-03-23T22:32:11+', 0, ':D'),
(11, 'accfe42b9682707013ac150132c2f597', 22, '2014-03-23T22:32:30+', 0, 'DDDD'),
(12, '7b7bc3b32491d0b8df9c52821a56e7db', 24, '2014-03-23T23:25:16+', 0, ':DDD'),
(13, '0de3b354f5ae88aec61ecfd70ec2af1e', 24, '2014-03-23T23:36:40+', 0, 'asd'),
(14, '0de3b354f5ae88aec61ecfd70ec2af1e', 24, '2014-03-23T23:39:10+02:00', 0, 'sda'),
(15, '0de3b354f5ae88aec61ecfd70ec2af1e', 24, '2014-03-24T10:49:53+02:00', 0, 'asd'),
(16, 'e97e0500682b227aa077a7808ae1e4a3', 22, '2014-03-24T22:40:30+02:00', 0, ':DDDDD'),
(17, '6725add06df043d5235a03548b0f8307', 22, '2014-03-24T22:47:21+02:00', 0, 'DSads'),
(18, '6725add06df043d5235a03548b0f8307', 22, '2014-03-24T23:02:57+02:00', 0, 'a dads'),
(19, 'a0fc8185cb196fcf047d4f4099039324', 22, '2014-03-25T12:57:18+02:00', 0, 'ДВ'),
(20, '6725add06df043d5235a03548b0f8307', 22, '2014-03-25T13:00:04+02:00', 0, 'ф фів'),
(21, '60a48fe0f8e138b3705551c26ae954b0', 22, '2014-03-25T20:43:34+02:00', 0, 'фів'),
(22, 'eaf01d6028c99e8f624cf3484db09d37', 22, '2014-03-25T22:50:37+02:00', 0, 'asdasd'),
(23, '60a48fe0f8e138b3705551c26ae954b0', 22, '2014-03-27T14:32:56+02:00', 0, ':DDDDDDD'),
(24, '10b14bbe8ee188edc79f39b74f7980e1', 24, '2014-04-03T21:52:47+03:00', 0, 'фів'),
(25, '10b14bbe8ee188edc79f39b74f7980e1', 24, '2014-04-03T22:24:51+03:00', 0, 'ів'),
(26, '10b14bbe8ee188edc79f39b74f7980e1', 24, '2014-04-04T14:38:20+03:00', 0, ':DD'),
(27, '10b14bbe8ee188edc79f39b74f7980e1', 24, '2014-04-04T14:39:14+03:00', 0, 'a dasd'),
(28, '92fa51d788a543138ceecc1e0738298e', 22, '2014-04-05T12:49:50+03:00', 0, ':DD'),
(73, '10b14bbe8ee188edc79f39b74f7980e1', 24, '2014-04-06T22:47:17+03:00', 0, 'as'),
(74, '94d7f73dbf04fcdd0000430c9207ef03', 24, '2014-04-09T20:20:30+03:00', 0, 'фів ві'),
(76, 'eb4befcaec561a3218f3c6c0af50120a', 25, '2014-04-09T22:51:05+03:00', 0, 'вфівфів'),
(77, '14497a58533e1c29456d91148d52c265', 24, '2014-06-09T11:23:58+03:00', 1, 'A'),
(78, 'd6091e7f85189e8c934866f96a2155ec', 22, '2014-06-09T11:24:16+03:00', 0, 'ASDASD'),
(79, '36c3e9362d7b177609b2216861ec816b', 23, '2014-06-10T13:11:59+03:00', 0, 'ы');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `new` tinyint(1) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `message`, `date`, `new`, `ip`) VALUES
(1, 'mukachev0@mail.ru', 'Хочу заказати рекламу', '2014-06-12 10:13:51', 1, '127.0.0.1'),
(2, 'mukachev0@mail.ru', 'Хочу заказати рекламу', '2014-06-12 10:15:12', 1, '127.0.0.1'),
(3, 'mukachev0@mail.ru', 'Хочу заказати рекламу', '2014-06-12 10:15:27', 1, '127.0.0.1'),
(4, 'mukachev0@mail.ru', 'ыфвфывфывфыв', '2014-06-12 21:00:36', 1, '127.0.0.1'),
(7, 'bycrik@gmail.com', 'asdasdddddddddd', '2014-06-17 18:53:23', 1, '127.0.0.1'),
(8, '', '', '2014-06-17 18:58:31', 1, '127.0.0.1'),
(9, '', '', '2014-06-17 18:59:23', 1, '127.0.0.1'),
(10, '', '', '2014-06-17 18:59:29', 1, '127.0.0.1'),
(11, '', '', '2014-06-17 19:00:03', 1, '127.0.0.1'),
(12, '', '', '2014-06-17 19:00:22', 1, '127.0.0.1'),
(13, 'mukachev0@mail.ru', 'afsdfsdfsdfsdfsdf', '2014-06-17 19:25:23', 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who` int(10) NOT NULL,
  `by` int(10) NOT NULL,
  `date` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Дамп данных таблицы `follow`
--

INSERT INTO `follow` (`id`, `who`, `by`, `date`) VALUES
(16, 17, 11, 1390075638),
(17, 17, 13, 1390078681),
(18, 17, 16, 1390080316),
(23, 11, 15, 1390690172),
(27, 11, 17, 1390939250),
(28, 11, 16, 1390939300),
(30, 16, 11, 1391798056),
(31, 19, 11, 1391845120),
(52, 23, 22, 1395840995),
(57, 23, 25, 1396709805),
(68, 24, 22, 1401031075),
(69, 24, 25, 1401033410),
(70, 26, 22, 1401285421),
(78, 29, 22, 1402953083),
(79, 30, 22, 1402953731),
(85, 31, 22, 1403036076),
(88, 30, 31, 1403209862),
(89, 22, 31, 1403767935),
(90, 22, 23, 1403767977);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Структура таблицы `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_time` varchar(30) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `age` int(5) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `photo_small` varchar(200) NOT NULL,
  `vk_id` int(10) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `login`, `email`, `first_name`, `last_name`, `password`, `last_time`, `status`, `sex`, `city`, `country`, `age`, `photo`, `photo_small`, `vk_id`, `token`) VALUES
(1, 'mynewvk', 'mukachev0@mail.ru', 'Kolya', 'lukin', '38c62149cb56ee8f4f8b614d648f5802d480324f', NULL, NULL, 1, 'mukachevo', 'ukraine', 1997, NULL, '', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `is_new` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_whom` int(10) DEFAULT NULL,
  `ip` varchar(20) NOT NULL,
  `to` int(10) NOT NULL,
  `date_answer` varchar(50) DEFAULT NULL,
  `hash` varchar(100) NOT NULL,
  `from_know` int(2) DEFAULT NULL,
  `public` int(2) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `photo_small` varchar(200) DEFAULT NULL,
  `comments_count` int(5) DEFAULT NULL,
  `question_day` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1895 ;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `is_new`, `date`, `from_whom`, `ip`, `to`, `date_answer`, `hash`, `from_know`, `public`, `photo`, `photo_small`, `comments_count`, `question_day`) VALUES
(1455, 'some question number 16', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '5a73041f726c2d7a4630b0e766c20bc8', NULL, NULL, NULL, NULL, NULL, NULL),
(1456, 'some question number 17', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'cacf8f6cbe4e8e30195059804d609645', NULL, NULL, NULL, NULL, NULL, NULL),
(1457, 'some question number 18', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'bb8ac6aeb5be6e896e2580a06512792c', NULL, NULL, NULL, NULL, NULL, NULL),
(1459, 'some question number 20', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '1d5c4aef8d5764b40062017ce6b316ca', NULL, NULL, NULL, NULL, NULL, NULL),
(1460, 'some question number 21', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '03bc66b8b5c3395f7fcb322463ab56c2', NULL, NULL, NULL, NULL, NULL, NULL),
(1461, 'some question number 22', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '58dd646f1917dca2aac7d4e87e78cc37', NULL, NULL, NULL, NULL, NULL, NULL),
(1462, 'some question number 23', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '0a379af3e9d5a530d46d33c335a4eae9', NULL, NULL, NULL, NULL, NULL, NULL),
(1463, 'some question number 24', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '158031a3d62d628893cf33e46ddb9476', NULL, NULL, NULL, NULL, NULL, NULL),
(1464, 'some question number 25', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '552b587504b3fa0145f6530c9a63e9e7', NULL, NULL, NULL, NULL, NULL, NULL),
(1465, 'some question number 26', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'ba2c67fdf411366de4e9004dd5909c59', NULL, NULL, NULL, NULL, NULL, NULL),
(1466, 'some question number 27', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '536c7ed85bd04f58adf259efe137a05f', NULL, NULL, NULL, NULL, NULL, NULL),
(1467, 'some question number 28', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '78b924bf7e99e0aca7eb0837bc2b7ad6', NULL, NULL, NULL, NULL, NULL, NULL),
(1468, 'some question number 29', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '27db86d73ad7a071d2f1ec448df6a27a', NULL, NULL, NULL, NULL, NULL, NULL),
(1469, 'some question number 30', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '840686c63279c44c8f9528374124909a', NULL, NULL, NULL, NULL, NULL, NULL),
(1470, 'some question number 31', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'f03d4376069103a51f3a1cfcb29e3dd7', NULL, NULL, NULL, NULL, NULL, NULL),
(1471, 'some question number 32', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'c236973d38f9894c7a641016e3425531', NULL, NULL, NULL, NULL, NULL, NULL),
(1472, 'some question number 33', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'c83dbd08c38de7808c79a9859cb230e7', NULL, NULL, NULL, NULL, NULL, NULL),
(1473, 'some question number 34', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'b8d60a5f801cdf282f678edf9fe6df39', NULL, NULL, NULL, NULL, NULL, NULL),
(1474, 'some question number 35', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '5c7f2c993a0d60b9cc397f0a738bb09c', NULL, NULL, NULL, NULL, NULL, NULL),
(1475, 'some question number 36', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '53a83c0339f7de8f2277c2b4f718b991', NULL, NULL, NULL, NULL, NULL, NULL),
(1476, 'some question number 37', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'c16c24fb6b6065c48d22fb749dc2707a', NULL, NULL, NULL, NULL, NULL, NULL),
(1477, 'some question number 38', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '84cab912a6d7c5e3bc4be6f43c389442', NULL, NULL, NULL, NULL, NULL, NULL),
(1478, 'some question number 39', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '39ad677359335e4bbf9c975ac5058a0a', NULL, NULL, NULL, NULL, NULL, NULL),
(1479, 'some question number 40', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '968ac38b1cd85ba8c2111fb5e40b7c1b', NULL, NULL, NULL, NULL, NULL, NULL),
(1480, 'some question number 41', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'eb79dc107e527254972d9fe04aa256ed', NULL, NULL, NULL, NULL, NULL, NULL),
(1481, 'some question number 42', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '9f4c0660b0013c0d9be4d1cf37cec6a5', NULL, NULL, NULL, NULL, NULL, NULL),
(1482, 'some question number 43', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'b5de87f0db988075c585db283bc047ce', NULL, NULL, NULL, NULL, NULL, NULL),
(1485, 'some question number 46', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'f15e6824f232544c9596df9b1bf09190', NULL, NULL, NULL, NULL, NULL, NULL),
(1486, 'some question number 47', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, 'aaca732c6256f2a392e6375f3c2cac18', NULL, NULL, NULL, NULL, NULL, NULL),
(1487, 'some question number 48', NULL, 1, '2014-02-22 10:07:01', NULL, '127.0.0.1', 22, NULL, '2174c731c439e1dc0e74f1e4734f0576', NULL, NULL, NULL, NULL, NULL, NULL),
(1488, '=)))', '=)', 0, '2014-02-22 12:04:37', 22, '127.0.0.1', 24, '2014-02-22T14:06:05+02:00', '607031d1e939c42a62f3ca8cb3f9e229', 1, NULL, NULL, NULL, NULL, NULL),
(1489, 'asd', '&gt;:DDD', 0, '2014-02-22 19:11:15', NULL, '127.0.0.1', 24, '2014-03-23T23:33:39+02:00', '0de3b354f5ae88aec61ecfd70ec2af1e', 0, NULL, NULL, NULL, NULL, NULL),
(1490, 'z', ':D', 0, '2014-02-22 19:17:36', NULL, '127.0.0.1', 24, '2014-04-03T21:07:20+03:00', '77d00b33cd7e73493b98009fee907576', 0, NULL, NULL, NULL, NULL, NULL),
(1491, '=)', 'asdasd', 0, '2014-02-22 19:18:42', NULL, '127.0.0.1', 24, '2014-04-03T21:08:02+03:00', '10b14bbe8ee188edc79f39b74f7980e1', 0, NULL, NULL, NULL, 25, NULL),
(1492, ':DD', 'asdasd', 0, '2014-02-22 19:18:54', NULL, '127.0.0.1', 24, '2014-04-03T21:07:59+03:00', '94d7f73dbf04fcdd0000430c9207ef03', 0, NULL, NULL, NULL, 1, NULL),
(1493, ':D', 'you can make it to the sunrise', 0, '2014-02-22 19:23:51', NULL, '127.0.0.1', 24, '2014-03-26T23:36:52+02:00', 'acbfa48fcd212670f868cedbd3ac7c95', 0, NULL, NULL, NULL, NULL, NULL),
(1494, 'sd', 'sa', 0, '2014-02-22 19:24:47', NULL, '127.0.0.1', 24, '2014-04-03T21:07:57+03:00', '5a269200f9c2fb60fef2e527a6707082', 0, NULL, NULL, NULL, NULL, NULL),
(1495, 'asd', 'ololo', 0, '2014-02-22 19:25:23', NULL, '127.0.0.1', 24, '2014-04-03T21:07:39+03:00', '85727f9d6e3574ae22e8786de1fa5afd', 0, NULL, NULL, NULL, NULL, NULL),
(1510, 'some question number 12', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'fd1f5947591aeb604f80734e84092a24', NULL, NULL, NULL, NULL, NULL, NULL),
(1511, 'some question number 13', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '6454afb88510323aaa0be4b64c5850c1', NULL, NULL, NULL, NULL, NULL, NULL),
(1512, 'some question number 14', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'dafd6423e5ce74829b5cd4130b737ad3', NULL, NULL, NULL, NULL, NULL, NULL),
(1513, 'some question number 15', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '07cdf3c4587a461bdc780b16a5fccd85', NULL, NULL, NULL, NULL, NULL, NULL),
(1514, 'some question number 16', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '73b431d5683e6c195cb848a44ff5879d', NULL, NULL, NULL, NULL, NULL, NULL),
(1515, 'some question number 17', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '102ba1598f0f05bfd6421f30dfd30430', NULL, NULL, NULL, NULL, NULL, NULL),
(1516, 'some question number 18', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '3dd76438573e9de7fd5b8efb9bc5aff9', NULL, NULL, NULL, NULL, NULL, NULL),
(1517, 'some question number 19', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '9edabc11338f6a9427f9bcbb4a6f4702', NULL, NULL, NULL, NULL, NULL, NULL),
(1518, 'some question number 20', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '1e144b27d3ad524c18bc41f4bc2c1c26', NULL, NULL, NULL, NULL, NULL, NULL),
(1519, 'some question number 21', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'c72a92bd6a44e94e67eef5fb250d48d5', NULL, NULL, NULL, NULL, NULL, NULL),
(1520, 'some question number 22', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'b6a7e89188a450da738470273690a978', NULL, NULL, NULL, NULL, NULL, NULL),
(1521, 'some question number 23', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '95e73bbb52186f19b3ecb7ad3956fd78', NULL, NULL, NULL, NULL, NULL, NULL),
(1522, 'some question number 24', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '3c3c3e392d6a1044201a26a371ed44b5', NULL, NULL, NULL, NULL, NULL, NULL),
(1523, 'some question number 25', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'e739fa0ba216e21195479765d9c5c479', NULL, NULL, NULL, NULL, NULL, NULL),
(1524, 'some question number 26', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '50165c7082ad2bacda6f5b47d4b73a6b', NULL, NULL, NULL, NULL, NULL, NULL),
(1525, 'some question number 27', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '53cf509f15fa10d2e1f4d57285599319', NULL, NULL, NULL, NULL, NULL, NULL),
(1526, 'some question number 28', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '3565f86b8c545f422cd093f94c6bdccc', NULL, NULL, NULL, NULL, NULL, NULL),
(1527, 'some question number 29', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'd78c85af7ec409edf54e23b9f1b2cdd3', NULL, NULL, NULL, NULL, NULL, NULL),
(1528, 'some question number 30', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, 'd94ffa89112d97d35504d06302d3cf9b', NULL, NULL, NULL, NULL, NULL, NULL),
(1529, 'some question number 31', NULL, 1, '2014-03-04 19:28:52', NULL, '127.0.0.1', 22, NULL, '6266330fd555c535299a12edd9c71f4a', NULL, NULL, NULL, NULL, NULL, NULL),
(1530, 'some question number 32', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-17T12:51:01+03:00', 'ce1ceb2deaa4cc64c14ec6b22a0a274c', NULL, NULL, NULL, NULL, NULL, NULL),
(1531, 'some question number 33', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-17T12:53:50+03:00', '7709d4d8cd41767e201d3aeedcfea512', NULL, NULL, NULL, NULL, NULL, NULL),
(1532, 'some question number 34', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-17T12:55:18+03:00', 'd3308917843079a2e3f2c56f410395dd', NULL, NULL, NULL, NULL, NULL, NULL),
(1533, 'some question number 35', '8-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-17T12:55:31+03:00', 'f7b7a978d73eb9be05e55635fe1b0889', NULL, NULL, NULL, NULL, NULL, NULL),
(1534, 'some question number 36', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-17T13:01:13+03:00', '1e101878a7b0ff16d85cfae00be6cad7', NULL, NULL, NULL, NULL, NULL, NULL),
(1597, 'some question number 99', 'фівфівфівфівфів', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-25T16:50:12+03:00', '724c26945a6db088b80c1afd4ee44a25', NULL, NULL, NULL, NULL, NULL, NULL),
(1598, 'some question number 100', 'www.google.com', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-25T16:50:33+03:00', 'c03c0e06b56c82856b4467afec53e92c', NULL, NULL, NULL, NULL, NULL, NULL),
(1599, 'some question number 101', '<a href="http://google.com" class="alert-link">http://google.com</a>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-25T16:50:52+03:00', 'c0ab2798e3c113e0b3ff5e827ee3174a', NULL, NULL, NULL, NULL, NULL, NULL),
(1605, 'some question number 107', '<i class="emoji emoji-0"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T15:35:56+03:00', 'df32d098a7e34883a88baed4bb593a01', NULL, NULL, NULL, NULL, NULL, NULL),
(1606, 'some question number 108', 'фівфівфів :like:', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T15:57:44+03:00', 'b44afe6770afbf412017f54a5807f510', NULL, NULL, NULL, NULL, NULL, NULL),
(1607, 'some question number 109', 'asdasdasd<i class="emoji emoji-26"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T15:58:18+03:00', '398a9caffc463f4ffc7d8350e1248052', NULL, NULL, NULL, NULL, NULL, NULL),
(1608, 'some question number 110', ':like:', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:02:07+03:00', 'f89ab175981b695615fc569c1db006ce', NULL, NULL, NULL, NULL, NULL, NULL),
(1609, 'some question number 111', ':like:', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:02:22+03:00', 'b4bef9fb5498e0d8938cb8daba42b2b3', NULL, NULL, NULL, NULL, NULL, NULL),
(1610, 'some question number 112', '<i class="emoji emoji-26"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:04:10+03:00', '0122f69afa1b7833d4c4593bf3211528', NULL, NULL, NULL, NULL, NULL, NULL),
(1611, 'some question number 113', '<i class="emoji emoji-26"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:50:09+03:00', 'a3596ae72f009e8dd931f8b5a615927a', NULL, NULL, NULL, NULL, NULL, NULL),
(1612, 'some question number 114', '<i class="emoji emoji-27"></i>&lt;3', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:52:54+03:00', '72e21169b750633d993971045c99ba39', NULL, NULL, NULL, NULL, NULL, NULL),
(1613, 'some question number 115', '<i class="emoji emoji-27"></i>&lt;3', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:53:17+03:00', 'a40762eb52ee4e2c13ab67ba83d11ec5', NULL, NULL, NULL, NULL, NULL, NULL),
(1614, 'some question number 116', '<i class="emoji emoji-27"></i>&lt;3', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:53:34+03:00', '7f38e211a4de1cd4e198d294669dbb6c', NULL, NULL, NULL, NULL, NULL, NULL),
(1615, 'some question number 117', '&lt;3', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:53:58+03:00', 'e298095742a320c9ca9586b4ba7f187a', NULL, NULL, NULL, NULL, NULL, NULL),
(1616, 'some question number 118', '&lt;3', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:54:40+03:00', '32a180bd8fc0b5f1a654aad6f4315360', NULL, NULL, NULL, NULL, NULL, NULL),
(1617, 'some question number 119', '<i class="emoji emoji-22"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T16:55:02+03:00', '62c21dbd684c11248d3927dd919ad416', NULL, NULL, NULL, NULL, NULL, NULL),
(1624, 'some question number 126', '<i class="emoji emoji-18"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T17:09:04+03:00', 'fdbb4fbb21449e28f5f731230ac3702e', NULL, NULL, NULL, NULL, NULL, NULL),
(1626, 'some question number 128', '<i class="emoji emoji-26"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-27T23:13:07+03:00', '5bccc536bb63b449f3b90cd094a7a9d6', NULL, NULL, NULL, NULL, NULL, NULL),
(1627, 'some question number 129', '<i class="emoji emoji-7"></i><i class="emoji emoji-7"></i><i class="emoji emoji-7"></i><i class="emoji emoji-7"></i><i class="emoji emoji-7"></i><i class="emoji emoji-7"></i><i class="emoji emoji-7"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T00:04:07+03:00', '403ce4894741c98f2d9bef0c3955d4f4', NULL, NULL, NULL, NULL, NULL, NULL),
(1628, 'some question number 130', '<i class="emoji emoji-26"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T08:37:08+03:00', '5e88a2b0d277455f990042ac42786ca9', NULL, NULL, NULL, NULL, NULL, NULL),
(1629, 'some question number 131', '<i class="emoji emoji-18"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T08:37:41+03:00', '77b6d2888b3e9902c807805b19de3b4b', NULL, NULL, NULL, NULL, NULL, NULL),
(1630, 'some question number 132', '<i class="emoji emoji-17"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T08:39:41+03:00', 'b70879a65ef31d6a469e38e129908680', NULL, NULL, NULL, NULL, NULL, NULL),
(1631, 'some question number 133', 'Hello <i class="emoji emoji-0"></i> this is my first answer, on zviday.net', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T08:40:44+03:00', 'b2505d753d6a23f01a82641e33b13b16', NULL, NULL, NULL, NULL, NULL, NULL),
(1632, 'some question number 134', '<i class="emoji emoji-0"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T08:57:58+03:00', 'bc7b4212a0a22ea480e5b1c276984ea0', NULL, NULL, '/media/answer_photo/64d65b1c10700a3ec8106c7d5a0be8e5.png', '/media/answer_photo/small/64d65b1c10700a3ec8106c7d5a0be8e5.png', NULL, NULL),
(1633, 'some question number 135', '<i class="emoji emoji-13"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T13:47:50+03:00', '03e07c03ac1e640c50564898b70e1e25', NULL, NULL, NULL, NULL, NULL, NULL),
(1634, 'some question number 136', 'asd', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T15:20:07+03:00', '51633df1e86697f61b4a51abd69cfee1', NULL, NULL, NULL, NULL, NULL, NULL),
(1637, 'some question number 139', '<i class="emoji emoji-0"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:40:21+03:00', 'd74f04f23bb7b4ad113f16801923befd', NULL, NULL, NULL, NULL, NULL, NULL),
(1639, 'some question number 141', '<i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i><i class="emoji emoji-9"></i><i class="emoji emoji-10"></i><i class="emoji emoji-11"></i><i class="emoji emoji-12"></i><i class="emoji emoji-13"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:44:36+03:00', '94f957e7f94011ba4ecff981436d2e04', NULL, NULL, NULL, NULL, NULL, NULL),
(1640, 'some question number 142', '', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T14:44:42+03:00', '488c771f509ad3f65a46104b92987de3', NULL, NULL, '/media/answer_photo/d0ce3f27c000f3e76503ba967bc8fc5f.jpg', '/media/answer_photo/small/d0ce3f27c000f3e76503ba967bc8fc5f.jpg', NULL, NULL),
(1641, 'some question number 143', '<i class="emoji emoji-7"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:42:17+03:00', '4f4168acaee4714bc52fdea1b81b2a83', NULL, NULL, NULL, NULL, NULL, NULL),
(1643, 'some question number 145', '<i class="emoji emoji-8"></i><i class="emoji emoji-9"></i><i class="emoji emoji-12"></i><i class="emoji emoji-11"></i><i class="emoji emoji-9"></i><i class="emoji emoji-9"></i><i class="emoji emoji-8"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:43:27+03:00', 'a04016919c0efac76367449cff275bd1', NULL, NULL, NULL, NULL, NULL, NULL),
(1644, 'some question number 146', '<i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i><i class="emoji emoji-9"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:43:47+03:00', '3bd537c3da6ded8841f9eacbd30b71f0', NULL, NULL, NULL, NULL, NULL, NULL),
(1645, 'some question number 147', '<i class="emoji emoji-0"></i><i class="emoji emoji-1"></i><i class="emoji emoji-2"></i><i class="emoji emoji-3"></i><i class="emoji emoji-3"></i><i class="emoji emoji-5"></i><i class="emoji emoji-5"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:44:49+03:00', '25568a3c8f2f8fc663c85dd78d7c0cbd', NULL, NULL, NULL, NULL, NULL, NULL),
(1647, 'some question number 149', '<i class="emoji emoji-0"></i><i class="emoji emoji-0"></i><i class="emoji emoji-0"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:51:32+03:00', '569f641263a58176b7d9da595e682691', NULL, NULL, NULL, NULL, NULL, NULL),
(1649, 'some question number 151', '<i class="emoji emoji-5"></i><i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i><i class="emoji emoji-9"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:54:38+03:00', '8f0103c1f440c4e79ea9416a269336ea', NULL, NULL, NULL, NULL, NULL, NULL),
(1650, 'some question number 152', '<i class="emoji emoji-4"></i><i class="emoji emoji-5"></i><i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i><i class="emoji emoji-9"></i><i class="emoji emoji-10"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:54:50+03:00', '85f75964848240d0fe27d7a5127b2575', NULL, NULL, NULL, NULL, NULL, NULL),
(1651, 'some question number 153', '<i class="emoji emoji-0"></i><i class="emoji emoji-1"></i><i class="emoji emoji-2"></i><i class="emoji emoji-3"></i><i class="emoji emoji-4"></i><i class="emoji emoji-5"></i><i class="emoji emoji-6"></i><i class="emoji emoji-7"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:55:22+03:00', 'dfb4e8e424bfed5f46b28712b30e9965', NULL, NULL, NULL, NULL, NULL, NULL),
(1655, 'some question number 157', '<i class="emoji emoji-1"></i><i class="emoji emoji-2"></i><i class="emoji emoji-3"></i><i class="emoji emoji-4"></i><i class="emoji emoji-5"></i><i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:57:39+03:00', '8c23f875de9e043256a91fddcecf4a48', NULL, NULL, NULL, NULL, NULL, NULL),
(1656, 'some question number 158', '<i class="emoji emoji-0"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T22:58:24+03:00', '07da3df028a55abc6c92c2747d0d75f4', NULL, NULL, NULL, NULL, NULL, NULL),
(1657, 'some question number 159', '<i class="emoji emoji-0"></i><i class="emoji emoji-0"></i><i class="emoji emoji-0"></i><i class="emoji emoji-5"></i><i class="emoji emoji-13"></i><i class="emoji emoji-9"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T23:30:31+03:00', 'f75bb2426d4757351979536c26a740ca', NULL, NULL, NULL, NULL, NULL, NULL),
(1659, 'some question number 161', '<i class="emoji emoji-7"></i><i class="emoji emoji-8"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T23:32:12+03:00', 'f2cdd6019e7793a4911d1d4c4b9978a0', NULL, NULL, NULL, NULL, NULL, NULL),
(1660, 'some question number 162', '<i class="emoji emoji-1"></i><i class="emoji emoji-2"></i><i class="emoji emoji-3"></i><i class="emoji emoji-4"></i><i class="emoji emoji-5"></i><i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T23:32:26+03:00', 'fae74ad1d555d17794c4bc008a8f96c2', NULL, NULL, NULL, NULL, NULL, NULL),
(1661, 'some question number 163', '<i class="emoji emoji-0"></i><i class="emoji emoji-5"></i><i class="emoji emoji-6"></i><i class="emoji emoji-7"></i><i class="emoji emoji-8"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T23:32:45+03:00', 'c5a3de5205ec946b15cd779309935680', NULL, NULL, NULL, NULL, NULL, NULL),
(1662, 'some question number 164', '<i class="emoji emoji-2"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T23:35:34+03:00', 'f1dfcab3395bc858f547bb1a24d13d07', NULL, NULL, NULL, NULL, NULL, NULL),
(1663, 'some question number 165', '<i class="emoji emoji-0"></i>', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-05-28T23:56:51+03:00', '15ce76afbd491a93c19bf4fc3463b7fe', NULL, NULL, NULL, NULL, NULL, NULL),
(1675, 'some question number 177', ':D', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-08T15:38:26+03:00', '8e545a456adf3cd6ddd2433d6646d869', NULL, NULL, NULL, NULL, NULL, NULL),
(1676, 'some question number 178', 'sdaads', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-08T15:40:59+03:00', '114b93dd0b7ab71941c9706fdda34ade', NULL, NULL, NULL, NULL, NULL, NULL),
(1677, 'some question number 179', ':-) :-) :-) :-) :-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-08T15:42:03+03:00', '5497b1a5ec7f0d36517318cc5d579578', NULL, NULL, NULL, NULL, NULL, NULL),
(1678, 'some question number 180', '8-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-08T15:47:39+03:00', '9415f9959e506e5fdadb0af9e884a58d', NULL, NULL, NULL, NULL, NULL, NULL),
(1679, 'some question number 181', 'DD:-D :-D :-D :-D', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-08T16:48:18+03:00', '6891dff893c8e100721a6ad312635d21', NULL, NULL, NULL, NULL, NULL, NULL),
(1680, 'some question number 182', 'dsda', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-08T17:03:31+03:00', 'd6091e7f85189e8c934866f96a2155ec', NULL, NULL, NULL, NULL, 1, NULL),
(1683, 'some question number 185', '}:)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T13:57:12+03:00', '5789a55b252ad55f3431abafc09f304e', NULL, NULL, NULL, NULL, NULL, NULL),
(1684, 'some question number 186', ':-) :-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T23:34:22+03:00', '3e447814b3b2137c17c6c810d77e4078', NULL, NULL, NULL, NULL, NULL, NULL),
(1685, 'some question number 187', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T23:38:20+03:00', '1b11a204def40ba9d6c318deca578e4b', NULL, NULL, NULL, NULL, NULL, NULL),
(1686, 'some question number 188', ':-D', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T23:41:03+03:00', '8d32bfd6cff2a44cac0e809ffbd52e55', NULL, NULL, NULL, NULL, NULL, NULL),
(1687, 'some question number 189', ':-D', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T23:42:05+03:00', '98f0201600f259fb65947e66068b85a8', NULL, NULL, NULL, NULL, NULL, NULL),
(1688, 'some question number 190', ':-D', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T23:42:36+03:00', 'b054af78cf53a03986288c9c3eb96717', NULL, NULL, NULL, NULL, NULL, NULL),
(1689, 'some question number 191', 'фыввы', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-09T23:43:24+03:00', 'bd0fe3c0637c6391f30c31806398d8a5', NULL, NULL, NULL, NULL, NULL, NULL),
(1701, 'some question number 203', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-13T00:04:46+03:00', '26946dabec0294095d1ddbf54fda8148', NULL, NULL, NULL, NULL, NULL, NULL),
(1703, 'some question number 205', 'asdasd', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-13T00:06:51+03:00', '08a955487182652b5d2bc6e2bf7095fa', NULL, NULL, NULL, NULL, NULL, NULL),
(1706, 'some question number 208', ':-)', 0, '2014-03-04 19:28:53', NULL, '127.0.0.1', 22, '2014-06-13T00:46:45+03:00', '2bf323b3325eeab32fe1a788a0199c3f', NULL, NULL, NULL, NULL, NULL, NULL),
(1720, 'ахаха', ':D', 0, '2014-03-05 19:21:37', NULL, '127.0.0.1', 24, '2014-03-05T21:22:23+02:00', '7f9c501a70b3675cf8717bc526fa270f', 0, NULL, NULL, NULL, NULL, NULL),
(1724, 'asd', 'ZZ', 0, '2014-03-08 19:33:15', 23, '127.0.0.1', 24, '2014-04-03T21:07:35+03:00', '15a5ebc7f3552cd7a4eaf41efc5bc7e4', 1, 0, NULL, NULL, NULL, NULL),
(1725, 'asd', 'lol', 0, '2014-03-08 19:33:30', 23, '127.0.0.1', 24, '2014-04-03T21:07:31+03:00', '23d95bc8b16653d327a232c52ef2c1a4', 1, 0, NULL, NULL, NULL, NULL),
(1726, 'asd', ':DDDDDDDDDDDd', 0, '2014-03-08 19:33:42', 23, '127.0.0.1', 24, '2014-04-03T21:07:26+03:00', '061ec386789ff7f0fb38dca1dae782a7', 1, 0, NULL, NULL, NULL, NULL),
(1728, ':D', 'азаза', 0, '2014-03-08 19:56:40', 23, '127.0.0.1', 24, '2014-03-08T21:56:57+02:00', '7b7bc3b32491d0b8df9c52821a56e7db', 1, 1, NULL, NULL, NULL, NULL),
(1731, ':DDD', ':DD', 0, '2014-03-09 17:18:55', 22, '127.0.0.1', 24, '2014-03-09T19:19:56+02:00', '150d20063570d0c0228c58fa272c5255', 1, 0, NULL, NULL, NULL, NULL),
(1741, 'фывфыв', 'saddas', 0, '2014-03-24 20:56:27', 22, '127.0.0.1', 24, '2014-03-24T22:56:49+02:00', 'bd6064fc38557b3e02b8addddbbbed72', 1, 1, NULL, NULL, NULL, NULL),
(1742, 'asdasdasdasd', 'asdasdasd', 0, '2014-03-24 20:58:14', 22, '127.0.0.1', 24, '2014-03-24T22:58:30+02:00', 'a252d0abf028da50e05c2e6f38918259', 1, 1, NULL, NULL, NULL, NULL),
(1746, ':DD', 'ad', 0, '2014-03-27 12:28:42', 22, '127.0.0.1', 24, '2014-03-27T14:29:42+02:00', '0df43fe2110ee3f76c3894f940342da5', 1, 0, '/media/answer_photo/e2f4356fd100cb6fb448a85f8d230a8f.jpg', '/media/answer_photo/small/e2f4356fd100cb6fb448a85f8d230a8f.jpg', NULL, NULL),
(1747, 'dasdasd', 'asdasdsad', 0, '2014-03-27 12:33:07', 22, '127.0.0.1', 24, '2014-03-27T14:33:19+02:00', 'aba2cd2de747a57d5c67ab8e587ca75f', 1, 0, NULL, NULL, NULL, NULL),
(1748, 'asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asda', ':-)', 0, '2014-04-01 18:02:08', 22, '127.0.0.1', 25, '2014-06-09T11:27:31+03:00', 'dfdf1723c14f13e3b0e8b594eb498cd1', 1, 0, NULL, NULL, NULL, NULL),
(1749, 'sdasdas', NULL, 1, '2014-04-01 18:02:42', 22, '127.0.0.1', 25, NULL, 'fb80c3318832ca6c84d68df4454ff1e1', 0, 0, NULL, NULL, NULL, NULL),
(1750, 'asdasd', NULL, 1, '2014-04-01 18:04:51', 22, '127.0.0.1', 25, NULL, 'a00ffabc5b54ed008005a83200be4501', 0, 1, NULL, NULL, NULL, NULL),
(1751, 'asdasd', NULL, 1, '2014-04-01 18:06:04', 22, '127.0.0.1', 25, NULL, 'bf1397f682d9ea12321b2a373ad3da2a', 0, 1, NULL, NULL, NULL, NULL),
(1752, 'adsasd', 'asdads', 0, '2014-04-01 18:06:08', 22, '127.0.0.1', 25, '2014-04-06T22:22:42+03:00', 'eb4befcaec561a3218f3c6c0af50120a', 1, 1, NULL, NULL, 1, NULL),
(1753, 'чясся', ':D', 0, '2014-04-01 18:39:31', 22, '127.0.0.1', 25, '2014-04-06T22:22:06+03:00', 'b5ba0548a8b869caa16ced962a563ee4', 1, 1, NULL, NULL, NULL, NULL),
(1754, '=)', '))', 0, '2014-04-03 17:53:08', 22, '127.0.0.1', 24, '2014-04-03T20:53:25+03:00', 'bbb2f7e6b0c71fff9ccdd19a498e35a3', 1, 1, NULL, NULL, NULL, NULL),
(1755, ':D', ':D DDDD', 0, '2014-04-06 13:50:53', 22, '127.0.0.1', 24, '2014-04-06T22:17:52+03:00', '9b4bc4ceb94dd7167c2592a862d56b20', 1, 0, NULL, NULL, NULL, NULL),
(1756, ':DDDD', '=))', 0, '2014-04-10 08:14:14', 22, '127.0.0.1', 23, '2014-04-10T11:14:34+03:00', 'c7939e051db5686e6f7dcef963854d7a', 1, 1, NULL, NULL, NULL, NULL),
(1757, 'фі', '<i class="emoji emoji-13"></i>(((', 0, '2014-04-10 08:50:25', 22, '127.0.0.1', 24, '2014-05-27T15:21:25+03:00', 'a415e9c77173a48c0cd1e8b52e7fc9f0', 1, 0, NULL, NULL, NULL, NULL),
(1758, 'фівфівфві', '<i class="emoji emoji-13"></i>', 0, '2014-04-10 08:51:43', 22, '127.0.0.1', 24, '2014-05-27T15:20:30+03:00', '0432cbef6ea4dff938a815d865b53db4', 1, 0, NULL, NULL, NULL, NULL),
(1759, 'вфі', 'фі вфі ввввввввввввввввв                 фів', 0, '2014-04-10 08:51:46', 22, '127.0.0.1', 24, '2014-05-26T23:01:42+03:00', 'a770012bebca2c7a2508cb0482d21e63', 1, 0, NULL, NULL, NULL, NULL),
(1760, 'фів', ':-)', 0, '2014-04-10 17:39:04', 22, '127.0.0.1', 23, '2014-06-03T13:37:53+03:00', '7afcfc8209f43e781bb29852243f0c10', 1, 1, NULL, NULL, NULL, NULL),
(1763, 'фыв', ':-)', 0, '2014-04-14 19:31:40', 22, '127.0.0.1', 23, '2014-06-04T12:47:48+03:00', '8bbe992ac66b14fa4efc31531c653b95', 1, 1, NULL, NULL, NULL, NULL),
(1765, ':D', ':D', 0, '2014-05-02 08:58:49', 22, '127.0.0.1', 24, '2014-05-25T18:17:25+03:00', '7a956cde1726f9054c973f592b467a3b', 1, 1, NULL, NULL, NULL, NULL),
(1766, 'vk.com/mynewvk', 'vk.com/mynewvk', 0, '2014-05-04 09:29:50', 22, '127.0.0.1', 23, '2014-05-04T12:30:12+03:00', 'dc9d07ad8a6230aad0539099ca980d62', 1, 1, NULL, NULL, NULL, NULL),
(1767, '<a href="http://vk.com/mynewvk">http://vk.com/mynewvk</a>', 'http://vk.com/mynewvk', 0, '2014-05-04 09:40:55', 23, '127.0.0.1', 22, '2014-05-04T12:42:49+03:00', '9a0eeb6ec2a0cd10dc1f94919a2aa90d', 1, 0, NULL, NULL, NULL, NULL),
(1768, 'vk.com/mdk', '<a href="http://vk.com/asdads">http://vk.com/asdads</a>', 0, '2014-05-04 09:41:37', 23, '127.0.0.1', 22, '2014-05-04T12:44:25+03:00', '2723d03703ae2ff0a82d693ea38d9563', 1, 1, NULL, NULL, NULL, NULL),
(1769, '<i class="emoji emoji-18"></i>', '<i class="emoji emoji-5"></i>', 0, '2014-05-28 17:08:44', 26, '127.0.0.1', 22, '2014-05-28T21:18:57+03:00', 'fcb694c4f3cee502722a7ff05e8a9ade', 1, 1, NULL, NULL, NULL, NULL),
(1770, ':-) :-) :-) :-) :-) :-) :-) :-) :-) :-) :-) :-) :-) :dislike: :dislike: :dislike: :dislike: :dislike: :X :X :X :X', ':-D', 0, '2014-06-02 19:26:57', 22, '127.0.0.1', 24, '2014-06-02T22:28:38+03:00', '534b251c806a4f21c9504f59ca5e70f9', 1, 0, NULL, NULL, NULL, NULL),
(1775, '3-)', NULL, 1, '2014-06-02 19:34:20', 22, '127.0.0.1', 24, NULL, '2766c2356a59064577315e578e240dc3', 0, 0, NULL, NULL, NULL, NULL),
(1776, ':-):-):-):-):-):-):-):-):-):-):dislike::dislike:&lt;3&gt;(O:):-p:_(:-p8-);-]3(', ':-) :-)', 0, '2014-06-02 22:44:55', 22, '127.0.0.1', 24, '2014-06-09T11:12:36+03:00', '14497a58533e1c29456d91148d52c265', 1, 0, NULL, NULL, 1, NULL),
(1777, ';-P;-P;-P;-P;-P;-P', NULL, 1, '2014-06-03 08:12:28', 22, '127.0.0.1', 24, NULL, '8a6c13677aa1013839544ba9ed6b6b91', 0, 0, NULL, NULL, NULL, NULL),
(1778, ':((:((:((:((:((:((:((:((:((', NULL, 1, '2014-06-03 09:54:16', 22, '127.0.0.1', 24, NULL, 'ed51e641ff39a04ff6107ca645043168', 0, 0, NULL, NULL, NULL, NULL),
(1779, ':v::v::v::v::v::v::v::v::v:', NULL, 1, '2014-06-03 10:37:13', 22, '127.0.0.1', 25, NULL, '6dd89f89d00580df2c1fa50448e6f7c2', 0, 0, NULL, NULL, NULL, NULL),
(1780, ':V::V::V::OK::OK::OK:', ':-) :-)', 0, '2014-06-04 16:49:14', 22, '127.0.0.1', 23, '2014-06-05T13:37:30+03:00', '36c3e9362d7b177609b2216861ec816b', 1, 1, NULL, NULL, 1, NULL),
(1781, 'O:)', NULL, 1, '2014-06-04 17:43:23', 22, '127.0.0.1', 26, NULL, '63f1c6c61a416fef04721cbc3c18a066', 0, 0, NULL, NULL, NULL, NULL),
(1783, 'фів:-)', ';-)', 0, '2014-06-05 10:56:32', 23, '127.0.0.1', 25, '2014-06-09T13:03:58+03:00', 'ae99c5f079f0e8290e5631d4d87bd6dd', 1, 1, NULL, NULL, NULL, NULL),
(1784, 'фівфів', NULL, 1, '2014-06-05 11:05:00', 23, '127.0.0.1', 24, NULL, '81145f98441fa5e3a5738333e8f98c7d', 0, 0, NULL, NULL, NULL, NULL),
(1785, 'фівфівфів', NULL, 1, '2014-06-05 11:07:21', 23, '127.0.0.1', 24, NULL, 'e56f53ec5bc1b0f9118c6f01519f2a17', 0, 0, NULL, NULL, NULL, NULL),
(1786, 'фівфів', NULL, 1, '2014-06-05 11:09:18', 23, '127.0.0.1', 24, NULL, '30d9349360da51a13374e5844da945e4', 0, 0, NULL, NULL, NULL, NULL),
(1787, 'фівфів', NULL, 1, '2014-06-05 11:09:22', 23, '127.0.0.1', 24, NULL, 'cfa200b9e995aec8f7edf8869f97946c', 0, 1, NULL, NULL, NULL, NULL),
(1788, ':-)', NULL, 1, '2014-06-07 07:45:13', 23, '127.0.0.1', 24, NULL, 'c2f07bc1c560ba340dd68ad3d1e70b60', 0, 0, NULL, NULL, NULL, NULL),
(1789, '', '&lt;3', 0, '2014-06-07 07:45:17', 23, '127.0.0.1', 24, '2014-06-09T11:12:27+03:00', '1593058824f1488e59f4a32458740b8e', 1, 1, NULL, NULL, NULL, NULL),
(1790, '', ';-]', 0, '2014-06-07 07:45:37', 23, '127.0.0.1', 24, '2014-06-09T11:12:19+03:00', '6614ef5394dbca872646ce8e857af26d', 1, 1, NULL, NULL, NULL, NULL),
(1791, '', ':-D', 0, '2014-06-07 07:45:42', 23, '127.0.0.1', 24, '2014-06-09T11:03:33+03:00', 'f4242d8987f4b84278334c35ad4a8896', 1, 1, NULL, NULL, NULL, NULL),
(1792, ':-):-):-):-):-):-):-):-):-):-)', 'asdasd', 0, '2014-06-07 07:51:09', 23, '127.0.0.1', 22, '2014-06-08T15:32:12+03:00', 'faf20c3c37e44b2abf94ae5c2fa91d4b', 1, 0, NULL, NULL, NULL, NULL),
(1794, ':-)', ':-) :-) :-) :-) :-) :-)', 0, '2014-06-07 07:54:13', 23, '127.0.0.1', 22, '2014-06-08T15:25:09+03:00', '3655205480d9fa2eea40dd851eed24b0', 1, 0, NULL, NULL, NULL, NULL),
(1795, ':DD', NULL, 1, '2014-06-08 13:48:05', 22, '127.0.0.1', 23, NULL, 'e23853827bcde7de776aa28e2c17f26e', 0, 0, NULL, NULL, NULL, NULL),
(1796, ':-D:-D', NULL, 1, '2014-06-08 13:48:12', 22, '127.0.0.1', 23, NULL, 'e3a563ac885e15039cd4adea2a9e884c', 0, 0, NULL, NULL, NULL, NULL),
(1797, 'xD', NULL, 1, '2014-06-08 14:03:25', 22, '127.0.0.1', 23, NULL, '5a5c91d2ada4d67bbd9673c60deec20e', 0, 1, NULL, NULL, NULL, NULL),
(1798, 'xD', NULL, 1, '2014-06-08 21:29:43', 22, '127.0.0.1', 23, NULL, 'a4bbe99546556aa935308e231e8fa568', 0, 1, NULL, NULL, NULL, NULL),
(1799, 'Dd3-)3-)3-)', ':-)', 0, '2014-06-09 08:02:07', 27, '127.0.0.1', 24, '2014-06-09T11:07:11+03:00', 'e22c5b9805c9ff5a22359648ce4d90c1', 0, 1, NULL, NULL, NULL, NULL),
(1800, ':-):-D;-)xD;-P:-p8-)B-):-(;-]3(:!(:_(:((:o:|3-)&gt;(&gt;_(O:);o8|8o:X:-*}:)&lt;3:like::dislike::UP::V::OK:', ':OK:', 0, '2014-06-09 08:02:30', 27, '127.0.0.1', 24, '2014-06-09T11:03:03+03:00', 'fce764603594ab4bb5740f2744bc0221', 0, 1, NULL, NULL, NULL, NULL),
(1801, 'коля', ';-)', 0, '2014-06-09 20:34:03', 22, '127.0.0.1', 23, '2014-06-11T14:25:13+03:00', '292416b384f4443f351ab91eba1949f7', 1, 1, NULL, NULL, NULL, NULL),
(1802, ':-D', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaavvvvvaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaas', 0, '2014-06-10 10:09:56', 22, '127.0.0.1', 23, '2014-06-12T10:26:43+03:00', '2c80d6e0439f873b8d009079e6552a0b', 1, 0, NULL, NULL, NULL, NULL),
(1804, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'saaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasaaaaaaaaaaaaaaaasv', 0, '2014-06-12 07:21:54', 22, '127.0.0.1', 23, '2014-06-12T10:25:07+03:00', '129c41f4dc9460dee61a92904250ad07', 1, 0, NULL, NULL, NULL, NULL),
(1805, 'B-)', NULL, 1, '2014-06-12 08:03:49', 23, '127.0.0.1', 25, NULL, '0570be997f1f24866ce4b9a1d50898cb', 0, 0, NULL, NULL, NULL, NULL),
(1806, '&gt;_(', NULL, 1, '2014-06-13 07:22:56', 22, '127.0.0.1', 23, NULL, 'fc9457f82b0642465f6b51f36b3ea689', 0, 1, NULL, NULL, NULL, NULL),
(1807, ';-P;-P', NULL, 1, '2014-06-13 07:32:53', 22, '127.0.0.1', 23, NULL, 'd796e41bf4ba997b266a2b733a5833dd', 0, 1, NULL, NULL, NULL, NULL),
(1810, 'прівет:D', 'ПріветxD', 0, '2014-06-16 21:23:43', 22, '127.0.0.1', 30, '2014-06-17T00:24:02+03:00', '646cdd9189ba409a10dc3cfe1013391e', 1, 1, NULL, NULL, NULL, NULL),
(1811, 'хай:-D', ':-D', 0, '2014-06-16 21:39:09', 30, '127.0.0.1', 22, '2014-06-17T00:39:20+03:00', '2cd1d754e0fffa6959c16904540a4161', 1, 0, NULL, NULL, NULL, NULL),
(1812, ':-)', ':OK: :OK:', 0, '2014-06-16 21:42:23', 22, '127.0.0.1', 30, '2014-06-17T00:47:37+03:00', '46422f199a6a7dcc01abea0552d2452c', 1, 1, NULL, NULL, NULL, NULL),
(1813, ';-)', ';-)', 0, '2014-06-17 09:10:36', 22, '127.0.0.1', 30, '2014-06-17T12:10:50+03:00', '9c332ded261a21c7b8d343820327d580', 1, 1, NULL, NULL, NULL, NULL),
(1816, ';-)', NULL, 1, '2014-06-17 20:19:34', 22, '127.0.0.1', 27, NULL, 'e6d0bc3d739f42fb554874b14e3c2fe1', 0, 0, NULL, NULL, NULL, NULL),
(1817, ':((', NULL, 1, '2014-06-19 09:54:48', 22, '127.0.0.1', 30, NULL, '276bb1ae5cd9e864e4536f741634220e', 0, 1, NULL, NULL, NULL, NULL),
(1818, ':-)', NULL, 1, '2014-06-19 16:43:22', 22, '127.0.0.1', 23, NULL, '4a6efe1c4c6ff25d0aa085e4e8c4376a', 0, 1, NULL, NULL, NULL, NULL),
(1819, ':-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)xD:o ssdasdas d:-):-):-):-)', 'xD', 0, '2014-06-19 20:29:05', 22, '127.0.0.1', 30, '2014-06-19T23:29:32+03:00', '0ee1388fc46d4bbb5982e080cca7df7c', 1, 1, NULL, NULL, NULL, NULL),
(1820, ':OK:', NULL, 1, '2014-06-20 06:04:31', 22, '127.0.0.1', 30, NULL, 'd84cc649ddb9f13002d27bf6a4d8dd3c', 0, 1, NULL, NULL, NULL, NULL),
(1821, ':OK:', NULL, 1, '2014-06-20 16:22:15', 22, '127.0.0.1', 30, NULL, '68320ac8ab19579180a5054bf935cd28', 0, 1, NULL, NULL, NULL, NULL),
(1822, ':_(', NULL, 1, '2014-06-21 10:57:02', 22, '127.0.0.1', 30, NULL, 'e9f19c8881f9a87b1eb3c8b9f66246dc', 0, 1, NULL, NULL, NULL, NULL),
(1825, 'фывфыв', ';-]', 0, '2014-06-22 20:14:10', NULL, '127.0.0.1', 23, '2014-06-23T12:31:24+03:00', 'dd72bdbb2e1d07aee356deb4bbee1781', 0, 0, NULL, NULL, NULL, NULL),
(1826, 'фывфыв', ';-]', 0, '2014-06-22 20:14:10', NULL, '127.0.0.1', 24, '2014-06-23T12:31:24+03:00', 'dd72bdbb2e1d07aee356deb4bbee1781', 0, 0, NULL, NULL, NULL, NULL),
(1827, 'фывфыв', ';-]', 0, '2014-06-22 20:14:10', NULL, '127.0.0.1', 25, '2014-06-23T12:31:24+03:00', 'dd72bdbb2e1d07aee356deb4bbee1781', 0, 0, NULL, NULL, NULL, NULL),
(1828, 'фывфыв', ';-]', 0, '2014-06-22 20:14:10', NULL, '127.0.0.1', 26, '2014-06-23T12:31:24+03:00', 'dd72bdbb2e1d07aee356deb4bbee1781', 0, 0, NULL, NULL, NULL, NULL),
(1829, 'фывфыв', ';-]', 0, '2014-06-22 20:14:10', NULL, '127.0.0.1', 27, '2014-06-23T12:31:24+03:00', 'dd72bdbb2e1d07aee356deb4bbee1781', 0, 0, NULL, NULL, NULL, NULL),
(1830, 'фывфыв', ';-]', 0, '2014-06-22 20:14:10', NULL, '127.0.0.1', 30, '2014-06-23T12:31:24+03:00', 'dd72bdbb2e1d07aee356deb4bbee1781', 0, 0, NULL, NULL, NULL, NULL),
(1834, 'sad', ':-) &lt;3 &lt;3 &lt;3', 0, '2014-06-22 20:28:33', NULL, '127.0.0.1', 23, '2014-06-23T11:06:42+03:00', '77ab80a601a108498087025f3ed80e81', 0, 0, NULL, NULL, NULL, 1),
(1835, 'sad', ':-) &lt;3 &lt;3 &lt;3', 0, '2014-06-22 20:28:33', NULL, '127.0.0.1', 24, '2014-06-23T11:06:42+03:00', '77ab80a601a108498087025f3ed80e81', 0, 0, NULL, NULL, NULL, 1),
(1836, 'sad', ':-) &lt;3 &lt;3 &lt;3', 0, '2014-06-22 20:28:33', NULL, '127.0.0.1', 25, '2014-06-23T11:06:42+03:00', '77ab80a601a108498087025f3ed80e81', 0, 0, NULL, NULL, NULL, 1),
(1837, 'sad', ':-) &lt;3 &lt;3 &lt;3', 0, '2014-06-22 20:28:33', NULL, '127.0.0.1', 26, '2014-06-23T11:06:42+03:00', '77ab80a601a108498087025f3ed80e81', 0, 0, NULL, NULL, NULL, 1),
(1838, 'sad', ':-) &lt;3 &lt;3 &lt;3', 0, '2014-06-22 20:28:33', NULL, '127.0.0.1', 27, '2014-06-23T11:06:42+03:00', '77ab80a601a108498087025f3ed80e81', 0, 0, NULL, NULL, NULL, 1),
(1839, 'sad', ':-) &lt;3 &lt;3 &lt;3', 0, '2014-06-22 20:28:33', NULL, '127.0.0.1', 30, '2014-06-23T11:06:42+03:00', '77ab80a601a108498087025f3ed80e81', 0, 0, NULL, NULL, NULL, 1),
(1842, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 22, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1843, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 23, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1844, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 24, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1845, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 25, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1846, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 26, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1847, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 27, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1848, ':D', ':-)', 0, '2014-06-23 08:17:04', NULL, '127.0.0.1', 30, '2014-06-23T11:17:20+03:00', '480a034c8cb7cb66f127b91600eb2679', 0, 0, NULL, NULL, NULL, 1),
(1851, 'some question number 0', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, 'dd8779096cf26e8c037228d9340bd18f', NULL, NULL, NULL, NULL, NULL, NULL),
(1852, 'some question number 1', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, '0b9ae04b293d2db2e7240f905f14346f', NULL, NULL, NULL, NULL, NULL, NULL),
(1853, 'some question number 2', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, 'b379cc6458e8b15a0cecc479822fb9a8', NULL, NULL, NULL, NULL, NULL, NULL),
(1854, 'some question number 3', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, '75931c441831087d47f92a2f36d8610b', NULL, NULL, NULL, NULL, NULL, NULL),
(1855, 'some question number 4', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, '3594cf54be9831a661efda53d2618b2d', NULL, NULL, NULL, NULL, NULL, NULL),
(1856, 'some question number 5', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, '7abc9fb64de359e37b6afaca2f37788f', NULL, NULL, NULL, NULL, NULL, NULL),
(1857, 'some question number 6', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, 'fe8e71cc6a3d182534df2c77b0e2e4fc', NULL, NULL, NULL, NULL, NULL, NULL),
(1858, 'some question number 7', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, '3b7bf9c723ac61967a6936d68d24558a', NULL, NULL, NULL, NULL, NULL, NULL),
(1859, 'some question number 8', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, '6ee56fb38e4c3f87ad6e70bdb3f60d57', NULL, NULL, NULL, NULL, NULL, NULL),
(1860, 'some question number 9', NULL, 1, '2014-06-30 11:24:20', NULL, '127.0.0.1', 22, NULL, 'add80ff8278355935fc6edb4ece0236c', NULL, NULL, NULL, NULL, NULL, NULL),
(1871, '&gt;_(', 'xD', 0, '2014-06-30 17:10:00', 22, '127.0.0.1', 23, '2014-07-25T14:22:46+03:00', '9835f03039fee612160a8b9704f76e18', 0, 0, '/img/answers/kolya/46aab8be10da02d68214156d4b64d040.jpg', '/img/answers/kolya/small/46aab8be10da02d68214156d4b64d040.jpg', NULL, NULL),
(1872, ':-)', NULL, 1, '2014-07-01 11:44:56', 22, '127.0.0.1', 31, NULL, 'a42833d5c5752a846d356574c76e3c63', 0, 0, NULL, NULL, NULL, NULL),
(1873, 'і', NULL, 1, '2014-07-01 11:47:12', NULL, '127.0.0.1', 31, NULL, '9cbc0f9fca83bcf4726c638744d480ee', 0, 0, NULL, NULL, NULL, NULL),
(1874, ':-D', NULL, 1, '2014-07-02 14:03:27', NULL, '127.0.0.1', 31, NULL, '577259b3764fbd715e423b22a4790e3a', 0, 0, NULL, NULL, NULL, NULL),
(1875, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 22, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1877, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 24, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1878, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 25, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1879, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 26, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1880, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 27, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1881, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 30, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1882, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 31, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1883, 'Питання для всіх, від Звідай.нет :)', ':D', 0, '2014-07-02 20:35:34', NULL, '127.0.0.1', 33, '2014-07-05T22:06:08+03:00', '89bc8858e51a808da73810b8373a3146', 0, 0, NULL, NULL, NULL, 1),
(1884, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 22, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1886, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 24, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1887, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 25, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1888, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 26, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1889, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 27, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1890, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 30, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1891, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 31, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1892, 'тест :)', ';-)', 0, '2014-07-05 19:14:52', NULL, '127.0.0.1', 33, '2014-07-08T10:52:28+03:00', '3b1102eb1f24c534848dd5394d170d85', 0, 0, NULL, NULL, NULL, 1),
(1893, ':-D', NULL, 1, '2014-07-24 13:59:55', 23, '127.0.0.1', 22, NULL, 'bfe1c9dc24d026c70d6c7f579b9f5a72', 0, 0, NULL, NULL, NULL, NULL),
(1894, ';-)', NULL, 1, '2014-07-25 14:49:55', 23, '127.0.0.1', 22, NULL, '60585cb8a7a2aa354f4d6b1b435a69b1', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `settings` varchar(255) DEFAULT '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}',
  `photo` varchar(100) DEFAULT NULL,
  `photo_small` varchar(100) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `vk_id` int(10) DEFAULT NULL,
  `background` varchar(100) DEFAULT NULL,
  `last_refresh_background` int(11) DEFAULT NULL,
  `password_open` varchar(30) DEFAULT NULL,
  `photo_big` varchar(200) DEFAULT NULL,
  `ask_about` varchar(50) DEFAULT 'Звідай дашо :)',
  `deactivated` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `name`, `city`, `status`, `settings`, `photo`, `photo_small`, `hash`, `vk_id`, `background`, `last_refresh_background`, `password_open`, `photo_big`, `ask_about`, `deactivated`) VALUES
(22, '\0\0', 'mynewvk', '8d515c4517c6001508b43a7c23f1ff2182cb5454', NULL, 'email@email.com', '47e5f51c74f9a8a1b7b47be18e559321146a13e3', NULL, NULL, '634783d03b5f85fa043909e5158c4d2c1d8b940d', 1392475678, 1404587022, 1, 'Коля Лукін', 'Мукачево', ':-D :o', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', '/media/avatar/300/c55b37ab8cdec2ae4b55e1d3f03808d7.jpg', '/media/avatar/100/c55b37ab8cdec2ae4b55e1d3f03808d7.jpg', 'qwerty', 140702052, NULL, NULL, 'ololo', '/media/avatar/c55b37ab8cdec2ae4b55e1d3f03808d7.jpg', 'звідай хоть шо))', 0),
(23, '\0\0', 'kolya', 'b671cb158733dac25903e46d705450119920932b', NULL, 'mukachev0@mail.ru', NULL, NULL, NULL, '1aa38ea23bb13aee63ef6d7358295462c58176b2', 1392477146, 1406367873, 1, 'Kolya lukin', 'Мукачево', ':D', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', 'http://cs403721.vk.me/v403721052/a718/BxUv20HTno0.jpg', 'http://cs403721.vk.me/v403721052/a944/YyjkQgfpvcM.jpg', 'poiuy', NULL, NULL, NULL, NULL, 'http://cs403721.vk.me/v403721052/a719/Ow5ao9jhqbw.jpg', 'звідай дашо sdf sdfsd fsd fsdfsd', 0),
(24, '\0\0', 'lololo', 'e62280ba98233098ce792d0eac80fef804c3d0cf', NULL, 'eyber@mail.ru', NULL, NULL, NULL, '324a6547480f1348f3c5d473f60818d824918a97', 1393062808, 1402302114, 1, 'vasya eyber', 'mukachevo', '=))))', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', '/media/avatar/300/300x400.png', '/media/avatar/100/100x100.png', 'zxcvb', NULL, NULL, NULL, NULL, NULL, 'зазвідай шось :))', 0),
(25, '\0\0', 'blabla', '999afc72d3549488f6fefcc8293b90163fcfda26', NULL, 'bycrik@yandex.ru', NULL, NULL, NULL, '4ed9398fde7d12430cd2b024313ee804136165a1', 1396089081, 1403541122, 1, 'Іван Блабла', 'Мукачево', ':D', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', '/media/avatar/300/300x400.png', '/media/avatar/100/100x100.png', '48f2f84558601cccc2d70e87dd9c092b', NULL, NULL, NULL, NULL, NULL, 'зазвідай шось :))', 0),
(26, '\0\0', 'mukachevo', 'b53dab01988ef7612543c310357903a83e78516a', NULL, 'ololova@mail.ru', NULL, NULL, NULL, 'a21cf5dcfc3b9a691a73aa25dfd9d1de7a592716', 1401281847, 1401791843, 1, 'Катя ололова', 'Мукачево', ':DD', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', '/media/avatar/300/300x400.png', '/media/avatar/100/100x100.png', '5000605b2a3bd4b5d439bf70865296f8', NULL, NULL, NULL, NULL, '/media/avatar/300/300x400.png', 'Звідай дашо :)', 0),
(27, '\0\0', 'ukraine', 'dd0fd8d33741ad506f37af50fcd4d36c97b91938', NULL, 'Verf@mail.ru', NULL, NULL, NULL, 'a04f5cc103426447b7fb29e1d7c094dbfe0a76f5', 1402300808, 1402300950, 1, 'Сашка Валева', 'Мукачево', ':-D', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', '/media/avatar/300/300x400.png', '/media/avatar/100/100x100.png', '7b438b1c76e6ec2ac331e820f8d03bd5', NULL, NULL, NULL, NULL, '/media/avatar/300/300x400.png', 'Звідай дашо :)', 0),
(30, '\0\0', 'mynewvk2', '31cafbdf6fabc55db952d04265256ed3493061ff', NULL, 'asdasd@dasd.ru', NULL, NULL, NULL, '9861f97eeabfdd24e0a9cd68c4942d35bbdaff81', 1402953593, 1403210386, 1, 'Виталий Осов asdas d', 'Мукачевоasdasds', ':-D', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":false,"delete_account":false,"friends_count":null}', 'http://cs403721.vk.me/v403721052/a718/BxUv20HTno0.jpg', 'http://cs403721.vk.me/v403721052/a944/YyjkQgfpvcM.jpg', 'c4d8b78cf77e5b94194a1d4a08c92ff6', NULL, NULL, NULL, 'mukachevokolja', 'http://cs403721.vk.me/v403721052/a719/Ow5ao9jhqbw.jpg', 'Звідай дашо :)', 0),
(31, '\0\0', 'mynewvk20', 'e034c4f9913a76c00fb641a3548d780feec12b65', NULL, 'asdadss@mail.ru', NULL, NULL, NULL, 'a9985f9222a7ea2264aa9cb617ef5060af9418eb', 1403025073, 1404309746, 1, 'Виталий Осов', 'Мукачево', 'jhu', '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', 'http://cs424930.vk.me/v424930457/4ac9/z2x4dUq1-XU.jpg', 'http://cs424930.vk.me/v424930457/4acb/hZW9BTOrqI8.jpg', '253e63f59baf0af6889dc55e7f851d19', 150265457, NULL, NULL, 'mukachevokolja', 'http://cs424930.vk.me/v424930457/4ac9/z2x4dUq1-XU.jpg', 'Звідай дашо :)', 0),
(33, '\0\0', 'mynewvk_1', '68e551b433aec112bbbca6c2804b03746dfa1399', NULL, 'mukadhev0@mail.ru', NULL, NULL, NULL, '16c73cfb204de615310718aeeab890b48a5e38cb', 1403984436, 1404124784, 1, 'Коля Лукін', 'Мукачево', NULL, '{"show_vk_link":true,"can_ask_anonymous":true,"last_background_refresh":1402391265,"last_avatar_refresh":1402391265,"can_comment":true,"delete_account":false,"friends_count":null}', '/media/avatar/300/300x400.png', '/media/avatar/100/100x100.png', '708430dc1977f26d7763df6bca437fe7', NULL, NULL, NULL, NULL, NULL, 'Звідай дашо :)', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(23, 22, 1),
(24, 23, 1),
(25, 24, 1),
(26, 25, 1),
(27, 26, 1),
(28, 27, 1),
(31, 30, 1),
(32, 31, 1),
(34, 33, 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
