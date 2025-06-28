<?php

namespace App\Actions;

use App\Helpers\ImageHelper;
use Kirby\Cms\App;

class GetDataPlatillosPage  {
    public function __invoke()
    {
        // Busca todas las páginas que usan la plantilla 'platillos'
        $pages = App::instance()->site()->index()->filterBy('intendedTemplate', 'platillos');

        if ($pages->isEmpty()) {
            return ['error' => 'No hay jugos platillos'];
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
