<?php

return [
    [
      'pattern' => 'blassandrea/data/home',
      'method' => 'GET',
      'action' => function() {
        return (new App\Actions\GetDataHome)();
      }
    ],
    [
        'pattern' => 'blassandrea/footer/menu/images',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetFooterMenuImages)();
        }
      ],
      [
        'pattern' => 'blassandrea/header/logo',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetHeaderLogo)();
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