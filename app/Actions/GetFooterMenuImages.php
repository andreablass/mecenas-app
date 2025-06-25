<?php

namespace App\Actions;

use App\Helpers\ImageHelper;
use Kirby\Cms\App;

class GetFooterMenuImages  {
    public function __invoke()
    {
        $site = App::instance()->site() ;
        return [
            'especiales' => ImageHelper::getFileUrl($site->imagen_especiales()),
            'frutal' => ImageHelper::getFileUrl($site->imagen_frutal()),
            'platillos' => ImageHelper::getFileUrl($site->imagen_platillos()),
            'clasicos' => ImageHelper::getFileUrl($site->imagen_clasicos()),
            'detox' => ImageHelper::getFileUrl($site->imagen_detox()),
          ];
    }
}