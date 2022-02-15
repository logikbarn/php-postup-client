<?php

/**
 * Recipient
 *
 * A recipient object used throughout various endpoints.
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

namespace Logikbarn\PhpPostupClient\Content;

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
class Recipient extends Content
{
    
    /**
     * __construct
     *
     * @param string $address     - Email address of the recipient
     * @param array  $tags        - Array of name-value pairs to populate mail merge 
     *                            tags in the email content. An empty array should be
     *                            present if there are no mail merge tags to populate
     * @param string $external_id - Unique val assigned to each record by the client
     * 
     * @return void
     */
    function __construct(
        string $address,
        array $tags,
        string $external_id = null
    ) {
        $this->content = [
            'address'    => $address,
            'externalId' => $external_id,
            'tags'       => $tags,
        ];
    }
}
