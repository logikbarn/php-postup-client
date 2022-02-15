<?php

/**
 * Examples: List Subscriptions
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

$subscribe = $client->lists()->subscriptions()->subscribe(
    1,        // int $recipient_id,
    1,        // int $list_id,
    'NORMAL', // string $status,
    'NORMAL', // string $list_status = null,
    'NORMAL', // string $global_status = null,
    'Widget', // string $source_id = null,
    true,     // bool $confirmed = null
);

$unsubscribe = $client->lists()->subscriptions()->unsubscribe(
    1,        // int $recipient_id,
    1,        // int $list_id,
    'NORMAL', // string $status,
    1,        // string $mailing_id = null
);

$is_subscribed = $client->lists()->subscriptions()->isSubscribed(
    1,        // int $recipient_id,
    1,        // int $list_id,
);

$get_recipient_subscriptions = $client->lists()
    ->subscriptions()
    ->getRecipientSubscriptions(
        1         // int $recipient_id,
    );

$get_subscribers = $client->lists()->subscriptions()->getSubscribers(
    1         // int $list_id,
);

?>

<h1>List Subscription</h1>

<pre>
  <?php var_dump($subscribe) ?>
<hr>
  <?php var_dump($unsubscribe) ?>
<hr>
  <?php var_dump($is_subscribed) ?>
<hr>
  <?php var_dump($get_recipient_subscriptions) ?>
<hr>
  <?php var_dump($get_subscribers) ?>
</pre>
