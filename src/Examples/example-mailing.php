<?php

/**
 * Examples: Mailing
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
use Logikbarn\PhpPostupClient\Content\Mailing;

require_once '../../vendor/autoload.php';

$client = new Client();
$client->setCredentials('api.user@example.com', 'password');

$content = new Mailing(
    'Mailing Subject',
    'Some preview text goes here',
    null,
    null,
    'sample-from@foreignpolicy.com',
    'From Name',
    null,
    null,
    null,
    'Reply To Name',
    '<p>Sample HTML content</p>',
    'Sample text body',
    null,
    null,
    null,
    null,
    null
);

$sample_create    = $client->mailings()->create(
    'Testing',
    1,
    1,
    'E',
    [ 1, 2, 3 ],
    'ALL',
    'HTML',
    'NEW',
    $content
);

$sample_getCounts = $client->mailings()->getSingle($sample_create->mailingId);

?>

<h1>Mailings</h1>

<pre>
  <?php var_dump($sample_create) ?>
  <hr>
  <?php var_dump($sample_getCounts) ?>
</pre>
