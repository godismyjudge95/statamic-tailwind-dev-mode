<?php

namespace Godismyjudge95\StatamicTailwindDevMode;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        Tags\TailwindDevMode::class,
    ];

    public function bootAddon()
    {
        //
    }
}
