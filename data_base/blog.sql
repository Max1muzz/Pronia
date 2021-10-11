-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 11 2021 г., 18:18
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(32) NOT NULL,
  `alias` varchar(32) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `keywords` varchar(32) DEFAULT NULL,
  `description` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(1, 'Деревья', 'trees', 0, 'Tree, plants ', 'Tree'),
(2, 'Цветы', 'flowers', 0, 'Flowers, plants ', 'Flowers'),
(3, 'Пальмы', 'palm', 0, 'Palm, plants ', 'Palm'),
(4, 'Кактусы', 'cactus', 0, 'Cactus, plants ', 'Cactus'),
(5, 'Бонсай', 'bonsai', 1, 'Tree, plants, bonsai', 'bonsai'),
(6, 'Фикус', 'ficus', 1, 'Tree, plants, ficus', 'ficus'),
(7, 'Орхидеи', 'orhidey', 2, 'Flowers, plants ', 'Flowers'),
(8, 'Фиалки', 'fialki', 2, 'Flowers, plants ', 'Flowers'),
(9, 'Суккуленты', 'sukulenti', 4, 'Cactus, plants ', 'Cactus'),
(10, 'Драцены', 'draceni', 2, 'Flowers, plants ', 'Flowers'),
(11, 'Плодовые', 'fruit', 1, 'Tree, plants ', 'Tree'),
(12, 'Цитрусы', 'citrus', 11, 'Tree, plants, citrus', 'Fruit');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int(2) UNSIGNED NOT NULL,
  `title` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `title`) VALUES
(1, 'Зелёный'),
(2, 'Красный'),
(3, 'Чёрный'),
(4, 'Белый'),
(5, 'Серый'),
(6, 'Золотой');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `value` float(15,2) NOT NULL,
  `base` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol`, `value`, `base`) VALUES
(1, 'гривна', 'UAH', '₴ ', 26.60, '0'),
(2, 'доллар', 'USD', '$ ', 1.00, '1'),
(3, 'евро', 'EUR', '€ ', 0.88, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `currency`, `note`) VALUES
(6, 3, '0', '2021-10-06 13:05:46', NULL, 'EUR', 'qwert'),
(7, 3, '0', '2021-10-06 13:15:05', NULL, 'UAH', '&lt;h1&gt;asdf&lt;/h1&gt;'),
(8, 2, '0', '2021-10-06 17:39:42', NULL, 'USD', NULL),
(9, 2, '0', '2021-10-06 17:45:08', NULL, 'USD', NULL),
(10, 2, '0', '2021-10-06 17:46:59', NULL, 'USD', NULL),
(11, 2, '0', '2021-10-06 17:51:31', NULL, 'USD', 'dafsgfdgf'),
(12, 2, '0', '2021-10-08 16:35:27', NULL, 'EUR', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(4) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_usd` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `title`, `price_usd`) VALUES
(1, 6, 9, 2, 'Рука Будды', 99),
(2, 6, 3, 1, 'Эхинокактус Грузони', 56.35),
(3, 6, 2, 11, 'Бонсай из Сосны', 179),
(4, 7, 1, 3, 'Фикус Гинсенг S-образный', 235.5),
(5, 7, 5, 5, 'Драцена Цинто', 39),
(6, 8, 1, 1, 'Фикус Гинсенг S-образный', 235.5),
(7, 9, 2, 1, 'Бонсай из Сосны', 179),
(8, 10, 2, 1, 'Бонсай из Сосны', 179),
(9, 11, 3, 3, 'Эхинокактус Грузони', 56.4),
(10, 12, 3, 4, 'Эхинокактус Грузони', 56.4);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `price` float UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `alias`, `title`, `content`, `price`, `status`, `keywords`, `description`, `img`) VALUES
(1, 6, 'fikus-ginseng-s-obraznyj', 'Фикус Гинсенг S-образный', 'ТЕМПЕРАТУРА\r\nразмещают в помещении, где температура поддерживается в пределах 18—24°С. И комнатные и уличные можно выставлять в летний период на открытый воздух, однако их следует приучать к прямому солнечному излучению постепенно, ежедневно увеличивая время пребывания на полчаса.\r\n\r\nОСВЕЩЕНИЕ\r\nБольшая часть бонсай требует солнечного света. При размещении в доме необходимо найти хорошо освещенное место. Солнечные лучи не должны попадать на растение в течении продолжительного времени (лучше всего 1-2 часа в день), чтобы оно не перегрелось и присматривать за влажностью грунта.', 235.5, '1', 'цветы, фикус', 'декоративные растения', 'ficus_1.jpg'),
(2, 5, 'bonsaj-iz-sosny', 'Бонсай из Сосны', 'ТЕМПЕРАТУРА\r\nразмещают в помещении, где температура поддерживается в пределах 18—24°С. И комнатные и уличные можно выставлять в летний период на открытый воздух, однако их следует приучать к прямому солнечному излучению постепенно, ежедневно увеличивая время пребывания на полчаса.\r\n\r\nОСВЕЩЕНИЕ\r\nБольшая часть бонсай требует солнечного света. При размещении в доме необходимо найти хорошо освещенное место. Солнечные лучи не должны попадать на растение в течении продолжительного времени (лучше всего 1-2 часа в день), чтобы оно не перегрелось и присматривать за влажностью грунта.', 179, '1', 'цветы, бонсай', 'декоративные растения', 'bonsaj-iz-sosny.jpg'),
(3, 4, 'ehkhinokaktus-gruzoni', 'Эхинокактус Грузони', 'Эхинокактус (Echinocactus)\r\n\r\nЦарство: Растения\r\nОтдел: Покрытосеменные\r\nКласс: Двудольные\r\nПорядок: Гвоздичноцветные\r\nСемейство: Кактусовые\r\nРод: Эхинокактус\r\n\r\nСемейство кактусовых. Древнейший род, включающий в себя порядка 10 видов крупных шаровидных кактусов. Размеры их настолько велики, что в культуре распространение получил только один вид — эхинокактус грузони Echinocactus grusonii. Это шаровидный кактус может вырастать до 40 см в диаметре. Правда, с годами шаровидная форма несколько вытягивается и становится более цилиндрической. У него очень острые крепкие колючки желтоватого цвета. В комнатных условиях не цветет. Довольно легкий в культуре кактус.\r\nЕстественный ареал этого рода — субтропические пустыни США и Мексики, в том числе знаменитая пустыня Мохаве. Для этих районов характерны известковые и глинистые почвы.', 56.4, '1', 'цветы, кактус', 'декоративные растения', 'ehkhinokaktus-gruzoni.jpg'),
(4, 4, 'kaktus-mammillyariya', 'Кактус Маммиллярия', 'Существует четыре основных рода кактусовых, из которых самым известным является маммиллярия – цветущие кактусы, которые весной легко цветут и в магазинах, и дома, украшая собой любой интерьер.', 120, '1', 'цветы, кактус', 'декоративные растения', 'kaktus-mammillyariya.jpg'),
(5, 10, 'dracena-cinto', 'Драцена Цинто', 'Свет: яркий рассеянный. От прямых солнечных лучей следует притенять.\r\n\r\nТемпература: в весенне-летний период 20-25°С. В осенне-зимний период помещают в прохладные помещения, где температура не должна опускаться ниже 12°С (оптимально 16-18°С).\r\n\r\nПолив: в весенне-летний период обильный, но с периодами просушки (земляной ком должен основательно подсохнуть). Зимой полив сокращают, ориентируясь на то, как быстро пересыхает земляной ком.\r\n\r\nВлажность воздуха: растения мирятся с сухим воздухом квартир, однако большинство драцен предпочитает повышенную влажность воздуха. Летом растения опрыскивают раз в день водой на 2-3°C теплее, чем температура воздуха в помещении. Время от времени растения протирают влажной тряпочкой либо обмывают под душем.\r\n\r\nПодкормка: летом — 1 раз в неделю комплексным удобрением; зимой — 1 раз в месяц.\r\n\r\nОбрезка: как только обнаженный ствол становится заметным, его можно обрезать (примерно на 30 см) и использовать для черенкования.', 39, '1', 'Драцены', 'Драцена Цинто', 'dracena-cinto.jpg'),
(6, 12, 'komnatnyj-apelsin', 'Комнатный апельсин', 'Апельсины, как и все тропические деревья любят свет и тепло. Поэтому, чтобы вашему домашнему апельсиновому дереву было комфортно, и вы могли наслаждаться его красотой и плодами, выберите для него подходящее местечко с южной стороны в вашем доме. Ведь вкусовые качества плодов апельсина зависят от того насколько много света и тепла получает растение.\r\nПоливать нужно тогда когда высыхает верхний слой почвы, но не допускать пересыхания. Очень важным условием для апельсинового дерева есть регулярное опрыскивание – не менее 1 раза в сутки. А подкармливают апельсин только весной и летом раз в две недели, зимой растение в подкормке не нуждается.', 150, '1', 'Апельсин', 'Комнатный апельсин', 'komnatnyj-apelsin.jpg'),
(8, 11, 'bananovoe-derevo-kavendish', 'Банановое дерево «Кавендиш»', 'Полив: Для хорошего роста Комнатному банану нужно частый полив в теплой период. Сигналом для следуйщего полива является что земля просохла на 1-2 см. Деревце можно поливать водопроводной водо, но желательно горячую, потому что она мешьше хлорирована, нежели холодная. Также воду нужно использивать отстояную не меньше двух дней и теплотой 25-30˚С. Время от времени землю деревца нужно акуратно взрыхляйть, это необходимо что в землю и в корни поступал кислород. В холодный период деревце не нужно часто поливать.\r\nТемпература: Этот комнатный бабан тоже теплолюбивое деревце. Если темперетура падает ниже 16˚С, то это деревцо медленее растет и уменьшается в росте. В летний период приемлемая темперетура для комнатного банана является в пределах 23-26˚С.\r\n\r\nОсвещения: Он, таже очень любит много света, ему очень необходим для хорошего роста и чтоб деревце принесло плоды. Месторопложения для него подоконник или уголог на которого будут побадть солничные лучики. При необходимость можно использывать дополнителное освещения, можно использовать лампы. Ведь не достаточное осветления, плохо влияет на розвитии и созревания плодов. Летом, если вы ставите деревце на балкон или терессу, то лучше его притенять от сильный солнечных лучей. Он также не любит сквозняки.\r\n\r\nКомнатное банановое деревце -это пелолюивое ростения, которому еще необходимо хорошое освещения. Также он любит влажный воздух, по этому теплый период деревце можно еще опрыскивать. В переод интесивного росто его нужно подкармливать.', 259, '1', 'Банан', 'Банановое дерево', 'bananovoe-derevo-kavendish.jpg'),
(9, 11, 'hand-of-buddha', 'Рука Будды', 'Рука будды это наиболее теплолюбивое растение из семейства цитрусовых. Поэтому нужно оберегать его от сильного понижения температуры. Поливать необходимо часто и обильно, ибо это растение не любит пересыхания почвы. Для поддержки влажности следует опрыскивать растение или ставить дополнительно поддоны с водой. В зимний период нужно обеспечить условия температуры +16-18оС, при достаточном освещении. А также следует сократить полив.', 99, '1', 'деревья', 'Рука Будды', 'hand-of-buddha.jpg'),
(10, 9, 'agava', 'Агава', 'Освещение: Ограничений по количеству света нет. Прямые солнечные лучи и яркое солнце – приветствуются. Недостаток же света, напротив, может вызвать потерю декоративности растения. Листья агавы в этом случае становятся мелкими, вытягиваются. Особенно это важно помнить зимой, когда и солнца меньше и дни короче.\r\n\r\nТемпература: Летом наилучшее место для нее – цветник, палисадник и пр. Можно, даже высадить агаву в открытый грунт. Но и обычная комнатная температура, в этот период, для нее вполне комфортна. В отличие от многих комнатных растений, она от летней жары не страдает. Другое дело зимой. В это время ей необходимо создать настоящие зимние условия – от +4 до +10 градусов.\r\n\r\nПолив: Летом, обильный полив не нужен, скорее умеренный, но вместе с тем – регулярный. Не давайте почве пересыхать. Полив агавы зимой, напрямую зависит от температуры, в которой она содержится. Не многие найдут возможность создать ей полноценную зимовку. Поэтому, если и зимой она у Вас живет при обычной комнатной температуре, то полив такой же, как и летом. При холодной зимовке, поливать надо значительно реже. Но в обоих случаях, придерживайтесь двух основных правил: дать земле подсохнуть, но избегать длительной пересушки и — лучше подсушить, чем залить. При низкой температуре и повышенной влажности земляного кома, велика вероятность накликать на растение неприятности в виде стеблевой и корневой гнили.\r\n\r\nПересадка: Если Вы хотите получить пышное и красивое растение, то эту процедуру нельзя игнорировать. Пока она в «юношеском» возрасте (до 3-4 лет), пересаживайте ежегодно, более взрослые – раз в два-три года. Для ее пересадки можно использовать обычный грунт для кактусов, а можно составить и свой.', 28, '1', 'агава', 'кактус агава', 'agava.jpg'),
(11, 3, 'finikovaya-palma', 'Финиковая пальма', 'Финиковая пальма светолюбивое растение, поэтому выберите ей уголок в своем доме, где будет достаточно света, но старайтесь, чтобы прямые солнечные лучи не попадали на её листья, особенно в летнее время, иначе не избежать ожогов.\r\n\r\nНо не расстраивайтесь, если  в комнате, где вы хотите поселить своего питомца, окна выходят на северную сторону. Пальма хорошо переносит и небольшое затенение. Поэтому, если ваша пальма будет жить в  комнате, окна которой выходят на север, поставьте ее ближе к окну, этого для нее будет достаточно.\r\n\r\nЛетом, если вы живете в своем доме, то лучше всего пальму вынести на улицу, когда ночная температура будет не ниже 12 градусов. Выберите для нее затишное место в полутени.', 65, '1', 'Финик', 'Финиковая пальма', 'finikovaya-palma.jpg'),
(12, 7, 'royal-blue', 'Синяя орхидея', 'Фаленопсисы — неприхотливые вечнозелёные, постоянно растущие орхидеи; их виды и цветущие почти круглый год гибриды идеальны для начинающих.\r\nПри правильном уходе фаленопсисы обильно, длительно цветут и живут в доме до 7 лет.\r\nДля фаленопсисов требуется тёплое место с рассеянным светом без прямых солнечных лучей. Хорошо растут фаленопсисы и в глубине комнаты при достаточном искусственном освещении. При недостатке света и при снижении температуры менее 16 градусов у подготовившихся к цветению фаленопсисов могут опадать бутоны.\r\n\r\nТемпература содержания этих теплолюбивых орхидей не должна быть ниже 18 градусов (кроме осени, когда требуется около 1-2 месяцев содержать фаленопсисы при температуре 16 градусов для закладки цветочных почек); зона комфорта для фаленопсисов находится в пределах 22-24 градуса. Полив должен быть очень умеренным круглый год, особенно зимой. Субстрат не должен сильно пересыхать, но перед очередным поливом дайте ему слегка подсохнуть — корням фаленопсисов, кроме воды, нужен воздух.\r\n\r\nПри излишнем поливе возможно появление грибковых инфекций. Поливная вода не должна попадать в точку роста — центр ризомы во избежание её гниения. Можно поливать фаленопсисы методом «купания», наполовину опуская горшок с орхидеей на короткое время в ведро с мягкой водой, чтобы субстрат пропитался влагой. Фаленопсис требует постоянного поддержания высокой влажности воздуха всеми возможными способами.', 34, '1', 'орхидея', 'синяя орхидея', 'royal-blue.jpg'),
(13, 8, 'senpoliya-fialka', 'Сенполия (фиалка)', 'Освещение: теневыносливое, лучше всего подходит северное, северо-восточное, северо-западное окно, яркий рассеянный, полутень от светлого до полузатененного, но защищенного от прямых солнечных лучей; растение не должно находиться вне помещения.\r\nТемпература: летом 18 — 20, зимой 18 — 20\r\nПолив: с поддона, мягкой теплой водой. Зимой — умеренный, летом — умеренный\r\nРазмножение: весной или летом листовыми черенками, делением\r\nВлажность воздуха: без опрыскивания, но влажность воздуха высокая\r\nПересадка: весной каждые 2 года. Посуда неглубокая, довольно широкая, хороший дренаж. рН 5,5-7,0. Земляная смесь: листовая земля, торф, дерновая земля, перегной и песок (2:3:1:1:1).\r\nПодкормка: весна-лето — 1 раз в 2 недели минеральными и органическими удобрениями. Любит калий. Зима-осень — без подкормки\r\nПодрезание: удалять боковые розетки.', 10, '1', 'Сенполия (фиалка)', 'Сенполия (фиалка)', 'senpoliya-fialka.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product_color`
--

CREATE TABLE `product_color` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(2) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `price`) VALUES
(1, 1, 1, 235.5),
(2, 1, 3, 240),
(3, 1, 6, 245.9),
(4, 3, 4, 56),
(5, 3, 3, 59),
(6, 3, 5, 58);

-- --------------------------------------------------------

--
-- Структура таблицы `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `email`, `address`, `role`) VALUES
(2, 'Max1', '$2y$10$zAMLc.CcG50P6lSXI8btdeWzyqZPuJqmX1i2DMeIC2tgqCCjVK0Du', 'maxim', 'm1@mail.com', '1234', 'user'),
(3, 'Max', '$2y$10$vqISiTanK.GSr2Hf6pFa2OT4GzMLwDqkOyghaNkFc4mndhI.7Dype', 'Максим', 'm@mail.com', '1234', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_color_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;