<?php

use Kirby\Cms\Page;


return [
  //Menu
  [
    'pattern' => ['menu', 'menu/(:all)'],
    'language' => '*',
    'action' => function () {
        return new Page([
          'slug' => 'menu',
          'template' => 'home',
          'content' => [
            'title' => 'Menu',
          ],
        ]);
    },
  ],
];
