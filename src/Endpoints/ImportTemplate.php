<?php

/**
 * ImportTemplate
 *
 * Responsible for working with import template related API data. Has functions to 
 * create, update and retrive various import templates.
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
 * ImportTemplate
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class ImportTemplate extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/importtemplate/';

    /**
     * Summary. Create a import template
     * 
     * Description.
     * 
     * @param string $title                - Title of the import template that 
     *                                     will appear in the user interface
     * @param string $type                 - The type of import to be performed. 
     *                                     "NORMAL" for new and updated records. 
     *                                     "UNSUB" for unsubscribes
     * @param string $delimiter            - PostUp supports the following 
     *                                     delimiters "Comma Separated", 
     *                                     "Semicolon Separated", "Tab Delimited", 
     *                                     and "Pipe Delimited"
     * @param string $column_names         - Names of the fields that will be
     *                                     imported and in what order they will 
     *                                     appear. "Recips.ADDRESS" is required.
     * @param string $channel              - Email=E, SMS=S, Push=P
     * @param int    $import_template_id   - ID of the import template.
     * @param int    $active               - Designates if the importtemplate is 
     *                                     active or not.
     * @param bool   $confirmed            - Designates if users should be imported
     *                                     in a "Confirmed" status because they went
     *                                     through a double opt-in 
     *                                     registration process.
     * @param int    $send_template_id     - ID of the send template that should be
     *                                     sent to the imported members
     * @param string $source_description   - Description of where the recipient 
     *                                     record was obtained. Will be assigned to
     *                                     all imported records unless specified in 
     *                                     the data array.
     * @param string $signup_method        - Description of how records were imported
     *                                     into the system. Normally specified as 
     *                                     "Web Import".
     * @param array  $list_ids             - Lists users will be subscribed to or 
     *                                     unsubscribed from.
     * @param array  $purge_list_ids       - Lists to purge against during import.
     * @param array  $suppression_list_ids - Suppression lists to purge against 
     *                                     during import.
     * @param string $watch_directory      - Location of watch directory for
     *                                     automated imports via SFTP.
     * 
     * @see https://apidocs.postup.com/docs/create-an-import-template-1
     * 
     * @return object The API response object
     */
    function create(
        string $title,
        string $type,
        string $delimiter,
        string $column_names,
        string $channel,
        int $import_template_id     = null,
        int $active                 = null,
        bool $confirmed             = null,
        int $send_template_id       = null,
        string $source_description  = null,
        string $signup_method       = null,
        array $list_ids             = null,
        array $purge_list_ids       = null,
        array $suppression_list_ids = null,
        string $watch_directory     = null 
    ) {
        Validator::oneOf(
            $delimiter, 
            [ 
                'Comma Separated', 
                'Semicolon Separated', 
                'Tab Delimited', 
                'Pipe Delimited"' 
            ]
        );
        
        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);
        Validator::oneOf($active, [ 1, 0 ], false);

        return $this->client->request(
            'POST',
            self::ENDPOINT_URL,
            [
                'importTemplateId'   => $import_template_id,
                'title'              => $title,
                'type'               => $type,
                'delimiter'          => $delimiter,
                'columnNames'        => $column_names,
                'channel'            => $channel,
                'active'             => $active,
                'confirmed'          => $confirmed,
                'sendTemplateId'     => $send_template_id,
                'sourceDescription'  => $source_description,
                'signupMethod'       => $signup_method,
                'listIds'            => $list_ids,
                'purgeListIds'       => $purge_list_ids,
                'suppressionListIds' => $suppression_list_ids,
                'watchDirectory'     => $watch_directory,
            ]
        );
    }

    /**
     * Summary.
     * 
     * Description.
     * 
     * @param int    $import_template_id   - ID of the import template.
     * @param string $title                - Title of the import template that 
     *                                     will appear in the user interface
     * @param string $type                 - The type of import to be performed. 
     *                                     "NORMAL" for new and updated records. 
     *                                     "UNSUB" for unsubscribes
     * @param string $delimiter            - PostUp supports the following 
     *                                     delimiters "Comma Separated", 
     *                                     "Semicolon Separated", "Tab Delimited", 
     *                                     and "Pipe Delimited"
     * @param string $column_names         - Names of the fields that will be
     *                                     imported and in what order they will 
     *                                     appear. "Recips.ADDRESS" is required.
     * @param string $channel              - Email=E, SMS=S, Push=P
     * @param int    $active               - Designates if the importtemplate is 
     *                                     active or not.
     * @param bool   $confirmed            - Designates if users should be imported
     *                                     in a "Confirmed" status because they went
     *                                     through a double opt-in 
     *                                     registration process.
     * @param int    $send_template_id     - ID of the send template that should be
     *                                     sent to the imported members
     * @param string $source_description   - Description of where the recipient 
     *                                     record was obtained. Will be assigned to
     *                                     all imported records unless specified in 
     *                                     the data array.
     * @param string $signup_method        - Description of how records were imported
     *                                     into the system. Normally specified as 
     *                                     "Web Import".
     * @param array  $list_ids             - Lists users will be subscribed to or 
     *                                     unsubscribed from.
     * @param array  $purge_list_ids       - Lists to purge against during import.
     * @param array  $suppression_list_ids - Suppression lists to purge against 
     *                                     during import.
     * @param string $watch_directory      - Location of watch directory for
     *                                     automated imports via SFTP.
     * 
     * @see https://apidocs.postup.com/docs/update-an-import-template-2
     * 
     * @return object The API response object
     */
    function update(
        int $import_template_id,
        string $title,
        string $type,
        string $delimiter,
        string $column_names,
        string $channel,
        int $active                 = null,
        bool $confirmed             = null,
        int $send_template_id       = null,
        string $source_description  = null,
        string $signup_method       = null,
        array $list_ids             = null,
        array $purge_list_ids       = null,
        array $suppression_list_ids = null,
        string $watch_directory     = null 
    ) {
        Validator::oneOf(
            $delimiter, 
            [ 
                'Comma Separated', 
                'Semicolon Separated', 
                'Tab Delimited', 
                'Pipe Delimited"' 
            ]
        );
        
        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);
        Validator::oneOf($active, [ 1, 0 ], false);

        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL, 
            [
                'importTemplateId'   => $import_template_id,
                'title'              => $title,
                'type'               => $type,
                'delimiter'          => $delimiter,
                'columnNames'        => $column_names,
                'channel'            => $channel,
                'active'             => $active,
                'confirmed'          => $confirmed,
                'sendTemplateId'     => $send_template_id,
                'sourceDescription'  => $source_description,
                'signupMethod'       => $signup_method,
                'listIds'            => $list_ids,
                'purgeListIds'       => $purge_list_ids,
                'suppressionListIds' => $suppression_list_ids,
                'watchDirectory'     => $watch_directory,
            ]
        );
    }
  
    /**
     * Summary. Retrieves a single import template
     * 
     * Description.
     *
     * @param int $import_template_id - ID of the import template.
     * 
     * @see https://apidocs.postup.com/docs/retrieve-an-import-template-configuration
     * 
     * @return object The API response object
     */
    function getSingle( int $import_template_id ) 
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$import_template_id}"
        );
    }

    /**
     * Summary. Retrieves all import templates
     * 
     * Description.
     * 
     * @param int $limit - The number of import templates to return
     * 
     * @see https://apidocs.postup.com/docs/retrieve-an-import-template-configuration
     * 
     * @return object The API response object
     */
    function getAll( int $limit = null ) 
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery([ 'limit' => $limit ])
        );
    }
}
