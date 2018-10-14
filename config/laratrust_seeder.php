<?php

return [
    'role_structure' => [
        'superuser' => [
            'profile' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tag' => 'c,r,u,d'
        ],
        'council' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tag' => 'c,r,u,d'
        ],
        'coordinator' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tag' => 'c,r,u,d'
        ],
        'columnist' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d',
            'category' => 'r',
            'tag' => 'c,r,u,d'
        ],
        'photographer' => [
            'profile' => 'r,u',
            'album' => 'c,r,u,d'
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
