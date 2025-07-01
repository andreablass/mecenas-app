<?php

namespace App\Actions;

use Kirby\Cms\App;

class GetDataClasicosPage
{
    public function __invoke()
    {
        // Busca todas las páginas que usan la plantilla 'clasicos'
        $pages = App::instance()->site()->index()->filterBy('intendedTemplate', 'clasicos');

        if ($pages->isEmpty()) {
            return ['error' => 'No hay jugos clásicos'];
        }

        // Mapea cada página y devuelve su información
        return $pages->map(fn ($page) => [
            'title'        => $page->title()->value(),
            'slug'         => $page->slug(),
            'precio'       => $page->precio()->value(),
            'descripcion' => $page->descripcion()->value() ?? '',
            'sugerencia'  => $page->sugerencia()->value() ?? '',
            'lista'       => $page->lista()->value() ?? '',            
            'imagen'       => $page->imagen()->toFile()?->url() ?? null,
        ])->values();
    }
}
