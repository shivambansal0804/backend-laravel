<?php

return [
    'role_structure' => [
        'superuser' => [
            'profile' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d,p',
            'category' => 'c,r,u,d',
            'image' => 'p'
        ],
        'council' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d,p',
            'category' => 'c,r,u,d',
            'image' => 'p'
        ],
        'coordinator' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d',
            'gallery' => 'c,r,u,d',
            'album' => 'r,u',
            'category' => 'c,r,u,d'
        ],
        'columnist' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d',
            'category' => 'r'
        ],
        'photographer' => [
            'profile' => 'r,u',
            'album' => 'r'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'p' => 'publish'
    ]
];
