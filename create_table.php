<?php
	$con = new PDO('mysql:host=localhost;dbname=auth','root','');
	$statement = $con->prepare('
		create table users (
			id int(11) auto_increment primary key,
			name varchar(255) not null,
			email varchar(255) not null,
			password varchar(255) not null
			)
		');

	$statement->execute();

	##cmd line show table system
// 1.cd desktop
// 2.cd foldername(auth)
// 3.php fileName(create_table.php)
// 4.mysql -uroot -p
// 5.use DatabaseName(auth)
// 5.show tables

?>


