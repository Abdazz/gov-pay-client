<?php

return [
    "reference" => "5c2a6d07-56bc-4c08-a204-64dead2ab5fb",
    "server_endpoint" => "http://localhost:8000/payement/",
    "server_check_endpoint" =>'http://localhost:8000/api/transactions/check',

    "payementMethods" => [
        "om" => "76752085",

        "mc" => "70000000",

        "pp" => [
            'client_id' => "AT_i6U7IuzTABpvn-2lMuJ1svbTtqqe2La4jeynXLm8I2O3lHj4nJZIcQu8JoUYkQzHtoFuKI-8ZkCKX",
            'secret' => "EEguq1my8A1HVK7UlAb5IeD5jZFbH7nmqpdMU5_aBjwhV-mhBSF9Lm3bz1kS5n4SWcIefyL9BNuv1sY4",
            'settings' => array(
                'mode' => "sandbox",
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            ),
        ]
    ],

];
