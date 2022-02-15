<?php

/**
 * SendTemplate
 *
 * Responsible for working with test mailings related API calls. This class has one
 * function to send test mailings from a draft.
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
use Logikbarn\PhpPostupClient\Content\Mailing;

/**
 * SendTemplate
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class SendTemplate extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/sendtemplate/';

    /**
     * Summary. Get send template by id
     *
     * @param string  $title              - Title of the send template that will 
     *                                    appear in the user interface.
     * @param int     $brand_id           - The brand id
     * @param int     $campaign_id        - Unique number for the campaign to which 
     *                                    the send template should be assigned
     * @param string  $channel            - Email=E, SMS=S, Push=P
     * @param Mailing $content            - Table provided below.
     * @param int     $send_template_id   - Unique number assigned to each send 
     *                                    template
     * @param int     $category_id        - Unique number for the category that 
     *                                    should be applied to the template
     * @param bool    $allow_unsub        - Defines whether the send template should
     *                                    deploy to recips in an UNSUB status.
     * @param bool    $allow_held_blocked - Defines whether the send template should 
     *                                    deploy to recips in a HELD or 
     *                                    BLOCKED status.
     * 
     * @return object The API response object
     */
    public function create( 
        string $title,
        int    $brand_id,
        int    $campaign_id,
        string $channel,
        Mailing $content,
        int    $send_template_id   = null,
        int    $category_id        = null,
        bool   $allow_unsub        = null,
        bool   $allow_held_blocked = null
    ) {
        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);

        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL, 
            [ 
                'title'                             => $title,
                'brandId'                           => $brand_id,
                'campaignId'                        => $campaign_id,
                'channel'                           => $channel,
                'content'                           => $content->getContent(),
                'sendTemplateId'                    => $send_template_id,
                'categoryId'                        => $category_id,
                'allowTriggeredUnsubSends'          => $allow_unsub,
                'allowTriggeredHeldAndBlockedSends' => $allow_held_blocked,
            ]
        );
    }

    /**
     * Summary. Get send template by id
     *
     * @param int     $send_template_id   - Unique number assigned to each send 
     *                                    template
     * @param string  $title              - Title of the send template that will 
     *                                    appear in the user interface.
     * @param string  $brand_id           - The brand id
     * @param int     $campaign_id        - Unique number for the campaign to which 
     *                                    the send template should be assigned
     * @param string  $channel            - Email=E, SMS=S, Push=P
     * @param Mailing $content            - Table provided below.
     * @param int     $category_id        - Unique number for the category that 
     *                                    should be applied to the template
     * @param bool    $allow_unsub        - Defines whether the send template should
     *                                    deploy to recips in an UNSUB status.
     * @param bool    $allow_held_blocked - Defines whether the send template should 
     *                                    deploy to recips in a HELD or 
     *                                    BLOCKED status.
     * 
     * @return object The API response object
     */
    public function update( 
        int    $send_template_id,
        string $title              = null,
        string $brand_id           = null,
        int    $campaign_id        = null,
        string $channel            = null,
        Mailing $content           = null,
        int    $category_id        = null,
        bool   $allow_unsub        = null,
        bool   $allow_held_blocked = null
    ) {
        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);

        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL . $send_template_id, 
            [ 
                'title'                             => $title,
                'brandId'                           => $brand_id,
                'campaignId'                        => $campaign_id,
                'channel'                           => $channel,
                'content'                           => $content->getContent(),
                'sendTemplateId'                    => $send_template_id,
                'categoryId'                        => $category_id,
                'allowTriggeredUnsubSends'          => $allow_unsub,
                'allowTriggeredHeldAndBlockedSends' => $allow_held_blocked,
            ]
        );
    }
    
    /**
     * Summary. Get send template by id
     *
     * @param int $send_template_id - Unique number assigned to each send template
     * 
     * @return object The API response object
     */
    public function getById( int $send_template_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$send_template_id}"
        );
    }

    /**
     * Summary. Get send template by channel
     *
     * @param string $channel - Email=E, SMS=S, Push=P
     * 
     * @return object The API response object
     */
    public function getByChannel( string $channel )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'channel' => $channel ])
        );
    }

    /**
     * Summary. Get all send templates
     *
     * @param int $limit - How many send templates will be returned.
     * 
     * @return object The API response object
     */
    public function getAll( int $limit )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'limit' => $limit ])
        );
    }
    
}
