<?php

/**
 * Examples: Custom Fields
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

// Custom Field
$sample_create    = $client->customFields()->create( 
    1, 
    'test_custom', 
    false, 
    'TEXT_LONG'
);
$sample_update    = $client->customFields()->update( 
    1, 
    'test_custom_update', 
    true, 
    'TEXT_SHORT'
);
$sample_getSingle = $client->customFields()->getSingle(1);
$sample_getAll    = $client->customFields()->getAll();

?>

<h1>Custom Fields</h1>

<pre>
  <?php var_dump($sample_create) ?>
  <hr>
  <?php var_dump($sample_update) ?>
  <hr>
  <?php var_dump($sample_getSingle) ?>
  <hr>
  <?php var_dump($sample_getAll) ?>
</pre>
