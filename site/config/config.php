<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\Response;

require_once 'helpers.php';
$base = dirname(__DIR__, 2);
$storage = $base . '/storage';

KirbyEnv::load($base);

return [
    'debug' => true,
    'panel' => [
        'install' => env('KIRBY_INSTALL', false),
        'slug' => env('KIRBY_PANEL', 'panel')
    ],
    'session' => [
        'durationNormal' => (int) env('KIRBY_SESSION_DURATION', 7200),
        'durationLong' => (int) env('KIRBY_SESSION_LONG_DURATION', 1209600),
        'timeout' => (int) env('KIRBY_SESSION_TIMEOUT', 1800),
        'cookieName' => env('KIRBY_SESSION', 'kirby_session'),
    ],
    'api' => env('KIRBY_API', true),
    'cookieName' => env('KIRBY_SESSION', 'kirby_session'),
    'hooks' => require_once 'hooks.php',
    'routes' => [
        [
          'pattern' => 'api/home',
          'method' => 'GET',
          'action' => function () {
            $page = page('home');
    
            return [
              'mainImageLight' => $page->main_image()->toFile()?->url() ?? null,
              'mainImageDark' => $page->darkmain_image()->toFile()?->url() ?? null,
              'logoLight' => $page->logo()->toFile()?->url() ?? null,
              'logoDark' => $page->darklogo()->toFile()?->url() ?? null,
              'description' => $page->description()->kirbytext() ?? '',
              'menuButtonText' => $page->menu_button_text()->value() ?? '',
              'menuButtonLink' => $page->menu_button_link()->value() ?? '',
              'reservasionesButtonText' => $page->reservasiones_button_text()->value() ?? '',
              'reservasionesButtonLink' => $page->reservasiones_button_link()->value() ?? '',
              'schedule' => $page->schedule()->toStructure()->map(fn ($s) => [
                'day' => $s->day()->value(),
                'hours' => $s->hours()->value()
              ]),
              'location' => $page->location()->value() ?? '',
              'social' => $page->social()->toStructure()->map(fn ($s) => [
                'link' => $s->link()->value(),
                'icon' => $s->icon()->value()
              ]),
            ];
          }
        ]
      ],
    'beebmx.kirby-blade.bootstrap' => env('KIRBY_BLADE_BOOTSTRAP', true),
    'beebmx.kirby-blade.views' => $storage . '/views',
    'email' => [
        'transport' => [
            'type' => env('MAIL_DRIVER', 'mail'),
            'host' => env('MAIL_HOST', 'smtp.server.com'),
            'port' => env('MAIL_PORT', 465),
            'security' => env('MAIL_ENCRYPTION', 'tls'),
            'auth' => env('MAIL_AUTH', false),
            'username' => env('MAIL_USERNAME', ''),
            'password' => env('MAIL_PASSWORD', ''),
        ]
    ],
    'beebmx.kirby-blade.ifs' => [
        'env' => function ($environment) {
            return env('KIRBY_ENV', 'production') === $environment;
        },
        'local' => function () {
            return env('KIRBY_ENV', 'production') === 'local';
        },
        'production' => function () {
            return env('KIRBY_ENV', 'production') === 'production';
        },
    ],
    'beebmx.kirby-blade.directives' => [
        'ray' => function ($expression) {
            return "<?php ray($expression); ?>";
        },
    ],
    'beebmx.kirby-courier' => [
        'from' => [
            'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
            'name' => env('MAIL_FROM_NAME', 'Example'),
        ],
    ],
];
