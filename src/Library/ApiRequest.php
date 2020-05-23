<?php
/**
 * Format the query parameters, sending api request, receiving response and process the response in a uniform format.
 *
 * @author Moktar <im.moktar@gmail.com>
 */
namespace Bglobal\SalesTax\Library;

use Bglobal\SalesTax\Library\ApiEndPoints;


class ApiRequest
{
    private $apiUrl = '';
    private $domain = 'api.taxrates.io';
    private $countryCode;
    private $ipAddress;
    private $productCode;
    private $zipCode;
    private $filter;
    private $response = [
        'success' => false,
        'message' => '',
        'data' => null
    ];

    public function setApiUrl(String $value)
    {
        if (\stripos($value, 'bycountry') !== false) {
            $this->apiUrl = ApiEndPoints::taxRateByCountryCode();
        } elseif (\stripos($value, 'byip') !== false) {
            $this->apiUrl = ApiEndPoints::taxRateByIpAddress();
        } else {
            $this->apiUrl = ApiEndPoints::allTaxRates();
        }

        return $this;
    }

    public function setCountryCode(String $value)
    {
        $this->countryCode = $value;

        return $this;
    }

    public function setIpAddress(String $value)
    {
        $this->ipAddress = $value;

        return $this;
    }

    public function setProductCode(String $value)
    {
        $this->productCode = $value;

        return $this;
    }

    public function setZipCode(String $value)
    {
        $this->zipCode = $value;

        return $this;
    }

    public function setFilter(String $value = 'CombinedRate')
    {
        $this->filter = empty($value) ? $value : 'CombinedRate';

        return $this;
    }

    private function formatRequest()
    {
        $params = [
            'domain' => $this->domain,
            'product_code' => $this->productCode,
            'filter' => $this->filter,
        ];

        if (!empty($this->countryCode)) {
            $params['country_code'] = \strtoupper($this->countryCode);
        }

        if (!empty($this->zipCode)) {
            $params['zip'] = $this->zipCode;
        }

        if (!empty($this->ipAddress)) {
            $params['ip'] = $this->ipAddress;
        }

        return http_build_query($params);
    }

    public function sendRequest()
    {
        try {
            $queryParams = $this->formatRequest();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL,"{$this->apiUrl}?{$queryParams}");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: ' . 'Apikey_' . config('sales-tax.secret')
            ));

            $this->response['success'] = true;
            $this->response['data'] = curl_exec ($ch);

            curl_close ($ch);

        } catch (\Exception $ex) {
            $this->response['message'] = $ex->getMessage();
        }

        return $this->response;
    }

}
