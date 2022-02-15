<?php

/**
 * Endpoint
 *
 * The base class used for common functionality across all endpoints
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

use Logikbarn\PhpPostupClient\Client;

/**
 * Endpoint
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Endpoint
{
    /**
     * The api client
     *
     * @var mixed
     */
    public $client;
      
    /**
     * T
     *
     * @param Client $client - The client class that is used throughout
     * 
     * @return void
     */
    function __construct( Client $client )
    {
        $this->client = $client;
    }
    
    /**
     * Summary. Simple build query params.
     *
     * @param array $data - The array of params to build
     * 
     * @return void
     */
    function buildQuery( array $data )
    {
        return "?" . \http_build_query($data);
    }
}