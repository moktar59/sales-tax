<?php
/**
 * It is a class with static methods. It will be used by controller to get the sales tax.
 *
 * @author Moktar <im.moktar@gmail.com>
 */
namespace Matrivumiit\SalesTax;

use Matrivumiit\SalesTax\Library\ApiRequest;

class Tax
{
    private static $apiResponse = [
        'success' => false,
        'message' => ''
    ];

    public static function getAllTaxRates()
    {

    }

    public static function getTaxByIpAddress()
    {

    }

    /**
     * This method returns all tax rates for country discovered based on country code.
     * The country code must be 2 letters ISO 3166-1 alfa-2 country code (for example, US for USA). You can use 'filter' parameter to narrow results to selected type of tax
     *
     * @return void
     */
    public static function getTaxByCountryCode()
    {

    }
}

