<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Company Name
    |--------------------------------------------------------------------------
    */

    'name' => env('NAME', 'Alerio Technology Group'),
    'short' => env('SHORT', 'ATG'),

    /*
     |--------------------------------------------------------------------------
     | Company Address
     |--------------------------------------------------------------------------
     */

    'address' => env('COMPANY_ADDRESS', '3 Inverness Dr E, Ste 200, Englewood, CO 80112'),
    'address_1' => env('COMPANY_ADDRESS_1', '3 Inverness Dr E'),
    'address_2' => env('COMPANY_ADDRESS_2', 'Ste 200'),
    'address_city' => env('COMPANY_ADDRESS_CITY', 'Englewood'),
    'address_state' => env('COMPANY_ADDRESS_STATE', 'CO'),
    'address_zip' => env('COMPANY_ADDRESS_ZIP', '80112'),
    'address_country' => env('COMPANY_ADDRESS_COUNTRY', 'USA'),

    /*
     |--------------------------------------------------------------------------
     | Company Phone
     |--------------------------------------------------------------------------
     */

    'phone' => env('COMPANY_PHONE', '1-303-468-2077'),
    'fax' => env('COMPANY_FAX', '1-303-468-2077'),
    'toll_free' => env('COMPANY_TOLL_FREE', '1-800-222-1234'),
];
