<?php

/**
 * Mailing
 *
 * A mailing object used throughout various endpoints.
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
 * Mailing
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Mailing extends Content
{
    
    /**
     * __construct
     * 
     * @param string $subject          - Subject of the mailing
     * @param string $preview_text     - Copy that should appear in the preview text
     *                                 of the mailing
     * @param string $charset          - Default is "UTF-8"
     * @param string $encoding         - Default is "quoted-printable"
     * @param string $from_email       - Email address that should appear in the 
     *                                 'From' line of the message header
     * @param string $from_name        - Sender name that should appear in the 'From'
     *                                 line of the message header
     * @param string $to_email         - Should be defined as "[-emailaddr-]"
     * @param string $to_name          - Unless using a custom field to store the 
     *                                 recipient's name, should be defined as 
     *                                 "[-name-]"
     * @param string $reply_to_email   - Email address that should appear in the 
     *                                 'Reply' line of the message header. Typically 
     *                                 defined as "[-email_reply_alpha-]"
     * @param string $reply_to_name    - Name that should appear in the 'Reply' line 
     *                                 of the message header
     * @param string $html_body        - HTML content of the mailing
     * @param string $text_body        - Text content of the mailing. Should be 
     *                                 included for multipart mailing
     * @param int    $unsub_c_id       - ID of UNSUB response content that will 
     *                                 deploy to recipients who unsubscribe
     * @param int    $reply_c_id       - ID of REPLY response content that will 
     *                                 deploy to recipients who reply to the mailing
     * @param int    $header_c_id      - ID of HEADER response content to be appended
     *                                 at the top of the email
     * @param int    $footer_c_id      - ID of FOOTER response content to be appended
     *                                 at the bottom of the email
     * @param int    $fwd_to_friend_id - ID of FORWARD response content to be 
     *                                 appended at the top of the email
     * 
     * @return void
     */
    function __construct(
        string $subject        = null,
        string $preview_text   = null,
        string $charset        = null,
        string $encoding       = null,
        string $from_email     = null,
        string $from_name      = null,
        string $to_email       = null,
        string $to_name        = null,
        string $reply_to_email = null,
        string $reply_to_name  = null,
        string $html_body      = null,
        string $text_body      = null,
        int $unsub_c_id        = null,
        int $reply_c_id        = null,
        int $header_c_id       = null,
        int $footer_c_id       = null,
        int $fwd_to_friend_id  = null 
    ) {
        $this->content = [
            'subject'                  => $subject,
            'previewText'              => $preview_text,
            'charset'                  => $charset,
            'encoding'                 => $encoding,
            'fromEmail'                => $from_email,
            'fromName'                 => $from_name,
            'toEmail'                  => $to_email,
            'toName'                   => $to_name,
            'replyToEmail'             => $reply_to_email,
            'replyToName'              => $reply_to_name,
            'htmlBody'                 => $html_body,
            'textBody'                 => $text_body,
            'unsubContentId'           => $unsub_c_id,
            'replyContentId'           => $reply_c_id,
            'headerContentId'          => $header_c_id,
            'footerContentId'          => $footer_c_id,
            'forwardToFriendContentId' => $fwd_to_friend_id,
        ];
    }
}
