<?php

/**
 * Campaign
 *
 * Responsible for working with campaigns related API calls. This class also
 * includes a chain method for CampaignStatistic.
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
 * Campaign
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class Campaign extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/campaign/';

    /**
     * Summary. Create a new compaign
     *
     * @param string $title       - Descriptive title of this campaign
     * @param string $external_id - Optional external identifier that is available 
     *                            when downloading reports
     * @param string $comment     - Longer description of campaign or campaign notes
     * 
     * @return object The API response object
     */
    public function create( string $title, string $external_id, string $comment )
    {
        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL,
            [
                'title'      => $title,
                'externalId' => $external_id,
                'comment'    => $comment,
            ]
        );
    }

    /**
     * Summary. Return a single compaign
     *
     * @param int $campaign_id - ID of the Campaign in PostUp.
     * 
     * @return object The API response object
     */
    public function getSingle( int $campaign_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "/{$campaign_id}"
        );
    }

    /**
     * Summary. Return all compaigns
     *
     * @return object The API response object
     */
    public function getAll()
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL
        );
    }

    /**
     * Summary. Chain method for CampaignStatistic
     *
     * @return CampaignStatistic
     */
    public function statistics()
    {
        return new CampaignStatistic($this->client);
    }
}
