<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "roooot";
$dbName = "minishop";

$conn1 = mysqli_connect($dbServername, $dbUsername, $dbPassword);
if ($conn1) {
  $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
  mysqli_query($conn1, $sql);
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  $sql = "CREATE TABLE IF NOT EXISTS article (
    article_id int(11) NOT NULL,
    categories_id int(11) NOT NULL,
    title varchar(255) NOT NULL,
    description longtext NOT NULL,
    prix int(12) NOT NULL,
    img_path varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO article (article_id, categories_id, title, description, prix, img_path) VALUES
  (1, 4, 'hitman', 'La bagarre en costard', 1500, 'img/hitman.jpg'),
  (2, 5, 'inserer_random_film_damour', 'ils vecurent heureux et eurent beaucoup d enfants', 15, 'img/amour.jpg'),
  (3, 4, 'the raid', 'jen ai marre', 1100, 'img/theraid.jpg'),
  (4, 5, 'love actually', 'lol c bo', 1500, 'img/loveactually.jpg');";
  mysqli_query($conn, $sql);
  $sql = "CREATE TABLE IF NOT EXISTS categories (
    categories_id int(11) NOT NULL,
    action tinyint(1) DEFAULT NULL,
    comedie tinyint(1) DEFAULT NULL,
    horror tinyint(1) DEFAULT NULL,
    stress tinyint(1) DEFAULT NULL,
    amour tinyint(4) DEFAULT NULL,
    bagarre int(11) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO categories (categories_id, action, comedie, horror, stress, amour, bagarre) VALUES
  (3, 1, NULL, NULL, NULL, NULL, NULL),
  (4, 1, NULL, NULL, NULL, NULL, 1),
  (5, 1, 1, NULL, NULL, 1, NULL);";
  mysqli_query($conn, $sql);
  $sql = "CREATE TABLE IF NOT EXISTS transaction (
    transaction_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    article_id int(11) NOT NULL,
    nb_of_article int(12) NOT NULL,
    date int(20) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  mysqli_query($conn, $sql);
  $sql = "CREATE TABLE IF NOT EXISTS users (
    user_id int(11) NOT NULL,
    username varchar(256) NOT NULL,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    passwd varchar(256) NOT NULL,
    admin tinyint(1) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO users (user_id, username, firstname, lastname, passwd, admin) VALUES
  (1, 'admin', 'admin', 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 1);";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE article
    ADD PRIMARY KEY (article_id),
    ADD KEY categories_id (categories_id) USING BTREE;";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE categories
    ADD PRIMARY KEY (categories_id);";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE transaction
  ADD PRIMARY KEY (transaction_id),
  ADD KEY article_id (article_id),
  ADD KEY user_id_2 (user_id,article_id);";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE users
    ADD PRIMARY KEY (user_id);";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE article
    MODIFY article_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE categories
    MODIFY categories_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE transaction
    MODIFY transaction_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
  mysqli_query($conn, $sql);
  $sql = "ALTER TABLE users
    MODIFY user_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
  mysqli_query($conn, $sql);
  $sql = "ADD CONSTRAINT article_ibfk_1 FOREIGN KEY (categories_id) REFERENCES categories (categories_id);";
  mysqli_query($conn, $sql);
  $sql = "ADD CONSTRAINT transaction_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id),
  ADD CONSTRAINT transaction_ibfk_3 FOREIGN KEY (article_id) REFERENCES article (article_id);";
  mysqli_query($conn, $sql);
}
