<?php

namespace App\Actions;

use App\Helpers\ImageHelper;
use Kirby\Cms\App;

class GetFooterMenuImages  {
    public function __invoke()
    {
        $site = App::instance()->site() ;
        return [
            'clasicos' => ImageHelper::getFileUrl($site->imagen_clasicos()),
            'platillos' => ImageHelper::getFileUrl($site->imagen_platillos()),
            'especiales' => ImageHelper::getFileUrl($site->imagen_especiales()),
            'frutales' => ImageHelper::getFileUrl($site->imagen_frutal()),
            'detox' => ImageHelper::getFileUrl($site->imagen_detox()),
          ];
    }
}