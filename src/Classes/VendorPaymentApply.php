<?php
/**
 * This file is part of the SevenShores/NetSuite library
 * AND originally from the NetSuite PHP Toolkit.
 *
 * New content:
 * @package    ryanwinchester/netsuite-php
 * @copyright  Copyright (c) Ryan Winchester
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @link       https://github.com/ryanwinchester/netsuite-php
 *
 * Original content:
 * @copyright  Copyright (c) NetSuite Inc.
 * @license    https://raw.githubusercontent.com/ryanwinchester/netsuite-php/master/original/NetSuite%20Application%20Developer%20License%20Agreement.txt
 * @link       http://www.netsuite.com/portal/developers/resources/suitetalk-sample-applications.shtml
 *
 * generated:  2016-06-02 02:54:03 PM UTC
 */

namespace NetSuite\Classes;

class VendorPaymentApply {
    public $apply;
    public $doc;
    public $line;
    public $job;
    public $applyDate;
    public $type;
    public $refNum;
    public $total;
    public $due;
    public $currency;
    public $discDate;
    public $discAmt;
    public $disc;
    public $amount;
    static $paramtypesmap = array(
        "apply" => "boolean",
        "doc" => "integer",
        "line" => "integer",
        "job" => "string",
        "applyDate" => "dateTime",
        "type" => "string",
        "refNum" => "string",
        "total" => "float",
        "due" => "float",
        "currency" => "string",
        "discDate" => "dateTime",
        "discAmt" => "float",
        "disc" => "float",
        "amount" => "float",
    );
}
