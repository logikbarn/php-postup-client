<?php

/**
 * Examples: Recipient
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

// Recipient
$sample_create       = $client->recipients()->create(
    'john.doe@example.com',
    'external1234',
    'E',
    null,
    'U',
    'API',
    '8.8.8.8',
    'API 3rd',
    new \DateTime('now', new \DateTimeZone('GMT')),
    [ 'address1' => '123 Main St.', 'imported' => 'y' ]
);

$sample_update   = $client->recipients()->update(
    $sample_create->recipientId,
    'john.doe@example.com',
    'external12345',
    'E',
    'U',
    'API Unsub',
    '8.8.4.4',
    'API Unsub 3rd',
    new \DateTime('now', new \DateTimeZone('GMT')),
    null,
    [ 'address1' => '123 Main St.', 'imported' => 'y' ]
);

$sample_getByEmail      = $client->recipients()->getByEmail( 
    $sample_update->address 
);
$sample_getById         = $client->recipients()->getById( 
    $sample_update->recipientId 
);
$sample_getByExternalId = $client->recipients()->getByExternalId( 
    $sample_update->externalId 
);

?>

<pre>
  <?php var_dump($sample_create) ?>
<hr>
  <?php var_dump($sample_update) ?>
<hr>
  <?php var_dump($sample_getByEmail) ?>
<hr>
  <?php var_dump($sample_getById) ?>
<hr>
  <?php var_dump($sample_getByExternalId) ?>
</pre>
