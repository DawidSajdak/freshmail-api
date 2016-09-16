FreshMail
=========

Wrapper for the most fucked up api in the world.

Installation
============

The easiest way to get install the library is by using composer:

`composer require dawidsajdak/freshmail-api`

Basic usage
===========

```php
        $client = new Client(
            API_KEY,
            SECRET_API_KEY',
            new GuzzleHttpClient(
                new \GuzzleHttp\Client()
            )
        );

        /** @var Response $response */
        $response = $client->api('ping')->ping([]);
```