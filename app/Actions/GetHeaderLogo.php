<?php

namespace App\Actions;

use Kirby\Cms\App;

class GetHeaderLogo  {
    public function __invoke()
    {
        $home = App::instance()->site()->homePage() ;
        
        return [
            'headerImage' => $home->logo()->toFile()?->url(), // <-- accede al logo de la página home
          ];
    }
}