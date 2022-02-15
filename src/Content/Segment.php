<?php

/**
 * Segment
 *
 * A segment object used throughout various endpoints.
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

use Logikbarn\PhpPostupClient\Utilities\Validator;

/**
 * Segment
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Segment extends Content
{
    
    /**
     * __construct
     * 
     * @param string $assoc_str            - Default is "ALL". Other acceptable 
     *                                     values are "ANY" and numbers with 
     *                                     parenthesis for an advanced segment. 
     *                                     For example "1 AND (2 OR 3)"
     * @param array  $targeting_collection - Parameters for targetingConditions 
     *                                     listed below. An array of conditions that
     *                                     each condition must contain 3 keys.
     *
     * @return void
     */
    function __construct( string $assoc_str, array $targeting_collection )
    {
        $this->content = [ 
            'associativeString'             => $assoc_str,
            'targetingConditionsCollection' => [ 'targetingConditions' => [] ]
        ];

        foreach ( $targeting_collection as $condition ) {
            Validator::noNull($condition);
            Validator::oneOf($condition['conditionColumn'], [ '=', '!=' ]);
            
            $this->content['targetingConditionsCollection']['targetingConditions'][] = $condition;
        }
    }
}
