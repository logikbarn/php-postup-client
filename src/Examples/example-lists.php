<?php

/**
 * Examples: Lists
 *
 * PHP version ^7.2 | ^8.0
 *
 * @category Example
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @version  SVN: 1.0.0
 * @link     https://github.com/logikbarn/php-postup-client
 * @see      apidocs.postup.com
 * @since    1.0.0
 */

use Logikbarn\PhpPostupClient\Client;

require_once '../../vendor/autoload.php';

$client = new Client();
$client->setCredentials('api.user@example.com', 'password');

$sample_create = $client->lists()->create( 
    'Sample List',
    true,
    false,
    false,
    'E',
    true,
    null,
    'Sample List',
    'Sample list created through the API',
    null,
    1,
    [ 'example.com' ],
    'created time',
    1,
    'external123456',
    null,
    true,
    [ 1, 2, 3 ]
);

$sample_update  = $client->lists()->update(
    $sample_create->listId,
    'Updated Sample Title',
    true,
    true,
    true,
    'E',
    true,
    'Updated Sample Title',
    'Updated Description',
    null,
    1,
    [ 'example.net', 'example.org' ],
    'created time',
    1,
    'external1234',
    null,
    true,
    [ 1, 2, 3 ]
);

$sample_getById    = $client->lists()->getById($sample_create->listId);
$sample_getByBrand = $client->lists()->getByBrand(1);
$sample_getCounts  = $client->lists()->getCounts($sample_create->listId);

?>

<h1>Lists</h1>

<pre>
  <?php var_dump($sample_create) ?>
  <hr>
  <?php var_dump($sample_update) ?>
  <hr>
  <?php var_dump($sample_getById) ?>
  <hr>
  <?php var_dump($sample_getByBrand) ?>
  <hr>
  <?php var_dump($sample_getCounts) ?>
</pre>
