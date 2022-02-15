<?php

/**
 * ContentFolder
 *
 * Responsible for working with content folder related API calls. Has one function
 * to create folders
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
 * ContentFolder
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class ContentFolder extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/contentfolder/';

    /**
     * Summary. Create content folder in CMS
     *
     * @param string $path - Directory path to access the content in the 
     *                     Content Manager
     * 
     * @return object The API response object
     */
    public function create( string $path )
    {
        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL, 
            [ 'path' => $path ]
        );
    }
}
