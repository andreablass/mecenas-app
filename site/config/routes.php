<?php

use Kirby\Toolkit\Tpl;

return [
    [
        'pattern' => '(:all)',
        'action'  => function () {
            return new \Kirby\Cms\Response(
                Tpl::load(kirby()->root('templates') . '/index.blade.php'),
                'text/html'
            );
        }
    ]
];
