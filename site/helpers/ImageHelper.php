<?php

namespace App\Helpers;

class ImageHelper 
{
    public static function getFileUrl($field) 
    {
        return $field?->toFile()?->url() ?? null;
    }
}
