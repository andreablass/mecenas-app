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
        'logoDark'       => $page->darkLogo()->toFile()?->url(),
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
  'pattern' => 'data-footer',
  'method' => 'GET',
  'action' => function () {
    $site = kirby()->site();
    $pages = $site->footer()->toPages(); // campo tipo `pages` desde site.yml

    $items = [];

    foreach ($pages as $page) {
      $image = $page->images()->first(); // toma la primera imagen
      $items[] = [
        'title' => $page->title()->value(),
        'url' => $page->url(),
        'image' => $image ? $image->url() : null,
      ];
    }

    return [
      'footerItems' => $items
    ];
  }
],

];
