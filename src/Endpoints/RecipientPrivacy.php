<?php

/**
 * Recipient privacy endpoint functions
 *
 * Responsible for handling recipient privacy related endpoint REST API calls
 * and functionality.
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
 * RecipientPrivacy
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class RecipientPrivacy extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/recipient/privacy/';
    
    /**
     * Summary. Deletes a recipients privacy data
     * 
     * Description.
     *
     * @param string $address - Email address of the recipient for which you wish to 
     *                        delete data.
     * @param string $scope   - Defines the recipient data to be deleted.
     * 
     * @return object The API response object
     */
    function delete( string $address, string $scope )
    {
        Validator::oneOf(
            $scope,
            [ 
                'all',
                'forget',
                'location',
                'contact',
                'demographics',
                'origin'
            ]
        );

        return $this->client->request(
            'DELETE', self::ENDPOINT_URL . $this->buildQuery(
                [
                    'address' => $address,
                    'scope'   => $scope,
                ]
            )
        );
    }
  
    /**
     * Summary. Finds user based on id
     * 
     * Description.
     *
     * @param int $recipient_id - The recipients id
     * 
     * @return object The API response object
     */
    function getById( int $recipient_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$recipient_id}"
        );
    }

    /**
     * Summary. Finds user based on email
     * 
     * Description.
     *
     * @param string $address - The recipients email address
     * 
     * @return object The API response object
     */
    function getByEmail( string $address )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'address' => $address ])
        );
    }
}
