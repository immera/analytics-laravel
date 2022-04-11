<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'client_id' => env('ANALYTICS_CLIENT_ID', 123456),
    'base_url' => env('ANALYTICS_CLOUND_URL', 'http://157.245.16.180/'),
    'header' => [
        'username' => '',
        'password' => '',
    ],
];
