<?php

/**
 * Content
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

use Logikbarn\PhpPostupClient\Utilities\Validator;
use Logikbarn\PhpPostupClient\Endpoints\ContentFolder;

/**
 * Content
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class Content extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/content/';

    /**
     * Summary. Create content folder in CMS
     * 
     * Descripition.
     *
     * @param string $data    - Content to be created
     * @param string $name    - Name of the content asset
     * @param string $path    - Directory path to access the content in the 
     *                        Content Manager
     * @param string $creator - Email address of who created this content
     * @param string $type    - "HTML" or "TEXT"
     * 
     * @return object The API response object
     */
    public function create( 
        string $data,
        string $name,
        string $path,
        string $creator,
        string $type = null 
    ) {
        Validator::oneOf($type, [ 'HTML', 'TEXT' ], false);

        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL . [ 
                'data'    => $data,
                'name'    => $name,
                'path'    => $path,
                'creator' => $creator,
                'type'    => $type,
            ]
        );
    }

    /**
     * Summary. Update existing content
     * 
     * Description.
     *
     * @param string $data    - Content to be created/updated
     * @param string $name    - Name of the content asset
     * @param string $path    - Directory path to access the content in the 
     *                        Content Manager
     * @param string $creator - Email address of who created this content
     * @param string $type    - "HTML" or "TEXT"
     * 
     * @return object The API response object
     */
    public function update( 
        string $data,
        string $name,
        string $path,
        string $creator,
        string $type = null 
    ) {
        Validator::oneOf($type, [ 'HTML', 'TEXT' ], false);

        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL . [ 
                'data'     => $data,
                'filename' => $name,
                'path'     => $path,
                'creator'  => $creator,
                'type'     => $type,
            ]
        );
    }

    /**
     * Summary. Retrieve existing content
     * 
     * Description.
     *
     * @param string $path - Directory path to access the content in the 
     *                     Content Manager
     * 
     * @return object The API response object
     */
    public function getPath( string $path = null )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'path' => $path ])
        );
    }

    /**
     * Summary. Retrieve existing content
     * 
     * Description.
     *
     * @param string $filename - The name of the content file
     * 
     * @return object The API response object
     */
    public function getFilename( string $filename )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'filename' => $filename ])
        );
    }

    /**
     * Summary. Chain method for ContentFolder
     * 
     * Description.
     *
     * @return ContentFolder
     */
    function folder()
    {
        return new ContentFolder($this->client);
    }
}
