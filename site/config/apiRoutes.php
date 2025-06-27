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
        'pattern' => 'blassandrea/data/clasicosPage',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetDataClasicosPage)();
        }
      ],
      [
        'pattern' => 'blassandrea/data/especialesPage',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetDataEspecialesPage)();
        }
      ],
      [
        'pattern' => 'blassandrea/data/frutalesPage',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetDataFrutalesPage)();
        }
      ],
      [
        'pattern' => 'blassandrea/data/detoxPage',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetDataDetoxPage)();
        }
      ],
      [
        'pattern' => 'blassandrea/data/platillosPage',
        'method' => 'GET',
        'action' => function() {
          return (new App\Actions\GetDataPlatillosPage)();
        }
      ],
    
  ];