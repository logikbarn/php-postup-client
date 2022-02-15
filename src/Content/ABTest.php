<?php

/**
 * ABTest
 *
 * A/B split testing object used in various endpoints.
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
 * ABTest
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class ABTest extends Content
{
    
    /**
     * __construct
     * 
     * @param string $original_subject - Subject line for test mailing combination. 
     *                                 If not included, value for default combo will 
     *                                 be used.
     * @param string $from_email       - From email address for test mailing 
     *                                 combination. If not included, value for 
     *                                 default combo will be used.
     * @param string $from_name        - From name for test mailing combination. 
     *                                 If not included, value for default combo will 
     *                                 be used.
     * @param string $reply_to_email   - Reply-To email for test mailing combination.
     *                                 If not included, value for default combo will 
     *                                 be used.
     * @param string $reply_to_name    - Reply-To name for test mailing combination.
     *                                 If not included, value for default combo will 
     *                                 be used.
     * @param string $html_body        - HTML content for test mailing combination. 
     *                                 If not included, value for default combo will 
     *                                 be used.
     * @param string $text_body        - Text content for test mailing combination. 
     *                                 If not included, value for default combo will 
     *                                 be used.
     * 
     * @return void
     */
    function __construct(
        string $original_subject = null,
        string $from_email       = null,
        string $from_name        = null,
        string $reply_to_email   = null,
        string $reply_to_name    = null,
        string $html_body        = null,
        string $text_body        = null 
    ) {
        $this->content = [
            'originalSubject' => $original_subject,
            'fromEmail'       => $from_email,
            'fromName'        => $from_name,
            'replyToEmail'    => $reply_to_email,
            'replyToName'     => $reply_to_name,
            'htmlBody'        => $html_body,
            'textBody'        => $text_body,
        ];
    }
}
