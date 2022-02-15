<?php

/**
 * Examples: Recipient Privacy
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

// Recipient Privacy
$sample_getById    = $client->recipients()->privacyData()->getById(12345);
$sample_getByEmail = $client->recipients()->privacyData()->getByEmail( 
    'john.doe@example.com' 
);
$sample_delete     = $client->recipients()->privacyData()->delete( 
    'john.doe@example.com', 'all' 
);

?>

<pre>
  <?php var_dump($sample_getById) ?>
  <hr>
  <?php var_dump($sample_getByEmail) ?>
  <hr>
  <?php var_dump($sample_delete) ?>
</pre>
