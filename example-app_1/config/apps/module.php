<?php
    use Illuminate\Support\Facades\Route;

return [
    'module' => [
        [
        'title' => 'QL Nhóm Thành Viên',
        'icon' => 'fa fa-user',
        'name' => ['user'],
        'subModule' => [
            [
                'title' => 'QL Nhóm Thành Viên',
                'route' => 'user/catalogue/index',
            ],
            [
                'title' => 'QL Thành Viên',
                'route' => 'user/index',
                ]
        ]
       
            ],
            [
                'title' => 'QL Bài Viết',
                'icon' => 'fa fa-file',
                'name' => ['post'],
                'subModule' => [
                    [
                        'title' => 'QL Nhóm Bài VIết',
                        'route' => 'post/catalogue/index',
                    ],
                    [
                        'title' => 'QL Bài Viết',
                        'route' => 'post/index',
                        ]
                ]
               
                    ],

                    [
                        'title' => 'Cấu Hình Chung',
                        'icon' => 'fa fa-file',
                        'name' => ['language'],
                        'subModule' => [
                            [
                                'title' => 'QL Ngôn Ngữ',
                                'route' => 'language/index',
                            ],
                            [
                                'title' => 'QL Bài Viết',
                                'route' => 'post/index',
                                ]
                        ]
                       
                            ],

    ]
 
       

];