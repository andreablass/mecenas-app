<?php

return [
    [
      'pattern' => 'blassandrea/data/pages',
      'method' => 'GET',
      'action' => fn() => (new App\Actions\GetDataPages)()
    ],
  ];