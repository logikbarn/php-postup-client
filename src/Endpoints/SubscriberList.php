<?php

/**
 * SubscriberList
 *
 * Responsible for working with list related API data. Has functions to 
 * create, update and retrive various lists
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
 * SubscriberList
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class SubscriberList extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/list/';

    /**
     * Summary. Creates a new list
     * 
     * Description.
     * 
     * @param string $title             - The name of the list that should appear
     *                                  in the PostUp user interface
     * @param bool   $populated         - Determines if the list will be a Standard 
     *                                  or Query list. true=Standard and false=Query
     * @param bool   $public_signup     - Determines if list should allow signups 
     *                                  via system generated links like One-Click 
     *                                  Signup and Forward-to-a-Friend
     * @param bool   $global_unsub      - Determines the default behavior for 
     *                                  unsubscribe processing - global vs. list only
     * @param string $channel           - Email=E, SMS=S, Push=P
     * @param bool   $count_recips      - Designates if 'Preview' should be 
     *                                  available for this list
     * @param int    $list_id           - Unique number assigned to each list in 
     *                                  the system
     * @param string $friendly_title    - Optional subscriber facing name of the list
     * @param string $description       - Short description to identify the 
     *                                  purpose of the list
     * @param string $query             - Optional query if list is populated
     * @param int    $category_id       - ID of the list category applied to the list
     * @param array  $block_domains     - Domains of the ISPs that should be 
     *                                  suppressed when targeting this list
     * @param int    $seed_list_id      - ID of existing mailing list that should be 
     *                                  assigned as a seed list
     * @param string $create_time       - Timestamp for when the list was created
     * @param string $external_id       - Optional field open to client information
     * @param string $custom1           - Optional field open to client information
     * @param bool   $test_message_list - Designates whether the list should be 
     *                                  available as a test list during the mailing 
     *                                  creation process
     * @param array  $brand_ids         - Array of unique numbers assigned to the 
     *                                  brands in the system. The list will be 
     *                                  available to mail when one of these brands 
     *                                  is selected in the mailing options
     *
     * @return object The API response object
     */
    function create(
        string $title,
        bool   $populated,
        bool   $public_signup,
        bool   $global_unsub,
        string $channel,
        bool   $count_recips,
        int    $list_id = null,
        string $friendly_title = null,
        string $description = null,
        string $query = null,
        int    $category_id = null,
        array  $block_domains = null,
        int    $seed_list_id = null,
        string $create_time = null,
        string $external_id = null,
        string $custom1 = null,
        bool   $test_message_list = null,
        array  $brand_ids = null 
    ) { 
        return $this->client->request(
            'POST', self::ENDPOINT_URL, [ 
            'listId'          => $list_id,
            'title'           => $title,
            'populated'       => $populated,
            'publicSignup'    => $public_signup,
            'globalUnsub'     => $global_unsub,
            'channel'         => $channel,
            'countRecips'     => $count_recips,
            'friendlyTitle'   => $friendly_title,
            'description'     => $description,
            'query'           => $query,
            'categoryId'      => $category_id,
            'blockDomains'    => \implode(' ', $block_domains),
            'createTime'      => $create_time,
            'seedListId'      => $seed_list_id,
            'externalId'      => $external_id,
            'custom1'         => $custom1,
            'testMessageList' => $test_message_list,
            'brandIds'        => $brand_ids,
            ]
        );
    }

    /**
     * Summary. Updates an existing list
     * 
     * Description.
     * 
     * @param int    $list_id           - Unique number assigned to each list in 
     *                                  the system
     * @param string $title             - The name of the list that should appear 
     *                                  in the PostUp user interface
     * @param bool   $populated         - Determines if the list will be a Standard 
     *                                  or Query list. true=Standard and false=Query
     * @param bool   $public_signup     - Determines if list should allow signups 
     *                                  via system generated links like One-Click 
     *                                  Signup and Forward-to-a-Friend.
     * @param bool   $global_unsub      - Determines the default behavior for 
     *                                  unsubscribe processing - global vs. list only
     * @param string $channel           - Email=E, SMS=S, Push=P
     * @param bool   $count_recips      - Designates if 'Preview' should be available
     *                                  for this list
     * @param string $friendly_title    - Optional subscriber facing name of the list
     * @param string $description       - Short description to identify the purpose
     *                                  of the list
     * @param string $query             - Optional query if list is populated.
     * @param int    $category_id       - ID of the list category applied to the list
     * @param array  $block_domains     - Domains of the ISPs that should be 
     *                                  suppressed when targeting this list
     * @param int    $seed_list_id      - ID of existing mailing list that should be
     *                                  assigned as a seed list
     * @param string $create_time       - Timestamp for when the list was created
     * @param string $external_id       - Optional field open to client information
     * @param string $custom1           - Optional field open to client information
     * @param bool   $test_message_list - Designates whether the list should be
     *                                  available as a test list during the mailing
     *                                  creation process
     * @param array  $brand_ids         - Array of unique numbers assigned to the 
     *                                  brands in the system. The list will be 
     *                                  available to mail when one of these brands
     *                                  is selected in the mailing options.  
     *
     * @return object The API response object
     */
    function update(
        int    $list_id,
        string $title,
        bool   $populated,
        bool   $public_signup,
        bool   $global_unsub,
        string $channel,
        bool   $count_recips,
        string $friendly_title = null,
        string $description = null,
        string $query = null,
        int    $category_id = null,
        array  $block_domains = null,
        int    $seed_list_id = null,
        string $create_time = null,
        string $external_id = null,
        string $custom1 = null,
        bool   $test_message_list = null,
        array  $brand_ids = null 
    ) { 
        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);

        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL,
            [ 
                'listId'          => $list_id,
                'title'           => $title,
                'populated'       => $populated,
                'publicSignup'    => $public_signup,
                'globalUnsub'     => $global_unsub,
                'channel'         => $channel,
                'countRecips'     => $count_recips,
                'friendlyTitle'   => $friendly_title,
                'description'     => $description,
                'query'           => $query,
                'categoryId'      => $category_id,
                'blockDomains'    => \implode(' ', $block_domains),
                'seedListId'      => $seed_list_id,
                'createTime'      => $create_time,
                'externalId'      => $external_id,
                'custom1'         => $custom1,
                'testMessageList' => $test_message_list,
                'brandIds'        => $brand_ids,
            ]
        );
    }

    /**
     * Summary. Returns an existing list
     * 
     * Description. 
     *
     * @param int $list_id - Unique number assigned to each list in the system.
     * 
     * @return object The API response object
     */
    function getById( int $list_id )
    {
        return $this->client->request(
            'GET', self::ENDPOINT_URL . "{$list_id}"
        );
    }

    /**
     * Summary. Returns an existing list
     * 
     * Description. 
     *
     * @param int $brand_id - Unique number assigned to each brand in PostUp.
     * 
     * @return object The API response object
     */
    function getByBrand( int $brand_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'brandid' => $brand_id ])
        );
    }
  
    /**
     * Summary. Returns list count
     * 
     * Description. 
     *
     * @param int $list_id - Unique number assigned to each list in the system.
     * 
     * @return object The API response object
     */
    function getCounts( int $list_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$list_id}/counts"
        );
    }

    /**
     * Summary. Chain method for subscriptions
     * 
     * Description.
     *
     * @return object The API response object
     */
    function subscriptions()
    {
        return new ListSubscription($this->client);
    }
}
