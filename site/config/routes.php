<?php

use App\Actions\GetDataPages;
use Kirby\Cms\Page;
use Kirby\Toolkit\Tpl;

return [
    [
        'pattern' => ['menu', 'menu/(:all)'],
        'action'  => function () {
            return new Page([
                'template' => 'app',
                'slug' => 'menu',
                'content' => [
                    'title' => 'menu',
                    'dataContent' => (new App\Actions\GetDataPages)()
                ]
            ]);
        }
    ]
];
