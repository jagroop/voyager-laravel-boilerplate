<?php

namespace App\Helpers;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

class EnvironmentPathGenerator implements PathGenerator
{
    public function getPath(Media $media) : string
    {
        return 'medialibrary/' . md5($media->id).'/';
    }

    public function getPathForConversions(Media $media) : string
    {
        return $this->getPath($media).'c/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'/cri/';
    }
}