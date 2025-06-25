<?php

namespace App\Actions;

use Kirby\Cms\App;

class GetFooterMenuImages  {
    public function __invoke()
    {
        $site = App::instance()->site() ;
        return [
            'especiales' => $site->imagen_especiales()->toFile()?->url(),
            'frutal'     => $site->imagen_frutal()->toFile()?->url(),
            'platillos'  => $site->imagen_platillos()->toFile()?->url(),
            'clasicos'   => $site->imagen_clasicos()->toFile()?->url(),
            'detox'      => $site->imagen_detox()->toFile()?->url(),
          ];
    }
}