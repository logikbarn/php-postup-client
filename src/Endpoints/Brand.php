<?php

/**
 * Brand
 *
 * Responsible for working with brand related API calls. Has two methods to get a
 * single or all brands.
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
 * Brand
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class Brand extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/brand/';

    /**
     * Summary. Return a single brand
     *
     * @param int $brand_id - ID of the brand in PostUp.
     * 
     * @return object The API response object
     */
    public function getSingle( int $brand_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery(
                [
                    'brandId' => $brand_id,
                ]
            )
        );
    }

    /**
     * Summary. Return all brands
     *
     * @return object The API response object
     */
    public function getAll()
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL
        );
    }
}
