<?php

/**
 * Examples: Import Templates
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

// Import Templates
$sample_create = $client->imports()->templates()->create(
    'sample-import',                    // string $title,
    'NORMAL',                           // string $type,
    'Comma Separated',                  // string $delimeter,
    'Recips.ADDRESS',                   // string $column_names,
    'E',                                // string $channel,
    null,                               // int $import_template_id     = null,
    1,                                  // int $active                 = null,
    true,                               // bool $confirmed             = null,
    null,                               // int $send_template_id       = null,
    'Manual Import',                    // string $source_description  = null,
    'API',                              // string $signup_method       = null,
    [ 1 ],                              // array $list_ids             = null,
    [ 1 ],                              // array $purge_list_ids       = null,
    [ 1 ],                              // array $suppression_list_ids = null,
    null                                // string $watch_directory     = null
);

$sample_update = $client->imports()->templates()->update(
    $sample_create->importTemplateId,   // int $import_template_id,
    'Sample Import Updated',            // string $title,
    'NORMAL',                           // string $type,
    'Comma Separated',                  // string $delimeter,
    'Recips.ADDRESS',                   // string $column_names,
    'E',                                // string $channel,
    0,                                  // int $active                 = null,
    false,                              // bool $confirmed             = null,
    null,                               // int $send_template_id       = null,
    'Manual Import',                    // string $source_description  = null,
    'API',                              // string $signup_method       = null,
    [ 1 ],                              // array $list_ids             = null,
    [ 1 ],                              // array $purge_list_ids       = null,
    [ 1 ],                              // array $suppression_list_ids = null,
    null                                // string $watch_directory     = null
);

$sample_getSingle = $client->imports()->templates()->getSingle( 
    $sample_update->importTemplateId 
);
$sample_getAll    = $client->imports()->templates()->getAll();

?>

<h1>Import Templates</h1>

<pre>
  <?php var_dump($sample_create) ?>
  <hr>
  <?php var_dump($sample_update) ?>
  <hr>
  <?php var_dump($sample_getSingle) ?>
  <hr>
  <?php var_dump($sample_getAll) ?>
</pre>