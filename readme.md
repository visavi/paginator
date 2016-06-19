# Class to display pagination

[![Latest Stable Version](https://poser.pugx.org/visavi/paginator/v/stable)](https://packagist.org/packages/visavi/paginator)
[![Total Downloads](https://poser.pugx.org/visavi/paginator/downloads)](https://packagist.org/packages/visavi/paginator)
[![Latest Unstable Version](https://poser.pugx.org/visavi/paginator/v/unstable)](https://packagist.org/packages/visavi/paginator)
[![License](https://poser.pugx.org/visavi/paginator/license)](https://packagist.org/packages/visavi/paginator)

## Пример использования

```
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

// Установка пользовательского шаблона с постраничной навигацией
// Необязательный параметр, если страницы не найдена, подключается шаблон по умолчанию
Paginator::setTemplate('src/views/zurb.php');

// Получение текущей страницы
// Необязательный параметр, переменную можно передать в вызов метода pagination
$current = Paginator::getCurrentPage();

// Массив параметров должен состоять только из одного обязательного параметра - total - количество элементов
// current - номер текущей страницы (необязательный)
// limit - количество элементов на страницу (необязательный)
// crumbs - количество выводимых страниц, справа и слева от текущей (необязательный)

Если данные страниц переданные в виде параметров массива, то они приоритетнее тех, что установлены выше

echo Paginator::pagination(['total' => 500, 'current' => $current, 'limit' => 50, 'crumbs' => 2]);
```


### Installing

```
composer require visavi/paginator
```

### License

The class is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
