<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'stripe' => [
        'key' => env('pk_test_51QtAeBC0nQqlHpGxfzfxsWlCK1tHZUs6OUTqnmb1ahXQfUqHhP4yihFRkryuD8LqBSYTpUlmw4RjgnivxQvf3B7o00o706ObGy'),
        'secret' => env('sk_test_51QtAeBC0nQqlHpGxAQVZOMHp8hgFQRp67xxy39N4F5DRSQ1ueT8hV7Svo2Lf8LliRqlyGrGES6JOfc4sYHmFFeau002P7TRgvr'),
    ],





    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
