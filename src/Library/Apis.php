<?php
/**
 * It holds api end points
 *
 * @author Moktar <im.moktar@gmail.com>
 */
namespace Bglobal\SalesTax\Library;


class Apis
{
    public $baseUrl = 'https://api.taxrates.io/api';

    /**
     * Get all the tax rates
     *
     * @method Get
     * @return string
     */
    public function allTaxRates(): string
    {
        return '/v3/tax/rates';
    }

    /**
     * Get tax rate by a IP address
     *
     * @return void
     */
    public function taxRateByIpAddress()
    {
        return '/v1/tax/ip';
    }

    /**
     * Get the tax rate by country code.
     *
     * @return void
     */
    public function taxRateByCountryCode()
    {
        return '/v1/tax/countrycode';
    }
}
