<?php

/**
 * Mailing
 *
 * Responsible for working with mailings related API calls. This class also
 * includes a chain method for MailingStatistics
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
use Logikbarn\PhpPostupClient\Content\ABTest;
use Logikbarn\PhpPostupClient\Content\Mailing as MailingC;
use Logikbarn\PhpPostupClient\Content\Segment;

/**
 * Mailing
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
Class Mailing extends Endpoint
{
    /**
     * The endpoint URL
     *
     * @var string
     */
    const ENDPOINT_URL = '/mailing/';

    /**
     * Summary. The following API method will mimic the PostUp UI send process and 
     * target existing lists with new content.
     *
     * @param string   $title                   - Internal title defined by the 
     *                                          client
     * @param int      $brand_id                - ID of the Brand to be used for 
     *                                          sending the mailing
     * @param int      $campaign_id             - ID of the Campaign the mailing 
     *                                          should be created under
     * @param string   $channel                 - Email=E, SMS=S, Push=P
     * @param array    $list_ids                - IDs of the mailing lists to be 
     *                                          targeted
     * @param string   $click_track_type        - "ALL" tracks all clicks, "NONE" 
     *                                          disables click tracking, "HTML"
     *                                          tracks clicks in HTML parts only,
     *                                          "USER"  tracks selected URLs, or
     *                                          "USER_HTML"  tracks selected URLs
     *                                          in HTML parts only
     * @param string   $open_track_type         - "NONE" will disable open tracking 
     *                                          "HTML" will track opens in HTML parts
     * @param string   $status                  - "NEW" creates a mailing draft. 
     *                                          "PENDING" schedules the mailing
     * @param MailingC $content                 - Mailing content
     * @param int      $mailing_id              Key - Unique number assigned to each 
     *                                          mailing in PostUp
     * @param int      $category_id             - ID of the Category that should be 
     *                                          applied to the mailing
     * @param int      $segment_id              - ID of the Segment that should be 
     *                                          applied to the mailing
     * @param Segment  $segment                 - Object of targeting segment
     * @param ABTest   $ab_content              - A/B Content object
     * @param string   $ab_split_remaining_type - Performance metric that determines 
     *                                          the winning combination. Possible 
     *                                          values "CLICKS" "OPENS" 
     *                                          "CONVERSION_RATE" "CONTENT_SHARES" 
     *                                          "REFERRED_CLICKS" "NONE"
     * @param int      $ab_split_percent        - Percentage of the target audience 
     *                                          to be included in the test. 1-100
     * @param int      $ab_split_remaining_time - Evaluation period in hours before 
     *                                          determining winner of test. Possible
     *                                          values "1" "3" "6" "12" "18" "24"
     *                                          "36" "48" "72" "96"
     * @param array    $seeds                   of strings - Email addresses that 
     *                                          should be included as custom seeds
     * @param int      $seed_list_id            - ID of list that should be included 
     *                                          as a seed list
     * @param array    $purge_list_ids          - IDs of mailing lists that should be
     *                                          added as purge lists
     * @param array    $suppression_list_ids    - IDs of suppression lists that 
     *                                          should be added to the targeting 
     *                                          criteria
     * @param array    $block_domains           of strings - ISP domains that should 
     *                                          be blocked upon sending
     * @param string   $scheduled_time          - Time the mailing should be 
     *                                          scheduled to send in Central Timezone
     *                                          omitting this parameter will schedule
     *                                          the mailing for 'Immediately'. 
     *                                          format yyyy-MM-dd HH:mm:ss
     * @param string   $external_id             - Populates the optional Reference 
     *                                          Number field
     * @param int      $max_recips              - Sets a limit for how many 
     *                                          recipients to target
     * @param bool     $delay_content_assembly  - Enables the Delay Content Assembly 
     *                                          feature. Content fetched from an 
     *                                          external CMS or stored in a PostUp
     *                                          CMF file will be assembled at the
     *                                          scheduled send time.
     * 
     * @return object The API response object
     */
    public function create(
        string $title,
        int $brand_id,
        int $campaign_id,
        string $channel,
        array $list_ids,
        string $click_track_type,
        string $open_track_type,
        string $status,
        MailingC $content,
        int $mailing_id                 = null,
        int $category_id                = null,
        int $segment_id                 = null,
        Segment $segment                = null,
        ABTest $ab_content              = null,
        string $ab_split_remaining_type = null,
        int $ab_split_percent           = null,
        int $ab_split_remaining_time    = null,
        array $seeds                    = null,
        int $seed_list_id               = null,
        array $purge_list_ids           = null,
        array $suppression_list_ids     = null,
        array $block_domains            = null,
        string $scheduled_time          = null,
        string $external_id             = null,
        int $max_recips                 = null,
        bool $delay_content_assembly    = null
    ) {

        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);
        Validator::oneOf(
            $click_track_type, [ 'ALL', 'NONE', 'HTML', 'USER','USER_HTML' ]
        );
        Validator::oneOf($open_track_type, [ 'NONE', 'HTML' ]);
        Validator::oneOf($ab_content, [ 'NONE', 'HTML' ], false);
        Validator::oneOf(
            $ab_split_remaining_type, [ 
                'CLICKS', 
                'OPENS',
                'CONVERSION_RATE',
                'CONTENT_SHARES',
                'REFERRED_CLICKS',
                'NONE'
            ], false
        );
        Validator::oneOf(
            $ab_split_remaining_time, [ 
                '1', '3', '6', '12', '18', '24', '36', '48', '72', '96'
            ], false
        );
        
        return $this->client->request(
            'POST', 
            self::ENDPOINT_URL,
            [
                'title'                => $title,
                'brandId'              => $brand_id,
                'campaignId'           => $campaign_id,
                'channel'              => $channel,
                'listIds'              => $list_ids,
                'clickTrackType'       => $click_track_type,
                'openTrackType'        => $open_track_type,
                'status'               => $status,
                'content'              => $content->getContent(),
                'mailingId'            => $mailing_id,
                'categoryId'           => $category_id,
                'segmentId'            => $segment_id,
                'segment'              => isset($segment) 
                                            ? $segment->getContent() 
                                            : null,
                'abContent'            => isset($ab_content) 
                                            ? $ab_content->getContent() 
                                            : null,
                'aBSplitRemainingType' => $ab_split_remaining_type,
                'aBSplitPercent'       => $ab_split_percent,
                'aBSplitRemainingTime' => $ab_split_remaining_time,
                'seeds'                => $seeds,
                'seedListId'           => $seed_list_id,
                'purgeListIds'         => $purge_list_ids,
                'suppressionListIds'   => $suppression_list_ids,
                'blockDomains'         => $block_domains,
                'scheduledTime'        => $scheduled_time,
                'externalId'           => $external_id,
                'maxRecips'            => $max_recips,
                'delayContentAssembly' => $delay_content_assembly,
            ]
        );
    }

    /**
     * Summary. Updates an existing mailing
     *
     * @param int      $mailing_id              Key - Unique number assigned to each 
     *                                          mailing in PostUp
     * @param string   $title                   - Internal title defined by the 
     *                                          client
     * @param int      $brand_id                - ID of the Brand to be used for 
     *                                          sending the mailing
     * @param int      $campaign_id             - ID of the Campaign the mailing 
     *                                          should be created under
     * @param string   $channel                 - Email=E, SMS=S, Push=P
     * @param array    $list_ids                - IDs of the mailing lists to be 
     *                                          targeted
     * @param string   $click_track_type        - "ALL" tracks all clicks, "NONE" 
     *                                          disables click tracking, "HTML"
     *                                          tracks clicks in HTML parts only,
     *                                          "USER"  tracks selected URLs, or
     *                                          "USER_HTML"  tracks selected URLs
     *                                          in HTML parts only
     * @param string   $open_track_type         - "NONE" will disable open tracking 
     *                                          "HTML" will track opens in HTML parts
     * @param string   $status                  - "NEW" creates a mailing draft. 
     *                                          "PENDING" schedules the mailing
     * @param MailingC $content                 - Mailing content
     * @param int      $category_id             - ID of the Category that should be 
     *                                          applied to the mailing
     * @param int      $segment_id              - ID of the Segment that should be 
     *                                          applied to the mailing
     * @param Segment  $segment                 - Object of targeting segment
     * @param ABTest   $ab_content              - A/B Content object
     * @param string   $ab_split_remaining_type - Performance metric that determines 
     *                                          the winning combination. Possible 
     *                                          values "CLICKS" "OPENS" 
     *                                          "CONVERSION_RATE" "CONTENT_SHARES" 
     *                                          "REFERRED_CLICKS" "NONE"
     * @param int      $ab_split_percent        - Percentage of the target audience 
     *                                          to be included in the test. 1-100
     * @param int      $ab_split_remaining_time - Evaluation period in hours before 
     *                                          determining winner of test. Possible
     *                                          values "1" "3" "6" "12" "18" "24"
     *                                          "36" "48" "72" "96"
     * @param array    $seeds                   of strings - Email addresses that 
     *                                          should be included as custom seeds
     * @param int      $seed_list_id            - ID of list that should be included 
     *                                          as a seed list
     * @param array    $purge_list_ids          - IDs of mailing lists that should be
     *                                          added as purge lists
     * @param array    $suppression_list_ids    - IDs of suppression lists that 
     *                                          should be added to the targeting 
     *                                          criteria
     * @param array    $block_domains           of strings - ISP domains that should 
     *                                          be blocked upon sending
     * @param string   $scheduled_time          - Time the mailing should be 
     *                                          scheduled to send in Central Timezone
     *                                          omitting this parameter will schedule
     *                                          the mailing for 'Immediately'. 
     *                                          format yyyy-MM-dd HH:mm:ss
     * @param string   $external_id             - Populates the optional Reference 
     *                                          Number field
     * @param int      $max_recips              - Sets a limit for how many 
     *                                          recipients to target
     * @param bool     $delay_content_assembly  - Enables the Delay Content Assembly 
     *                                          feature. Content fetched from an 
     *                                          external CMS or stored in a PostUp
     *                                          CMF file will be assembled at the
     *                                          scheduled send time.
     * 
     * @return object The API response object
     */
    public function update(
        int $mailing_id, 
        string $title,
        int $brand_id,
        int $campaign_id,
        string $channel,
        array $list_ids,
        string $click_track_type,
        string $open_track_type,
        string $status,
        MailingC $content,
        int $category_id                = null,
        int $segment_id                 = null,
        Segment $segment                = null,
        ABTest $ab_content              = null,
        string $ab_split_remaining_type = null,
        int $ab_split_percent           = null,
        int $ab_split_remaining_time    = null,
        array $seeds                    = null,
        int $seed_list_id               = null,
        array $purge_list_ids           = null,
        array $suppression_list_ids     = null,
        array $block_domains            = null,
        string $scheduled_time          = null,
        string $external_id             = null,
        int $max_recips                 = null,
        bool $delay_content_assembly    = null
    ) {

        Validator::oneOf($channel, [ 'E', 'S', 'P' ]);
        Validator::oneOf(
            $click_track_type, [ 'ALL', 'NONE', 'HTML', 'USER','USER_HTML' ]
        );
        Validator::oneOf($open_track_type, [ 'NONE', 'HTML' ]);
        Validator::oneOf($ab_content, [ 'NONE', 'HTML' ], false);
        Validator::oneOf(
            $ab_split_remaining_type, [ 
                'CLICKS', 
                'OPENS',
                'CONVERSION_RATE',
                'CONTENT_SHARES',
                'REFERRED_CLICKS',
                'NONE'
            ], false
        );
        Validator::oneOf(
            $ab_split_remaining_time, [ 
                '1', '3', '6', '12', '18', '24', '36', '48', '72', '96'
            ], false
        );
        
        return $this->client->request(
            'PUT', 
            self::ENDPOINT_URL,
            [
                'title'                => $title,
                'brandId'              => $brand_id,
                'campaignId'           => $campaign_id,
                'channel'              => $channel,
                'listIds'              => $list_ids,
                'clickTrackType'       => $click_track_type,
                'openTrackType'        => $open_track_type,
                'status'               => $status,
                'content'              => $content->getContent(),
                'mailingId'            => $mailing_id,
                'categoryId'           => $category_id,
                'segmentId'            => $segment_id,
                'segment'              => isset($segment) 
                                            ? $segment->getContent() 
                                            : null,
                'abContent'            => isset($ab_content) 
                                            ? $ab_content->getContent() 
                                            : null,
                'aBSplitRemainingType' => $ab_split_remaining_type,
                'aBSplitPercent'       => $ab_split_percent,
                'aBSplitRemainingTime' => $ab_split_remaining_time,
                'seeds'                => $seeds,
                'seedListId'           => $seed_list_id,
                'purgeListIds'         => $purge_list_ids,
                'suppressionListIds'   => $suppression_list_ids,
                'blockDomains'         => $block_domains,
                'scheduledTime'        => $scheduled_time,
                'externalId'           => $external_id,
                'maxRecips'            => $max_recips,
                'delayContentAssembly' => $delay_content_assembly,
            ]
        );
    }

    /**
     * Summary. Return a single mailing
     *
     * @param int $mailing_id - Unique number assigned to each mailing created in 
     *                        the system.
     * 
     * @return object The API response object
     */
    public function getSingle( int $mailing_id )
    {
        return $this->client->request(
            'GET', 
            self::ENDPOINT_URL . "/{$mailing_id}"
        );
    }
}
