# Пакет для формирования ленты новостей в формате Yandex Dzen для Laravel


## Требования

php >= 8.0

## Устнановка

```bash
$ composer require pshilyaev/lara-dzen-rss-out
```

## Использование

```php
use Pshilyaev\DzenRssOut\FeedGenerator;
use Pshilyaev\DzenRssOut\ValueObjects\NewsItem;

$feedGenerator = new FeedGenerator("Test channel", "https://yandex.ru", "ru");

$result = $feedGenerator->generateFeed([new NewsItem(
            'Article Title',
            'http://example.com/article',
            'Article Description',
            'Tue, 4 Jul 2023 04:20:00 +0300')]);
```
PS Пакет создан в учебных целях на курсе Otus.