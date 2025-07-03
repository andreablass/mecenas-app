<?php

namespace App\Actions;

use Kirby\Cms\App;
use App\Helpers\ImageHelper;

class GetDataPages
{
    public function __invoke()
    {
        $app = App::instance();
        $site = $app->site();
        $home = $site->homePage();

        $clasicos = $app->site()->index()->filterBy('intendedTemplate', 'clasicos')->map(fn ($page) => [
            'title'       => $page->title()->value(),
            'slug'        => $page->slug(),
            'precio'      => $page->precio()->value(),
            'descripcion' => $page->descripcion()->value() ?? '',
            'sugerencia'  => $page->sugerencia()->value() ?? '',
            'lista'       => $page->lista()->value() ?? '',
            'imagen'      => $page->imagen()->toFile()?->url(),
        ])->values();

        $especiales = $app->site()->index()->filterBy('intendedTemplate', 'especiales')->map(fn ($page) => [/*...*/])->values();
        $detox = $app->site()->index()->filterBy('intendedTemplate', 'detox')->map(fn ($page) => [/*...*/])->values();
        $frutales = $app->site()->index()->filterBy('intendedTemplate', 'frutales')->map(fn ($page) => [/*...*/])->values();
        $platillos = $app->site()->index()->filterBy('intendedTemplate', 'platillos')->map(fn ($page) => [/*...*/])->values();

        return [
            'clasicos' => $clasicos,
            'especiales' => $especiales,
            'detox' => $detox,
            'frutales' => $frutales,
            'platillos' => $platillos,
            'home' => [
                'mainImageLight' => $home->main_image()->toFile()?->url(),
                'mainImageDark'  => $home->darkMain_image()->toFile()?->url(),
                'logoLight'      => $home->logo()->toFile()?->url(),
                'nameImage'      => $home->name_image()->toFile()?->url(),
                'description'    => $home->description()->value(),
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
            ],
            'backgrounds' => [
                'clasicos' => ImageHelper::getFileUrl($site->imagen_clasicos()),
                'platillos' => ImageHelper::getFileUrl($site->imagen_platillos()),
                'especiales' => ImageHelper::getFileUrl($site->imagen_especiales()),
                'frutales' => ImageHelper::getFileUrl($site->imagen_frutal()),
                'detox' => ImageHelper::getFileUrl($site->imagen_detox()),
            ]
        ];
    }
}
