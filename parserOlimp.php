<?php
	include('lib/simple_html_dom.php');
	/*
	Запись html страницы в переменную 
	поиск на странице данных авто 
	вывод в json
	*/
	$html = file_get_html("https://olimp-cars.ru/auto");
	$cars = [];
	foreach ($html->find('.item') as $key => $value) {
		$cars[] = [
			"name" =>trim($html->find('.item_name',$key)->plaintext),
			"price" =>intval(preg_replace("/[^,.0-9]/", '', $html->find('.item_new_price ',$key)->plaintext)),
			"img" =>$html->find('.item_image img',$key)->src
		];
	}
	echo json_encode($cars);

