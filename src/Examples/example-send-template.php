<?php

/**
 * Examples: Send Templates
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

$sample_create       = $client->sendTemplate()->create(
    'Sample Template',
    2,
    10,
    'E', 
    new Mailing(
        'Sample Subject',
        'Sample preview text goes here.',
        'UTF-8',
        'quoted-printable',
        'donotuse@example.com',
        'First Last',
        '[-emailaddr-]',
        '[-name-]',
        '[-email_reply_alpha-]',
        'First Last',
        '<html>Insert HTML Content Here</html>',
        'Insert Text Content Here.',
        null,
        null,
        null,
        null,
        null
    )
);

$sample_update       = $client->sendTemplate()->update(
    $sample_create->sendTemplateId,
    'Updated Title',
    2,
    10,
    'E',
    new Mailing(
        'Sample Updated Subject',
        'Sample updated preview text goes here.',
        'UTF-8',
        'quoted-printable',
        'donotuse@example.com',
        'First Last',
        '[-emailaddr-]',
        '[-name-]',
        '[-email_reply_alpha-]',
        'First Last',
        '<html>Updated HTML Content Here</html>',
        'Insert Text Content Here.',
        null,
        null,
        null,
        null,
        null
    )
);
$sample_getById      = $client->sendTemplate()->getById( 
    $sample_update->sendTemplateId
);
$sample_getByChannel = $client->sendTemplate()->getByChannel('E');
$sample_getAll       = $client->sendTemplate()->getAll(5);
?>

<h1>Send Templates</h1>

<pre>
  <?php var_dump($sample_create) ?>
<hr>
  <?php var_dump($sample_update) ?>
<hr>
  <?php var_dump($sample_getById) ?>
<hr>
  <?php var_dump($sample_getByChannel) ?>
<hr>
  <?php var_dump($sample_getAll) ?>
</pre>
