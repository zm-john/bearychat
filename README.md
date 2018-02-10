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

## Methods
```
function text(string $text); # set text
function notification(bool $need = true); # notification control
function markdown(bool $need = true); # markdown control
function channel(string $name); # set channel name
function to(string $username); # send to someone
function attachment(Attachment $attach); # append a attachment
function appendAttachment(Attachment $attach); # alias attachment
function send(bool $need = true); # send
```

## License
MIT