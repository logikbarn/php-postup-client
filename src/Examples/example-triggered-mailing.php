<?php

/**
 * Examples: Triggered Mailings
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
use Logikbarn\PhpPostupClient\Content\Recipient;

require_once '../../vendor/autoload.php';

$client = new Client();
$client->setCredentials('api.user@example.com', 'password');

$recipient = new Recipient( 
    'john.doe@example.com',               // Email
    [ 'FirstName=John', 'LastName=Doe' ], // Tags
    null                                  // Optional external ID       
);

$sample_send = $client->triggeredMailing()->send(
    1,                                    // Send template ID
    [ $recipient ],                       // Array of recipients
    null                                  // Optional Mailing content override
);

?>

<h1>Triggered Mailings</h1>

<pre>
  <?php var_dump($sample_send) ?>
</pre>
