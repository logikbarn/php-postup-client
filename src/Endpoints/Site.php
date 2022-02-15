<?php

/**
 * Site
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
 * Site
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class Site extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/site/';

    /**
     * Summary. Return a single brand
     *
     * @param string $title   - Title of the PostUp site.
     * @param string $status  - Current status of the site.
     * @param string $version - Current version of the PostUp software.
     * 
     * @return object The API response object
     */
    public function getStatus( string $title, string $status, string $version )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery(
                [
                    'title'   => $title,
                    'status'  => $status,
                    'version' => $version,
                ]
            )
        );
    }
}
