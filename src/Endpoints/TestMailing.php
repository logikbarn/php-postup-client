<?php

/**
 * TestMailing
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

/**
 * TestMailing
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class TestMailing extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/testmailing/';

    /**
     * Summary. Send a test mailing
     *
     * @param int    $mailing_id - Descriptive title of this campaign
     * @param array  $addresses  - Array of email addresses 
     * @param string $part       - "TEXT", "HTML" or blank.
     * 
     * @return object The API response object
     */
    public function send( int $mailing_id, array $addresses, string $part = null )
    {
        Validator::oneOf($part, [ 'TEXT', 'HTML' ], false);
        
        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL, 
            [
                'mailingId' => $mailing_id,
                'addresses' => $addresses,
                'part'      => $part,
            ]
        );
    }
}
