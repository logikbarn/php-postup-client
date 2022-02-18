<?php

/**
 * ConnectionException
 *
 * Specific exception to connection failures.
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
 * @since    1.0.5
 */

namespace Logikbarn\PhpPostupClient\Exceptions;

use Exception;

/**
 * ConnectionException
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.5
 */
class ConnectionException extends Exception
{
    /**
     * Summary. Exception constructor
     *
     * @param string  $message - The error msg
     * @param integer $code    - The error code
     * 
     * @return void
     */
    public function __construct( $message = "", $code = 0 )
    {
        parent::__construct($message, $code);
    }
}
