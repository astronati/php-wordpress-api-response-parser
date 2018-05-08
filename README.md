[![Build Status](https://travis-ci.org/astronati/php-wordpress-api-response-parser.svg?branch=master)](https://travis-ci.org/astronati/php-sports-open-data-response-parser)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b39ddb493f38495dbf0c7d59366ecd73)](https://www.codacy.com/app/astronati/php-wordpress-api-response-parser?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=astronati/php-wordpress-api-response-parser&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/b39ddb493f38495dbf0c7d59366ecd73)](https://www.codacy.com/app/astronati/php-wordpress-api-response-parser?utm_source=github.com&utm_medium=referral&utm_content=astronati/php-wordpress-api-response-parser&utm_campaign=Badge_Coverage)
[![Latest Stable Version](https://poser.pugx.org/astronati/wordpress-api-response-parser/v/stable)](https://packagist.org/packages/astronati/wordpress-api-response-parser)
[![License](https://poser.pugx.org/astronati/wordpress-api-response-parser/license)](https://packagist.org/packages/astronati/wordpress-api-response-parser)

# Wordpress API Response Parser
Allows to map responses provided by Wordpress API.

## Supported Responses
Not all responses are currently supported but we are happy to work for you if you need some of them.

**NOTE:** To add another response into the supported list, please file a new issue.

To do that please file a new [issue](https://github.com/astronati/php-wordpress-api-response-parser/issues/new).

## Installation
You can install the library and its dependencies using `composer` running:
```sh
$ composer require astronati/wordpress-api-response-parser
```

### Usage
The library allows to return a model per each response and its content (post, tag, category, etc...).

##### Example
The following snippet can be helpful:

```php
use WARP\Response\ResponseParser;
...
// Obtain a Response
$apiResponse = ['id' => 123, ...] // Save the response from a Wordpress API
$response = ResponseParser::create($apiResponse, ResponseParser::CREATE_POST);
...
// Get post
$post = $response->getPost();
echo $post->getID(); // 123
```

For more details please take a look at [Response](https://github.com/astronati/php-sports-open-data-response-parser/tree/master/src/Response).

## Development
The environment requires [phpunit](https://phpunit.de/), that has been already included in the `dev-dependencies` of the
`composer.json`.

### Dependencies
To install all modules you just need to run following command:

```sh
$ composer install
```

### Testing
Tests files are created in dedicates folders that replicate the
[src](https://github.com/astronati/php-wordpress-api-response-parser/tree/master/src) structure as follows:
```
.
+-- src
|   +-- [folder-name]
|   |   +-- [file-name].php
|   ...
+-- tests
|   +-- [folder-name]
|   |   +-- [file-name]Test.php
```

Execute following command to run the tests suite:
```sh
$ composer test
```

Run what follows to see the code coverage:
```sh
$ composer coverage
```

## License
This package is released under the [MIT license](LICENSE.md).

