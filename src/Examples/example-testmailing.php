<?php

/**
 * Examples: Test Mailings
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

$sample_send = $client->testMailing()->send( 
    1,
    [ 'john.doe@example.com' ],
    'HTML'
);

?>

<h1>Test Mailing</h1>

<pre>
  <?php var_dump($sample_send) ?>
</pre>
