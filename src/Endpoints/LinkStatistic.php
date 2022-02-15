<?php

/**
 * LinkStatistic
 *
 * Responsible for working with sites related API calls. Has a single method to
 * return site status information
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

/**
 * LinkStatistic
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class LinkStatistic extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/linkstatistics/';

    /**
     * Summary. Return a single brand
     *
     * @param int $mailing_id - Title of the PostUp site.
     * 
     * @return object The API response object
     */
    public function getByMailing( int $mailing_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery(
                [
                    'mailingId'   => $mailing_id,
                ]
            )
        );
    }
}
