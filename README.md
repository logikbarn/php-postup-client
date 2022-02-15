# PHP PostUp Client

This project aims to provide a PHP based API Wrapper for the marketing platform [PostUp](https://postup.com). For the API documentation and a comprehensive list of the available endpoints/methods visit the PostUp [API Docs](https://apidocs.postup.com/) website.

**Please note this project is not endorsed or affiliated by PostUp or Upland Software.**

## Authentication

Authentication is simple and only requires setting the username and password on the client. Below is an example:

```
use Logikbarn\PhpPostupClient\Client;

$client = new Client();
$client->setCredentials('api.user@example.com', 'password');

```

## Examples

There are example to almost every available method and can be found in the [src/Examples](src/Examples/) directory.

## License

The PHP PostUp Client is open source software licensed under the [MIT](https://opensource.org/licenses/MIT) License. See `LICENSE` for more information.