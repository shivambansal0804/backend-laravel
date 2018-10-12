<?php

return [
    'role_structure' => [
        'superuser' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'council' => [
            'profile' => 'c,r,u,d'
        ],
        'coordinator' => [
            'profile' => 'c,r,u,d'
        ],
        'columnist' => [
            'profile' => 'r,u'
        ],
        'photographer' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
