<?php

namespace App\Actions;

use Kirby\Cms\App;

class GetDataEspecialesPage
{
    public function __invoke()
    {
        $page = App::instance()->site()->find('clasicos');

        if (!$page) {
            return ['error' => 'Página no encontrada'];
        }

        return [
            'title' => $page->title()->value(),
            'slug'  => $page->slug(),
            'destilados' => $page->destilados()->toStructure()->map(fn ($d) => [
                'nombre' => $d->nombre()->value(),
                'precio' => $d->precio()->value()
            ])
        ];
    }
}
