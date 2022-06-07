<?php

// You can find the keys here : https://developer.twitter.com/en/portal/projects-and-apps

return [
    'debug' => env('APP_DEBUG', false),

    'api_url' => 'api.twitter.com',
    'upload_url' => 'upload.twitter.com',
    'api_version' => env('TWITTER_API_VERSION', '1.1'),

    'consumer_key' => '*************',
    'consumer_secret' => '*************',
    'access_token' => '*************',
    'access_token_secret' => '*************',
    'bearer_token' => '*************',


    'authenticate_url' => 'https://api.twitter.com/oauth/authenticate',
    'access_token_url' => 'https://api.twitter.com/oauth/access_token',
    'request_token_url' => 'https://api.twitter.com/oauth/request_token',
];

