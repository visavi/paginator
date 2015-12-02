<?php
	include 'src/Paginator.php';
	use Visavi\Paginator as Paginator;

	// Установка переменной имени текущей страницы
	// Необязательный параметр, по умолчанию page
	Paginator::setPageName('start');

	// Установка пользовательского шаблона с постраничной навигацией
	// Необязательный параметр, если страницы не найдена, подключается шаблон по умолчанию
	//Paginator::setTemplate('src/views/zurb.php');

	// Получение текущей страницы
	// Необязательный параметр, переменную можно передать в вызов метода pagination
	$current = Paginator::getCurrentPage();

	// Массив параметров должен состоять только из одного обязательного параметра - total
	// current - номер текущей страницы (необязательный)
	// crumbs - количество выводимых страниц, справа и слева от текущей (необязательный)
	$pages = Paginator::pagination(['total' => 50, 'current' => $current, 'crumbs' => 2]);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Paginator example</title>
		<link href="/src/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<?= $pages ?>
	</body>
</html>
