<?php

/**
 * CampaignStatistic
 *
 * Responsible for working with campaign statistics related API calls. This has two
 * functions, one to return all statistics, the other to filter by date.
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
 * CampaignStatistic
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class CampaignStatistic extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/campaignstatistics/';

    /**
     * Summary. Returns all campaign statistics
     * 
     * Description
     *
     * @param int $campaign_id - ID of the Campaign in PostUp
     * 
     * @return object The API response object
     */
    public function getAll( int $campaign_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$campaign_id}"
        );
    }

    /**
     * Summary. Return statistics for a date range
     * 
     * Description.
     *
     * @param int    $campaign_id - ID of the Campaign in PostUp
     * @param string $start_date  - The start date in YYYY-MM-DD format
     * @param string $end_date    - The end date in YYYY-MM-DD format
     * 
     * @return object The API response object
     */
    public function getByDate( 
        int $campaign_id, 
        string $start_date, 
        string $end_date 
    ) {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "{$campaign_id}" . $this->buildQuery(
                [
                    'startDate'  => $start_date,
                    'endDate'    => $end_date,
                ]
            )
        );
    }
}
