<?php

/**
 * Api
 *
 * The base API class that is extended from the client. All API related config 
 * options should go here.
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

namespace Logikbarn\PhpPostupClient;

use Logikbarn\PhpPostupClient\Utilities\Formatter;
use Logikbarn\PhpPostupClient\Utilities\Validator;

/**
 * Api
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Api
{
    const LIBVER        = '1.0.0';
    const API_BASE_PATH = 'https://api.postup.com/api';
  
    /**
     * Base64 encoded username & password
     *
     * @var string
     */
    private $_token;
    
    /**
     * Summary. Encodes authentication header
     * 
     * Description.
     *
     * @param string $username - API Username
     * @param string $password - API Password
     * 
     * @return void
     */
    public function setCredentials( string $username, string $password )
    {
        $this->_token = base64_encode("$username:$password");
    }
  
    /**
     * Summary. Creates the request header
     *
     * @return array The header to use in cURL
     */
    public function setHeaders()
    {
        return [
            'Accept: application/json',
            'Content-Type: application/json',
            'authorization: Basic ' . $this->_token,
        ];
    }
  
    /**
     * Summary. Cleans unused vars from the body
     * 
     * Description.
     *
     * @param array $body - The raw request object
     * 
     * @return array $body - The formatted body
     */
    public function cleanBody( array $body )
    {
        foreach ( $body as $key => $val ) {
            if (!isset($val) ) {
                unset($body[$key]);
            }
        }

        return $body;
    }
  
    /**
     * Summary. The API call function
     * 
     * Description.
     *
     * @param string $method   - The http method verb
     * @param string $endpoint - The endpoint URL
     * @param array  $body     - Params / post body
     * 
     * @return object $response - The API response object
     */
    public function request( string $method, string $endpoint, array $body = [] )
    {
        $ch   = curl_init(self::API_BASE_PATH . $endpoint);
        $body = $this->cleanBody($body);

        // Set method
        $method !== 'POST' 
            ? curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method) 
            : curl_setopt($ch, CURLOPT_POST, 1);

        // Set body
        !empty($body) 
            ? curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body))
            : null;

        // User agent
        curl_setopt($ch, CURLOPT_USERAGENT, 'PostUpApiWrapper/1.0');

        // Return response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        // Set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->setHeaders());

        // Save response
        $response = curl_exec($ch);

        // Throw a server error if unable to connect
        if ($response === false ) {
            throw new Exceptions\ValidatorException(
                'Unable to connect to PostUp', 
                500
            );
        }

        // Close request
        curl_close($ch);

        // Validate the JSON
        Validator::validJson($response);

        // Decode and format
        $response = json_decode($response, true);
        $response = Formatter::responseToObject($response);

        return $response;
    }
}
