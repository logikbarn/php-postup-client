<?php

/**
 * Recipient engagement endpoint functions
 *
 * Responsible for handling recipient engagement related endpoint REST API calls
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
 * RecipientEngagement
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class RecipientEngagement extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/recipientsengagement/';
    
    /**
     * Summary. Returns recipients based on engagement
     * 
     * Description.
     * 
     * @param string $type - Type of engagement. Possible parameters are 
     *                     subscribes, unsubscribes, opens, or clicks
     * @param string $date - Beginning date of range. Format (yyyy-MM-dd)
     * 
     * @return object The API response object
     */
    function getByDate( string $type, string $date )
    {
        Validator::oneOf(
            $type, [ 
            'unsubscribes',
            'subscribes',
            'clicks',
            'opens',
            ]
        );

        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery(
                [
                    'type' => $type,
                    'date' => $date,
                ]
            )
        );
    }

    /**
     * Summary. Returns recipients based on engagement
     * 
     * Description.
     * 
     * Dates format (yyyy-MM-dd)
     *
     * @param string $type       - Type of engagement. Possible parameters are 
     *                           subscribes, unsubscribes, opens, or clicks
     * @param string $start_date - Beginning date of range
     * @param string $end_date   - Ending date of range
     * 
     * @return object The API response object
     */
    function getByRange( string $type, string $start_date, string $end_date )
    {
        Validator::oneOf(
            $type,
            [ 
                'unsubscribes',
                'subscribes',
                'clicks',
                'opens',
            ]
        );

        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . $this->buildQuery(
                [
                    'type'      => $type,
                    'startDate' => $start_date,
                    'endDate'   => $end_date,
                ]
            )
        );
    }
}
