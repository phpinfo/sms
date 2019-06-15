SMS Sender
==========

A very simple abstraction layer to send SMS.

Installation
------------
```bash
composer require phpinfo/sms
``` 

Usage
----- 
The package contains void sender to test SMS sending capabilities:

```php
$sender = new VoidSender();

$sender->send(new Message(79161234567, 'Some message'));
```

Logging
-------
`LoggerDecorator` can be used to log SMS requests:

```php
$sender = new VoidSender();
$sender = new LoggerDecorator($sender, $logger);

$sender->send(new Message(79161234567, 'Some message'));
```

It can be useful to log message texts in development environment:

```php
$logText = ($env === 'DEV');

$sender = new VoidSender();
$sender = new LoggerDecorator($sender, $logger, $logText);

$sender->send(new Message(79161234567, 'Some message'));
```

Concrete Senders
----------------

* [smsfeedback.ru](https://github.com/phpinfo/sms-smsfeedback)

