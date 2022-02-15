<?php

/**
 * Examples: Imports
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

// Imports
$sample_data   = $client->imports()->data(
    1, [
    'john.doe@example.com',
    'jane.doe@example.com',
    ]
);
$sample_status = $client->imports()->status($sample_data->importId);
$sample_stats  = $client->imports()->stats('DONE', 1);

?>

<h1>Importing Data</h1>

<pre>
  <?php var_dump($sample_data) ?>
  <hr>
  <?php var_dump($sample_status) ?>
  <hr>
  <?php var_dump($sample_stats) ?>
</pre>