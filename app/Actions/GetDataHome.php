<?php

namespace App\Actions;

use Kirby\Cms\App;

class GetDataHome  {
    public function __invoke()
    {
        $home = App::instance()->site()->homePage() ;
        return [
            'mainImageLight' => $home->main_image()->toFile()?->url(),
            'mainImageDark'  => $home->darkMain_image()->toFile()?->url(),
            'logoLight'      => $home->logo()->toFile()?->url(),
            'description'    => $home->description()->kirbytext(),
            'menuButtonText' => $home->menuButtonText()->value(),
            'menuButtonLink' => $home->menuButtonLink()->value(),
            'reservasionesButtonText' => $home->reservasionesButtonText()->value(),
            'reservasionesButtonLink' => $home->reservasionesButtonLink()->value(),
            'schedule' => $home->schedule()->toStructure()->map(fn ($s) => [
              'day'   => $s->day()->value(),
              'hours' => $s->hours()->value()
            ]),
            'location' => $home->location()->value(),
            'social' => $home->social()->toStructure()->map(fn ($s) => [
              'icon' => $s->icon()->value(),
              'link' => $s->link()->value()
            ]),
            'share' => $home->share()->value(),
          ];
    }
}