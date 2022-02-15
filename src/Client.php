<?php

/**
 * Client
 *
 * The main client wrapper that is front facing. This class is passed across all
 * endpoints and extends the API class.
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

namespace Logikbarn\PhpPostupClient;

use Logikbarn\PhpPostupClient\Endpoints\Brand;
use Logikbarn\PhpPostupClient\Endpoints\Campaign;
use Logikbarn\PhpPostupClient\Endpoints\Content;
use Logikbarn\PhpPostupClient\Endpoints\CustomField;
use Logikbarn\PhpPostupClient\Endpoints\Import;
use Logikbarn\PhpPostupClient\Endpoints\ImportTemplate;
use Logikbarn\PhpPostupClient\Endpoints\LinkStatistic;
use Logikbarn\PhpPostupClient\Endpoints\Mailing;
use Logikbarn\PhpPostupClient\Endpoints\Recipient;
use Logikbarn\PhpPostupClient\Endpoints\SendTemplate;
use Logikbarn\PhpPostupClient\Endpoints\SubscriberList;
use Logikbarn\PhpPostupClient\Endpoints\TestMailing;
use Logikbarn\PhpPostupClient\Endpoints\TriggeredMailing;

/**
 * Client
 * 
 * @category Class
 * @package  Logikbarn\PhpPostupClient
 * @author   Zgjim Gjonbalaj <info@logikbarn.com>
 * @license  GNU GPLv3
 * @link     https://github.com/logikbarn/php-postup-client
 * @since    1.0.0
 */
class Client extends Api
{
    /**
     * Brand chain methods
     *
     * @return Brand
     */
    public function brands()
    {
        return new Brand($this);
    }

    /**
     * Campaign chain methods
     *
     * @return Campaign
     */
    public function campaigns()
    {
        return new Campaign($this);
    }

    /**
     * Content chain methods
     *
     * @return Content
     */
    public function content()
    {
        return new Content($this);
    }

    /**
     * CustomField chain method
     *
     * @return CustomField 
     */
    public function customFields()
    {
        return new CustomField($this);
    }
    
    /**
     * Import chain methods
     *
     * @return Import
     */
    public function imports()
    {
        return new Import($this);
    }
    
    /**
     * ImportTemplate chain methods
     *
     * @return ImportTemplate
     */
    public function importTemplates()
    {
        return new ImportTemplate($this);
    }

    /**
     * LinkStatistic chain methods
     *
     * @return LinkStatistic
     */
    public function linkStatistics()
    {
        return new LinkStatistic($this);
    }

    /**
     * Mailing chain methods
     *
     * @return Mailing
     */
    public function mailings()
    {
        return new Mailing($this);
    }
       
    /**
     * Recipient chain methods
     *
     * @return Recipient
     */
    public function recipients()
    {
        return new Recipient($this);
    }

    /**
     * SendTemplate chain methods
     *
     * @return SendTemplate
     */
    public function sendTemplate()
    {
        return new SendTemplate($this);
    }

    /**
     * SubscriberList chain methods
     *
     * @return SubscriberList
     */
    public function lists()
    {
        return new SubscriberList($this);
    }

    /**
     * TestMailing chain methods
     *
     * @return TestMailing
     */
    public function testMailing()
    {
        return new TestMailing($this);
    }

    /**
     * TriggeredMailing chain methods
     *
     * @return TriggeredMailing
     */
    public function triggeredMailing()
    {
        return new TriggeredMailing($this);
    }
}
