<?php

/**
 * Import
 *
 * Responsible for working with data importing related API calls. Has functions to 
 * import, retrieve import status and overall stats.
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
use Logikbarn\PhpPostupClient\Endpoints\ImportTemplate;

/**
 * Import
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Import extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/import/';

    /**
     * Summary. Import data
     * 
     * Description.
     *
     * @param int   $import_template_id - ID of the import template that describes 
     *                                  the format of the data being imported.
     * @param array $data               - The data to be imported – one record per 
     *                                  line, all records in one string.
     * @param int   $send_template_id   - ID of the send template that should be 
     *                                  sent to the imported members.
     * 
     * @return object The API response object
     */
    function data( 
        int $import_template_id,
        array $data,
        int $send_template_id = null 
    ) {
        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL, [
                'importTemplateId' => $import_template_id,
                'data'             => $data,
                'sendTemplateId'   => $send_template_id,
            ]
        );
    }

    /**
     * Summary. Import data
     * 
     * Description.
     *
     * @param mixed $import_id - ID of the import to check status on
     * 
     * @return object The API response object
     */
    function status( int $import_id )
    {
        return $this->client->request(
            'GET',
            self::ENDPOINT_URL . strval($import_id)
        );
    }

  
    /**
     * Summary. Returns import stats
     * 
     * Description.
     *
     * @param string $status             - DONE indicates the import has completed 
     *                                   processing. OPEN indicates the import is 
     *                                   still processing.
     * @param int    $limit              - Number of records to be returned in 
     *                                   data set.
     * @param int    $import_template_id - ID of the import template.
     * 
     * @return object The API response object
     */
    function stats(
        string $status = null,
        int $limit = null,
        int $import_template_id = null 
    ) {
        Validator::oneOf($status, [ 'DONE', 'OPEN' ], false);
        Validator::notAllNull([ $status, $limit, $import_template_id ]);

        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery(
                [
                    'status'           => $status,
                    'limit'            => $limit,
                    'importTemplateId' => $import_template_id
                ]
            )
        );
    }
  
    /**
     * Summary. Chain method for ImportTemplate
     * 
     * Description
     *
     * @return ImportTemplate
     */
    function templates()
    {
        return new ImportTemplate($this->client);
    }
}
