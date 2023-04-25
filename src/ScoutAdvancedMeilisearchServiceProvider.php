<?php

namespace AlejandroAkbal\ScoutAdvancedMeilisearch;

use AlejandroAkbal\ScoutAdvancedMeilisearch\Engines\CollectionMeiliSearchTestEngine;
use AlejandroAkbal\ScoutAdvancedMeilisearch\Engines\MeiliSearchExtendedEngine;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use Meilisearch\Client;

class ScoutAdvancedMeilisearchServiceProvider extends ServiceProvider
{

    public function boot()
    {
        resolve(EngineManager::class)->extend('meilisearch_advanced', function () {
            return new MeiliSearchExtendedEngine(
                app(Client::class),
                config('scout.soft_delete', false)
            );
        });

        resolve(EngineManager::class)->extend('collection_advanced', function () {
            return new CollectionMeiliSearchTestEngine();
        });
    }
}
