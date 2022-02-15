<?php

/**
 * CustomField
 *
 * Responsible for working with custom field related API calls. Has functions to 
 * created, update and retrieve custom fields.
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
 * CustomField
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class CustomField extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/customfield/';

    /**
     * Summary. Creates a new custom field.
     * 
     * Description.
     * 
     * Note: Field name should not contain spaces.
     * 
     * Possible Field Types:
     * ---------------------
     * 'SINGLE_CHARACTER',
     * 'TEXT_SHORT',
     * 'TEXT_MEDIUM',
     * 'TEXT_LONG',
     * 'WHOLE_NUMBER',
     * 'BIG_INTEGER',
     * 'DECIMAL_NUMBER',
     * 'CURRENCY',
     * 'DATE_TIME',
     * 'BIT',
     * 'YES_NO',
     *
     * @param int    $custom_field_id - Unique number assigned to each custom field
     * @param string $title           - The name of the field that will appear in 
     *                                the user interface
     * @param bool   $active          - Determines if the field will be visible 
     *                                when importing data
     * @param string $type            - Type will default to nvarchar(255) if 
     *                                not specified
     * 
     * @return object The API response object
     */
    function create( 
        int $custom_field_id,
        string $title,
        bool $active,
        string $type = null 
    ) {
        Validator::oneOf($active, [ 1, 0 ], false);
        Validator::oneOf(
            $type, 
            [ 
                'SINGLE_CHARACTER',
                'TEXT_SHORT',
                'TEXT_MEDIUM',
                'TEXT_LONG',
                'WHOLE_NUMBER',
                'BIG_INTEGER',
                'DECIMAL_NUMBER',
                'CURRENCY',
                'DATE_TIME',
                'BIT',
                'YES_NO',
            ],
            false
        );

        return $this->client->request(
            'POST',
            self::ENDPOINT_URL, [ 
                'customFieldId' => $custom_field_id,
                'title'         => $title,
                'active'        => $active,
                'type'          => $type,
            ]
        );
    }
  
    /**
     * Summary. Updates an existing custom field
     * 
     * Description.
     * 
     * Note: Field name should not contain spaces
     * 
     * Possible Field Types:
     * ---------------------
     * 'SINGLE_CHARACTER',
     * 'TEXT_SHORT',
     * 'TEXT_MEDIUM',
     * 'TEXT_LONG',
     * 'WHOLE_NUMBER',
     * 'BIG_INTEGER',
     * 'DECIMAL_NUMBER',
     * 'CURRENCY',
     * 'DATE_TIME',
     * 'BIT',
     * 'YES_NO',
     *
     * @param int    $custom_field_id - Unique number assigned to each custom field
     * @param string $title           - The name of the field that will appear in 
     *                                the user interface
     * @param bool   $active          - Determines if the field will be visible 
     *                                when importing data
     * @param string $type            - Type will default to nvarchar(255) if 
     *                                not specified
     * 
     * @return object The API response object
     */
    function update( 
        int $custom_field_id,
        string $title,
        bool $active,
        string $type = null 
    ) {
        Validator::oneOf($active, [ 1, 0 ], false);
        Validator::oneOf(
            $type, 
            [ 
                'SINGLE_CHARACTER',
                'TEXT_SHORT',
                'TEXT_MEDIUM',
                'TEXT_LONG',
                'WHOLE_NUMBER',
                'BIG_INTEGER',
                'DECIMAL_NUMBER',
                'CURRENCY',
                'DATE_TIME',
                'BIT',
                'YES_NO',
            ],
            false 
        );

        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL . strval($custom_field_id), 
            [ 
                'customFieldId' => $custom_field_id,
                'title'         => $title,
                'active'        => $active,
                'type'          => $type,
            ]
        );
    }
  
    /**
     * Summary. Return a single custom field
     * 
     * Description.
     *
     * @param int $custom_field_id - Unique number assigned to each custom field.
     * 
     * @return object The API response object
     */
    function getSingle( int $custom_field_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$custom_field_id}"
        );
    }

    /**
     * Summary. Return all custom fields
     * 
     * Description.
     *
     * @return object The API response object
     */
    function getAll()
    {
        return $this->client->request(
            'GET', self::ENDPOINT_URL
        );
    }
}
