# Api Client for DDF Cover Service 

This is a PHP Api Client for DDF Cover Service. This service provides covers for library materials indexed by isbn, issn, faust, pid. 
The service is provided by [Danskernes Digitale Bibliotek](https://www.danskernesdigitalebibliotek.dk/) 

### Authentication notes 
Authentication is done via OAuth2 against auth.dbc.dk. To obtain a valid token follow instructions in [1.2. Password Grant](https://github.com/DBCDK/hejmdal/blob/master/docs/oauth2.md#12-password-grant). To use the \"Authorize\" option in this tool use your 'client_id' and 'client_secret' and fill in '@' for both username and password. 

### Implementation notes 
This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 2.0
- Package version: 2.0.0
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), do:

```
composer require danskernesdigitalebibliotek/ddb-cover-service-php-client
```

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to//vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth
$config = CoverService\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new CoverService\Api\CoverApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = "type_example"; // string | The type of the identifier, i.e. 'isbn', 'faust', 'pid' or 'issn'
$identifiers = array("identifiers_example"); // string[] | A list of identifiers of {type}. Maximum number os identifiers per reqeust is 200
$sizes = array("sizes_example"); // string[] | A list of image sizes (Cloudinary transformations) for the cover(s) you want to receive.

try {
    $result = $apiInstance->getCoverCollection($type, $identifiers, $sizes);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CoverApi->getCoverCollection: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to */*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CoverApi* | [**getCoverCollection**](docs/Api/CoverApi.md#getcovercollection) | **GET** /api/v2/covers | Search multiple covers

## Documentation For Models

 - [Cover](docs/Model/Cover.md)
 - [ImageUrl](docs/Model/ImageUrl.md)

## Documentation For Authorization


## oauth

- **Type**: OAuth
- **Flow**: password
- **Authorization URL**: 
- **Scopes**: 
 - ****: 


## Author



