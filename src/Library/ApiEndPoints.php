<?php
/**
 * It holds api end points
 *
 * @author Moktar <im.moktar@gmail.com>
 */
namespace Bglobal\SalesTax\Library;


class ApiEndPoints
{
    public static $baseUrl = 'https://api.taxrates.io/api';

    /**
     * Get all the tax rates
     *
     * @method Get
     * @return string
     */
    public static function allTaxRates(): string
    {
        return self::$baseUrl . '/v3/tax/rates';
    }

    /**
     * Get tax rate by a IP address
     *
     * @return void
     */
    public static function taxRateByIpAddress()
    {
        return self::$baseUrl . '/v1/tax/ip';
    }

    /**
     * Get the tax rate by country code.
     *
     * @return void
     */
    public static function taxRateByCountryCode()
    {
        return self::$baseUrl . '/v1/tax/countrycode';
    }
}
