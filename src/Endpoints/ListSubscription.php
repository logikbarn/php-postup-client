<?php

/**
 * ListSubscription
 *
 * Responsible for working with subscription related API data. Has functions to 
 * subscribe and unsubscribe users as well as pull general subscriber data. Also
 * allows checking if a user is subscribed.
 *
 * PHP version ^7.2 | ^8.0
 *
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @version  SVN: 1.0.0
 * @link     https://github.com/logikbarn/php-postup-client
 * @see      apidocs.postup.com
 * @since    1.0.0
 */

namespace Logikbarn\PhpPostupClient\Endpoints;

use Logikbarn\PhpPostupClient\Utilities\Validator;

/**
 * ListSubscription
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class ListSubscription extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/listsubscription/';

    /**
     * Summary. Subscribes a recipient to a list
     * 
     * Description.
     * 
     * @param int    $recipient_id  - Unique number assigned to every record.
     * @param int    $list_id       - Unique number assigned to each list in the 
     *                              system.
     * @param string $status        - Subscribed = "NORMAL" and 
     *                              Unsubscribed = "UNSUB"
     * @param string $list_status   - Current list level subscription status 
     *                              returned in the response.
     * @param string $global_status - Current database level (global) subscription 
     *                              status returned in the response.
     * @param string $source_id     - Description of where the recipient signed up 
     *                              for this list.
     * @param string $confirmed     - Confirmed = "true" or Unconfirmed = "false"
     *
     * @return object The API response object
     */
    function subscribe(
        int $recipient_id,
        int $list_id,
        string $status,
        string $list_status = null,
        string $global_status = null,
        string $source_id = null,
        string $confirmed = null 
    ) { 
        Validator::oneOf($status, [ 'NORMAL', 'UNSUB' ]);
        Validator::oneOf($confirmed, [ 'true', 'false' ], false);

        return $this->client->request(
            'POST',
            self::ENDPOINT_URL,
            [ 
                'recipientId'  => $recipient_id,
                'listId'       => $list_id,
                'status'       => $status,
                'listStatus'   => $list_status,
                'globalStatus' => $global_status,
                'sourceId'     => $source_id,
                'confirmed'    => $confirmed,
            ]
        );
    }

    /**
     * Summary. Unsubscribes a recipient from a list
     * 
     * Description.
     * 
     * @param int    $recipient_id - Unique number assigned to every record.
     * @param int    $list_id      - Unique number assigned to each list in 
     *                             the system.
     * @param string $status       - Subscribed = "NORMAL" and 
     *                             Unsubscribed = "UNSUB"
     * @param string $mailing_id   - The unique ID of the mailing from which the 
     *                             user unsubscribed.
     *
     * @return object The API response object
     */
    function unsubscribe(
        int $recipient_id,
        int $list_id,
        string $status,
        string $mailing_id = null 
    ) { 
        Validator::oneOf($status, [ 'NORMAL', 'UNSUB' ]);

        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL,
            [
                'recipientId' => $recipient_id,
                'listId'      => $list_id,
                'status'      => $status,
                'mailingId'   => $mailing_id,
            ]
        );
    }

    /**
     * Summary. Checks if a recipient is subscribed
     * 
     * Description. 
     *
     * @param int $recipient_id - Unique number assigned to every record.
     * @param int $list_id      - Unique number assigned to each list in the system.
     * 
     * @return object The API response object
     */
    function isSubscribed( int $recipient_id, int $list_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$list_id}/{$recipient_id}"
        );
    }

    /**
     * Summary. Returns a recipients subscriptions
     * 
     * Description. 
     *
     * @param int $recipient_id - Unique number assigned to every record.
     * 
     * @return object The API response object
     */
    function getRecipientSubscriptions( int $recipient_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'recipid' => $recipient_id ])
        );
    }

    /**
     * Summary. Returns a list's subscribers
     * 
     * Description. 
     * In order to paginate through the results you should start with an initial call
     * of listsubscription?listid={id}&limit={value}&lastrecipid=0&lastlistid={id}. 
     * This will return the first batch of records per the limit set sorted 
     * by the PostUp recipient ID. The lastlistid and listid will need to be 
     * the same. The lastrecipid set at 0.
     * 
     * Subsequent calls should then be made with the following path: 
     * listsubscription?listid={id}&limit={value}&lastrecipid={id}&lastlistid={id}.
     *
     * @param int $list_id       - Unique number assigned to each list in the system.
     * @param int $limit         - Number of recipient records to be included in 
     *                           the array.
     * @param int $last_recip_id - Used in pagination. The last recipient id in 
     *                           the previous call.
     * @param int $last_list_id  - Used in pagination. Same as listid.
     * 
     * @return object The API response object
     */
    function getSubscribers( 
        int $list_id,
        int $limit = null,
        int $last_recip_id = null,
        int $last_list_id = null 
    ) { 
        return $this->client->request( 
            'GET', 
            self::ENDPOINT_URL . ( isset($limit, $last_recip_id, $last_list_id) 
            ? $this->buildQuery(
                [ 
                    'listid'      => $list_id,
                    'limit'       => $limit,
                    'lastrecipid' => $last_recip_id,
                    'lastlistid'  => $last_list_id
                ]
            )
            : $this->buildQuery([ 'listid' => $list_id ]))
        );
    }
}
