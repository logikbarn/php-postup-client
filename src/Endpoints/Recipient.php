<?php

/**
 * Recipient endpoint functions
 *
 * Responsible for handling recipient endpoint REST api calls and functionality.
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

use Logikbarn\PhpPostupClient\Utilities\Formatter;
use Logikbarn\PhpPostupClient\Utilities\Validator;
use Logikbarn\PhpPostupClient\Endpoints\RecipientPrivacy;

/**
 * Recipient
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class Recipient extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/recipient/';
    
    /**
     * Summary. Creates a new recipient.
     * 
     * Description.
     * 
     * Global Statuses:
     * "N" for Normal, "U" for Unsubscribe, "H" for Held.
     *
     * @param string $address                 - Email Address of the recipient.
     * @param string $external_id             - Unique value assigned to each record 
     *                                        by the client.
     * @param string $channel                 - Email=E, SMS=S, Push=P
     * @param int    $recipient_id            - Unique num assigned to every record.
     * @param string $status                  - Global status of the recipient.
     * @param string $source_description      - Description of where the recipient 
     *                                        signed up.
     * @param string $signup_ip               - IP where the record signed up.
     * @param string $third_party_source      - Third Party the recipient should be 
     *                                        attributed to.
     * @param object $third_party_signup_date - Date the recipient signed up 
     *                                        with the third party.
     * @param array  $demographics            - Array of "key=value" pairs to update 
     *                                        recip. fields. The arr should include
     *                                        both standard and custom fields.     
     * @param string $password                - User password (not defined in API)
     * 
     * @return object The API response object
     */
    function create( 
        string $address,
        string $external_id,
        string $channel,
        int $recipient_id               = null,
        string $status                  = null,
        string $source_description      = null,
        string $signup_ip               = null,
        string $third_party_source      = null,
        object $third_party_signup_date = null,
        array $demographics             = null,
        string $password                = null 
    ) {
        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);
        Validator::oneOf($status, [ 'N', 'U', 'H' ], false);
        Validator::isDate($third_party_signup_date, false);

        if (isset($demographics) ) {
            $demographics = Formatter::demographicsToString($demographics);
        }

        return $this->client->request(
            'POST', self::ENDPOINT_URL, [ 
            'recipientId'          => $recipient_id,
            'address'              => $address,
            'externalId'           => $external_id,
            'channel'              => $channel,
            'status'               => $status,
            'sourceDescription'    => $source_description,
            'signupIP'             => $signup_ip,
            'thirdPartySource'     => $third_party_source,
            'thirdPartySignupDate' => $third_party_signup_date->format(
                'Y-m-d\TH:i:s\Z'
            ),
            'demographics'         => $demographics,
            'password'             => $password,
            ]
        );
    }
  
    /**
     * Summary. Updates en existing recipient.
     * 
     * Description.
     *
     * Global Statuses:
     * "N" for Normal, "U" for Unsubscribe, "H" for Held.
     *
     * @param int    $recipient_id            - Unique num assigned to every record.
     * @param string $address                 - Email Address of the recipient.
     * @param string $external_id             - Unique value assigned to each record
     *                                        by the client.
     * @param string $channel                 - Email=E, SMS=S, Push=P
     * @param string $status                  - Global status of the recipient.
     * @param string $source_description      - Description of where the recipient 
     *                                        signed up.
     * @param string $signup_ip               - IP where the record signed up.
     * @param string $third_party_source      - Third Party the recipient should be 
     *                                        attributed to.
     * @param object $third_party_signup_date - Date the recipient signed up 
     *                                        with the third party.
     * @param string $resubscribe             - Value of "true" will reverse global 
     *                                        status to Normal, if member is 
     *                                        currently in Global Status of UNSUB 
     *                                        or HELD. Global Status of OPTOUT is 
     *                                        permanent and cannot be reversed 
     *                                        through parameter.
     * @param array  $demographics            - Array of "key=value" pairs to update 
     *                                        recip. fields. The arr should include
     *                                        both standard and custom fields.       
     * @param string $password                - User password (not defined in API)
     * 
     * @return object The API response object
     */
    function update( 
        int $recipient_id,
        string $address                 = null,
        string $external_id             = null,
        string $channel                 = null,
        string $status                  = null,
        string $source_description      = null,
        string $signup_ip               = null,
        string $third_party_source      = null,
        object $third_party_signup_date = null,
        string $resubscribe             = null,
        array $demographics             = null,
        string $password                = null 
    ) {
        Validator::oneOf($channel, [ 'E', 'S', 'P' ], false);
        Validator::oneOf($status, [ 'N', 'U', 'H' ], false);
        Validator::isDate($third_party_signup_date, false);

        if (isset($demographics) ) {
            $demographics = Formatter::demographicsToString($demographics);
        }

        return $this->client->request(
            'PUT', self::ENDPOINT_URL . strval($recipient_id), [ 
            'address'              => $address,
            'externalId'           => $external_id,
            'channel'              => $channel,
            'status'               => $status,
            'sourceDescription'    => $source_description,
            'signupIP'             => $signup_ip,
            'thirdPartySource'     => $third_party_source,
            'thirdPartySignupDate' => $third_party_signup_date->format(
                'Y-m-d\TH:i:s\Z'
            ),
            'password'             => $password,
            'resubscribe'          => $resubscribe,
            'demographics'         => $demographics,
            'password'             => $password,
            ]
        );
    }
  
    /**
     * Summary. Finds user(s) based on id
     * 
     * Description.
     *
     * @param int $recipient_id The recipients id
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
     * Summary. Finds user(s) based on external id
     * 
     * Description.
     *
     * @param string $external_id The recipients external_id
     * 
     * @return object The API response object
     */
    function getByExternalId( string $external_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'externalId' => $external_id ])
        );
    }

    /**
     * Summary. Finds user(s) based on email address
     * 
     * Description.
     *
     * @param string $address The recipients email address
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
  
    /**
     * Summary. Chain method for RecipientPrivacy
     * 
     * Description.
     *
     * @return RecipientPrivacy
     */
    function privacyData()
    {
        return new RecipientPrivacy($this->client);
    }
}
