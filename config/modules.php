<?php

return [
    'auth' => [
        'class' => 'auth\Module',
        'layout' => '//main', // Layout when not logged in yet
        'layoutLogged' => '//main', // Layout for logged in users
        'attemptsBeforeCaptcha' => 3, // Optional
        'supportEmail' => 'support@mydomain.com', // Email for notifications
        'passwordResetTokenExpire' => 3600, // Seconds for token expiration
        'superAdmins' => ['admin'], // SuperAdmin users
        //'signupWithEmailOnly' => false, // false = signup with username + email, true = only email signup
        'tableMap' => [ // Optional, but if defined, all must be declared
            'User' => 'user',
            'UserStatus' => 'user_status',
            'ProfileFieldValue' => 'profile_field_value',
            'ProfileField' => 'profile_field',
            'ProfileFieldType' => 'profile_field_type',
        ],
    ],
];