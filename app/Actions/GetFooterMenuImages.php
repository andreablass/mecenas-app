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
            'especiales' => ImageHelper::getFileUrl($site->imagen_especiales()),
            'frutal' => ImageHelper::getFileUrl($site->imagen_frutal()),
            'platillos' => ImageHelper::getFileUrl($site->imagen_platillos()),
            'detox' => ImageHelper::getFileUrl($site->imagen_detox()),
          ];
    }
}