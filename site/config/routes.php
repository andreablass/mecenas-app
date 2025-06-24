<?php

return [
  [
    'pattern' => 'data-home',
    'method'  => 'GET',
    'action'  => function () {
      $page = page('home');

      if (!$page) {
        return [
          'status' => 'error',
          'message' => 'Página home no encontrada',
        ];
      }

      return [
        'mainImageLight' => $page->main_image()->toFile()?->url(),
        'mainImageDark'  => $page->darkMain_image()->toFile()?->url(),
        'logoLight'      => $page->logo()->toFile()?->url(),
        'description'    => $page->description()->kirbytext(),
        'menuButtonText' => $page->menuButtonText()->value(),
        'menuButtonLink' => $page->menuButtonLink()->value(),
        'reservasionesButtonText' => $page->reservasionesButtonText()->value(),
        'reservasionesButtonLink' => $page->reservasionesButtonLink()->value(),
        'schedule' => $page->schedule()->toStructure()->map(fn ($s) => [
          'day'   => $s->day()->value(),
          'hours' => $s->hours()->value()
        ]),
        'location' => $page->location()->value(),
        'social' => $page->social()->toStructure()->map(fn ($s) => [
          'icon' => $s->icon()->value(),
          'link' => $s->link()->value()
        ]),
        'share' => $page->share()->value(),
      ];
    }
  ],
  [
    'pattern' => 'data-menu-images',
    'method'  => 'GET',
    'action'  => function () {
      $site = kirby()->site();
  
      return [
        'especiales' => $site->imagen_especiales()->toFile()?->url(),
        'frutal'     => $site->imagen_frutal()->toFile()?->url(),
        'platillos'  => $site->imagen_platillos()->toFile()?->url(),
        'clasicos'   => $site->imagen_clasicos()->toFile()?->url(),
        'detox'      => $site->imagen_detox()->toFile()?->url(),
      ];
    }
  ],
  [
    'pattern' => 'data-header',
    'method'  => 'GET',
    'action'  => function () {
      $page = page('home'); 
  
      return [
        'headerImage' => $page->logo()->toFile()?->url(), // <-- accede al logo de la página home
      ];
    }
  ],  
  
];
