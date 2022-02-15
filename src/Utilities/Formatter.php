<?php

/**
 * Formatter
 *
 * Various formatting utilities used across the endpoints.
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

/**
 * Formatter
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Formatter
{
    
    /**
     * Summary. Converts demographics to object.
     * 
     * Description.
     *
     * @param array $demographics - The demographics array
     * 
     * @return object The formatted demographics object
     */
    public static function demographicsToObject( array $demographics )
    {
        $formatted = [];

        foreach ( $demographics as $string ) {
            $pair = explode('=', $string);
            if (!empty($pair[0]) ) {
                $formatted[ $pair[0] ] = $pair[1] ?? '';
            }
        }

        return (object) $formatted;
    }
  
    /**
     * Summary. Converts demographics arr to obj.
     * 
     * Description.
     *
     * @param array $demographics - The demographics array
     * 
     * @return array The formatted demographics array
     */
    public static function demographicsToString( array $demographics )
    {
        $formatted = [];

        foreach ( $demographics as $key => $val ) {
            $formatted[] = "{$key}={$val}";
        }

        return $formatted;
    }

    /**
     * Summary. Converts response array to proper types
     * 
     * Description.
     *
     * @param array $arr - The response associative array
     * 
     * @return void
     */
    public static function responseToObject( array $arr )
    {
        $formatted = [];
    
        foreach ( $arr as $k => $v ) {
            if ($k === 'demographics' ) {
                $formatted[$k] = self::demographicsToObject($v);
            } elseif ($k === 'dateJoined' && isset($v) ) {
                $formatted[$k] = new \DateTime($v);
            } elseif ($k === 'blockDomains' && is_string($v) ) {
                $formatted[$k] = explode(' ', $v);
            } elseif ($k === 'dateUnsub' && isset($v) ) {
                $formatted[$k] = new \DateTime($v);
            } elseif (is_array($v) ) {
                $formatted[$k] = in_array($k, [ 'brandIds' ], true) 
                          ? (array) self::responseToObject($v) 
                          : self::responseToObject($v);
            } else {
                $formatted[$k] = $v;
            }
        }

        return (object) $formatted;
    }
}
