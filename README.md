# bearychat
bearychat robot message api

## Install
```
composer require quhang/bearychat
```

## Usage
```
$message = new \Quhang\BearyChat\Message($webhook);

$attachment = new \Quhang\BearyChat\Attachment([
    'title' => 'title_1',
    'url' => 'https://bearychat.com',
    'text' => 'attachment_text',
    'color' => '#ffa500',
    'images' => ['url' => 'http://img3.douban.com/icon/ul15067564-30.jpg'],
]);

# or
# $attachment = new \Quhang\BearyChat\Attachment();
# $attachment->title('title_1')
#    ->url('https://bearychat.com')
#    ->text('attachment_text')
#    ->color('#ffa500')
#    ->image('http://img3.douban.com/icon/ul15067564-30.jpg');

$message->send();
```

## Laravel

### laravel 5.5+
1. you can publish config, then set your webhook in .env `BEARYCHAT_WEBHOOK`. This is unnecessary.
```
php artisan vendor:publish
```
2. 使用 `BearyChat` to send message. `BearyChat` is a `\Quhang\BearyChat\Message` instance.
```
\Quhang\BearyChat\BearyChat::text('hello')->send()
```

### laravel 5.1 ~ 5.4
1. if you want to config your webhook, you need add `Quhang\BearyChat\LaravelServiceProvider` to `config/app.php`
```
'providers' => [
    // ...
    Quhang\BearyChat\LaravelServiceProvider::class,
    // ...
]
```
2. if you want to use Facade, you need add `Quhang\BearyChat\BearyChat` to `config/app.php`
```
'aliases' => [
    // ...
    'BearyChat' => Quhang\BearyChat\BearyChat::class,
    // ...
]
```

## Methods
```
function text(string $text); # set text
function notification(bool $need = true); # notification control
function markdown(bool $need = true); # markdown control
function channel(string $name); # set channel name
function to(string $username); # send to someone
function attachment(Attachment $attach); # append a attachment
function appendAttachment(Attachment $attach); # alias attachment
function webhook($webhook); # set webhook url
function send(bool $need = true); # send
```

## License
MIT