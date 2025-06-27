<?php

namespace App\Actions;

use Kirby\Cms\App;

class GetDataDetoxPage
{
    public function __invoke()
    {
        // Busca todas las páginas que usan la plantilla 'clasicos'
        $pages = App::instance()->site()->index()->filterBy('intendedTemplate', 'detox');

        if ($pages->isEmpty()) {
            return ['error' => 'No hay jugos detox'];
        }

        // Mapea cada página y devuelve su información
        return $pages->map(fn ($page) => [
            'title'        => $page->title()->value(),
            'slug'         => $page->slug(),
            'precio'       => $page->precio()->value(),
            'ingredientes' => $page->ingredientes()->kirbytext() ?? '',
            'descripcion' => $page->descripcion()->split(',') ?? [],
            'imagen'       => $page->imagen()->toFile()?->url() ?? null,
        ])->values();
    }
}
