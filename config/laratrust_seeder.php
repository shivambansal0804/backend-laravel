<?php

return [
    'role_structure' => [
        'superuser' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'blog' => 'c,r,u,d',
            'gallery' => 'c,r,u,d'
        ],
        'council' => [
            'profile' => 'c,r,u,d',
            'blog' => 'c,r,u,d',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d'
        ],
        'coordinator' => [
            'profile' => 'c,r,u,d',
            'blog' => 'c,r,u,d',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d'
        ],
        'columnist' => [
            'profile' => 'r,u',
            'blog' => 'c,r,u,d'
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
        'd' => 'delete'
    ]
];
