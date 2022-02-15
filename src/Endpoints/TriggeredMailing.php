<?php

/**
 * TriggeredMailing
 *
 * Responsible for working with the triggered mailings related API calls.
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
 * TriggeredMailing
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class TriggeredMailing extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/templatemailing/';

    /**
     * Summary. Send a test mailing
     *
     * @param int     $send_template_id - Unique number assigned to each send 
     *                                  template
     * @param array   $recipients       - Recipients who should receive the mailing.
     * @param Mailing $content          - Mailing content object
     * 
     * @return object The API response object
     */
    public function send( 
        int $send_template_id,
        array $recipients,
        Mailing $content = null 
    ) {

        foreach ( $recipients as $r ) {
            Validator::typeOf($r, [ 'Logikbarn\PhpPostupClient\Content\Recipient' ]);
        }

        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL, 
            [
                'sendTemplateId' => $send_template_id,
                'recipients'     => array_map(
                    function ($k) {
                        return $k->getContent();
                    }, $recipients
                ),
                'content'        => $content,
            ]
        );
    }
}
