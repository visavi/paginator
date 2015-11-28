<?php
	include 'src/Paginator.php';
	use Visavi\Paginator as Paginator;

	$current = Paginator::currentPage();
	$pages = Paginator::pagination(['total' => 50, 'current' => $current, 'crumbs' => 2]);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Paginator example</title>
		<link href="/src/css/style.css" rel="stylesheet">
	</head>
	<body>
		<?= $pages ?>
	</body>
</html>
