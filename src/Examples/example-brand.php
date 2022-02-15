<?php

/**
 * Examples: Brand
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

require_once '../../vendor/autoload.php';

use Logikbarn\PhpPostupClient\Client;

$client = new Client();
$client->setCredentials('api.user@example.com', 'password');

$sample_getAll    = $client->brands()->getAll();
$sample_getSingle = $client->brands()->getSingle(1);

?>

<h1>Brands</h1>

<pre>
  <?php var_dump($sample_getAll) ?>
  <hr>
  <?php var_dump($sample_getSingle) ?>
</pre>
