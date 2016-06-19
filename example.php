<?php
	include 'src/Paginator.php';
	use Visavi\Paginator as Paginator;

	// Установка переменной имени текущей страницы
	// Необязательный параметр, по умолчанию page
	Paginator::setPageName('start');

	// Установка количества выводимых страниц
	// Необязательный параметр, по умолчанию 3
	Paginator::setCrumbs(5);

	// Установка количества элементов на страницу
	// Необязательный параметр, по умолчанию 10
	Paginator::setLimit(20);

	// Установка пользовательского шаблона с постраничной навигацией (Расскоментируйте стили)
	// Необязательный параметр, если страницы не найдена, подключается шаблон по умолчанию
	//Paginator::setTemplate('src/views/zurb.php');

	// Получение текущей страницы
	// Необязательный параметр, переменную можно передать в вызов метода pagination
	$current = Paginator::getCurrentPage();

	// Массив параметров должен состоять только из одного обязательного параметра - total - количество элементов
	// current - номер текущей страницы (необязательный)
	// limit - количество элементов на страницу (необязательный)
	// crumbs - количество выводимых страниц, справа и слева от текущей (необязательный)
	$pages = Paginator::pagination(['total' => 500, 'current' => $current, 'limit' => 50, 'crumbs' => 2]);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Paginator example</title>
		<link href="/src/css/bootstrap.css" rel="stylesheet">
		<!-- <link href="/src/css/zurb.css" rel="stylesheet"> -->
	</head>
	<body>
		<?= $pages ?>
	</body>
</html>
