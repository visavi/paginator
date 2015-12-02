<?php
/**
 *  Класс постраничной навигации
 *  Выводит страницы с учетом переданных данных 1 ... 5 [6] 7 ... 50
 *  Имеется возможность кастомизировать вид вывода страниц
 * @license Code and contributions have MIT License
 * @link    http://visavi.net
 * @author  Alexander Grigorev <visavi.net@mail.ru>
 * @version 1.0
 */

namespace Visavi;

class Paginator {

	public static $pageName = 'page';
	public static $template = 'views/bootstrap.php';

	/**
	 * Путь к пользовательскому шаблону со страницами
	 * @param string $path Путь к файлу
	 */
	public static function setTemplate($path = null)
	{
		if (file_exists($path)) {
			self::$template = $path;
		}
	}

	/**
	 * Установка переменной имени текущей страницы
	 * @param string $name Имя переменной
	 */
	public static function setPageName($name)
	{
		self::$pageName = $name;
	}

	/**
	 * Получение текущей страницы
	 * @return integer Номер страницы
	 */
	public static function getCurrentPage()
	{
		return ! empty($_GET[self::$pageName]) ? abs(intval($_GET[self::$pageName])) : 1;
	}

	/**
	 * Постраничная навигация
	 * @param  array $page Массив данных
	 * @return string      Сформированный блок с кнопками страниц
	 */
	public static function pagination($page)
	{
		if ($page['total'] > 0) {

			$pagename = self::$pageName;
			if (empty($page['crumbs'])) $page['crumbs'] = 3;
			if (empty($page['current'])) $page['current'] = self::getCurrentPage();

			$pages = [];
			$idx_fst = max($page['current'] - $page['crumbs'], 1);
			$idx_lst = min($page['current'] + $page['crumbs'], $page['total']);

			if ($page['current'] != 1) {
				$pages[] = [
					'page' => $page['current'] - 1,
					'title' => 'Предыдущая',
					'name' => '«',
				];
			}
			if ($page['current'] > $page['crumbs'] + 1) {
				$pages[] = [
					'page' => 1,
					'title' => '1 страница',
					'name' => 1,
				];
				if ($page['current'] != $page['crumbs'] + 2) {
					$pages[] = [
						'separator' => true,
						'name' => ' ... ',
					];
				}
			}
			for ($i = $idx_fst; $i <= $idx_lst; $i++) {
				if ($i == $page['current']) {
					$pages[] = [
						'current' => true,
						'name' => $i,
					];
				} else {
					$pages[] = [
						'page' => $i,
						'title' => $i.' страница',
						'name' => $i,
					];
				}
			}
			if ($page['current'] < $page['total'] - $page['crumbs']) {
				if ($page['current'] != $page['total'] - $page['crumbs'] - 1) {
					$pages[] = [
						'separator' => true,
						'name' => ' ... ',
					];
				}
				$pages[] = [
					'page' => $page['total'],
					'title' => $page['total'] . ' страница',
					'name' => $page['total'],
				];
			}
			if ($page['current'] != $page['total']) {
				$pages[] = [
					'page' => $page['current'] + 1,
					'title' => 'Следующая',
					'name' => '»',
				];
			}

			return self::viewTemplate(compact('pages', 'pagename'));
		}
	}

	/**
	 * Вывод шаблона
	 * @param  array  $params Массив переменных
	 * @return string         Сформированный шаблон
	 */
	protected static function viewTemplate($params = [])
	{
		extract($params);
		ob_start();

		include (self::$template);

		return ob_get_clean();
	}
}
