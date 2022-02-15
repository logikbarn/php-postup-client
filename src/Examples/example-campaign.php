<?php

/**
 * Examples: Campaigns
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

// Campaigns
$sample_create    = $client->campaigns()->create(
    'Sample Campaign',                 // string $title
    'external123456',                  // int $external_id
    'Campaign description goes here.'  // string $comment
);

$sample_getSingle = $client->campaigns()->getSingle(1);
$sample_getAll    = $client->campaigns()->getAll();

// Campaign Statistics
$sample_stats_getAll    = $client->campaigns()->statistics()->getAll(1);
$sample_stats_getByDate = $client->campaigns()->statistics()->getByDate(
    1,             // int $campaign_id
    '2021-01-01',  // string $start_date
    '2021-12-31'   // string $end_date
);

?>

<h1>Campaigns</h1>

<pre>
  <?php var_dump($sample_create) ?>
  <hr>
  <?php var_dump($sample_getSingle) ?>
  <hr>
  <?php var_dump($sample_getAll) ?>
  <hr>
  <?php var_dump($sample_stats_getAll) ?>
  <hr>
  <?php var_dump($sample_stats_getByDate) ?>
<pre>
