<?php

/**
 * Validator
 *
 * Various validation utilities used across the endpoints.
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

namespace Logikbarn\PhpPostupClient\Utilities;

use Logikbarn\PhpPostupClient\Exceptions\ValidatorException;

/**
 * Validator
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Validator
{
  
    /**
     * Summary. Validates expected value.
     * 
     * Description.
     *
     * @param mixed $needle   - The value being searched
     * @param array $haystack - Where to search for existence
     * @param bool  $required - If it can be safely ignored on failure.
     * 
     * @return void
     */
    public static function oneOf( $needle, array $haystack, bool $required = true )
    {
        if (!in_array($needle, $haystack) && $required ) {
            $msg = 'Invalid identifier supplied for var. Must be one of ';
      
            foreach ( $haystack as $i => $allowed ) {
                $msg .= "\"{$allowed}\"";
                $i === count($haystack) ? $msg .= '.' : null;
            }

            throw new ValidatorException($msg, 0);
        }
    }

    /**
     * Summary. Validates value class type.
     * 
     * Description.
     *
     * @param mixed $needle   - The value being searched
     * @param array $haystack - Where to search for existence
     * @param bool  $required - If it can be safely ignored on failure.
     * 
     * @return void
     */
    public static function typeOf( $needle, array $haystack, bool $required = true )
    {   
        if (!in_array(get_class($needle), $haystack) && $required ) {
            $msg = 'Invalid type supplied for var. Must be one type of ';
      
            foreach ( $haystack as $i => $allowed ) {
                $msg .= "\"{$allowed}\"";
                $i === count($haystack) ? $msg .= '.' : null;
            }

            throw new ValidatorException($msg, 0);
        }
    }

    /**
     * Summary. Checks if PHP DateObject
     * 
     * Description.
     *
     * @param object $date - The date object
     * 
     * @return void
     */
    public static function isDate( object $date )
    {
        if (!$date instanceof \DateTime ) {
            throw new ValidatorException(
                'A valid PHP DateTime object must be provided. ',
                0
            );
        }
    }

    /**
     * Summary. Checks against null
     * 
     * Description.
     *
     * @param array $vars - The values to check
     * 
     * @return void
     */
    public static function notAllNull( array $vars )
    {
        $all_null = true;

        foreach ($vars as $v) {
            if (isset($v) ) {
                $all_null = false;
            }
        }

        if ($all_null) {
            throw new ValidatorException(
                'One argument must be provided for this function.', 
                0
            );
        }
    }

    /**
     * Summary. Checks against any null values
     * 
     * Description.
     *
     * @param array $vars - The values to check
     * 
     * @return void
     */
    public static function noNull( array $vars )
    {
        $have_null = false;

        foreach ($vars as $v) {
            if (!isset($v) ) {
                $have_null = true;
            }
        }

        if ($have_null) {
            throw new ValidatorException(
                'All parameters must be populated for this function.', 
                0
            );
        }
    }

    /**
     * Summary. Validates the response json
     * 
     * Description.
     *
     * @param string $response - The cURL response string
     * 
     * @return void
     */
    public static function validJson( $response )
    {
        json_decode($response);

        switch ( json_last_error() ) {
        case JSON_ERROR_NONE:
            return;
            break;
        case JSON_ERROR_DEPTH:
            throw new ValidatorException('Maximum stack depth exceeded', 0);
            break;
        case JSON_ERROR_STATE_MISMATCH:
            throw new ValidatorException('Underflow or the modes mismatch', 0);
            break;
        case JSON_ERROR_CTRL_CHAR:
            throw new ValidatorException('Unexpected control character found', 0);
            break;
        case JSON_ERROR_SYNTAX:
            throw new ValidatorException('Syntax error, malformed JSON', 0);
            break;
        case JSON_ERROR_UTF8:
            throw new ValidatorException('Malformed UTF-8 characters', 0);
            break;
        default:
            throw new ValidatorException('Unknown error', 0);
            break;
        }
    }
  
}
