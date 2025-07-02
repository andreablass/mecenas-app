<?php

namespace App\Actions;
use App\Helpers\ImageHelper;
use Kirby\Cms\App;

class GetDataPages
{
    public function __invoke()
    {
        // Busca todas las páginas que usan la plantilla 'clasicos'
        $clasicoPage = App::instance()->site()->index()->filterBy('intendedTemplate', 'clasicos');
        $detoxPages = App::instance()->site()->index()->filterBy('intendedTemplate', 'detox');
        $especialesPages = App::instance()->site()->index()->filterBy('intendedTemplate', 'especiales');
        $home = App::instance()->site()->homePage() ;
        $platillosPages = App::instance()->site()->index()->filterBy('intendedTemplate', 'platillos');
        $site = App::instance()->site() ;

        if ($clasicoPage->isEmpty()) {
            return ['error' => 'No hay jugos clásicos'];
        }

        // Mapea cada página y devuelve su información
        return $clasicoPage->map(fn ($page) => [
            'title'        => $page->title()->value(),
            'slug'         => $page->slug(),
            'precio'       => $page->precio()->value(),
            'descripcion' => $page->descripcion()->value() ?? '',
            'sugerencia'  => $page->sugerencia()->value() ?? '',
            'lista'       => $page->lista()->value() ?? '',            
            'imagen'       => $page->imagen()->toFile()?->url() ?? null,
        ])->values();

        if ($detoxPages->isEmpty()) {
            return ['error' => 'No hay jugos detox'];
        }

        return $detoxPages->map(fn ($page) => [
            'title'        => $page->title()->value(),
            'slug'         => $page->slug(),
            'precio'       => $page->precio()->value(),
            'ingredientes' => $page->ingredientes()->kirbytext() ?? '',
            'descripcion' => $page->descripcion()->split(',') ?? [],
            'imagen'       => $page->imagen()->toFile()?->url() ?? null,
        ])->values();

        if ($especialesPages->isEmpty()) {
            return ['error' => 'No hay jugos especiales'];
        }

        return $especialesPages->map(fn ($page) => [
            'title'        => $page->title()->value(),
            'slug'         => $page->slug(),
            'precio'       => $page->precio()->value(),
            'ingredientes' => $page->ingredientes()->kirbytext() ?? '',
            'descripcion' => $page->descripcion()->split(',') ?? [],
            'imagen'       => $page->imagen()->toFile()?->url() ?? null,
        ])->values();

        $frutalesPages = App::instance()->site()->index()->filterBy('intendedTemplate', 'frutales');

        if ($frutalesPages->isEmpty()) {
            return ['error' => 'No hay jugos frutales'];
        }

        return $frutalesPages->map(fn ($page) => [
            'title'        => $page->title()->value(),
            'slug'         => $page->slug(),
            'precio'       => $page->precio()->value(),
            'ingredientes' => $page->ingredientes()->kirbytext() ?? '',
            'descripcion' => $page->descripcion()->split(',') ?? [],
            'imagen'       => $page->imagen()->toFile()?->url() ?? null,
        ])->values();

        return [
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
          ];

          if ($platillosPages->isEmpty()) {
              return ['error' => 'No hay jugos platillos'];
          }
  
          return $platillosPages->map(fn ($page) => [
              'title'        => $page->title()->value(),
              'slug'         => $page->slug(),
              'precio'       => $page->precio()->value(),
              'ingredientes' => $page->ingredientes()->kirbytext() ?? '',
              'descripcion' => $page->descripcion()->split(',') ?? [],
              'imagen'       => $page->imagen()->toFile()?->url() ?? null,
          ])->values();

          return [
              'clasicos' => ImageHelper::getFileUrl($site->imagen_clasicos()),
              'platillos' => ImageHelper::getFileUrl($site->imagen_platillos()),
              'especiales' => ImageHelper::getFileUrl($site->imagen_especiales()),
              'frutales' => ImageHelper::getFileUrl($site->imagen_frutal()),
              'detox' => ImageHelper::getFileUrl($site->imagen_detox()),
            ];        
            return [
                'logoImage' => $home->logo()->toFile()?->url(), // <-- accede al logo de la página home
              ];
    }
}
