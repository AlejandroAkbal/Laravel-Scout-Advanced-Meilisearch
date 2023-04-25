<?php

namespace AlejandroAkbal\ScoutAdvancedMeilisearch;

use AlejandroAkbal\ScoutAdvancedMeilisearch\Engines\CollectionMeiliSearchTestEngine;
use AlejandroAkbal\ScoutAdvancedMeilisearch\Engines\MeiliSearchExtendedEngine;
use AlejandroAkbal\ScoutAdvancedMeilisearch\Facades\MeiliSearch\MeiliSearchService;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use MeiliSearch\Client;

class ScoutAdvancedMeilisearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('meiliSearch', function () {
            return new MeiliSearchService(app()->make(Client::class));
        });
    }

    public function boot()
    {
        resolve(EngineManager::class)->extend('collection_advanced', function () {
            return new CollectionMeiliSearchTestEngine();
        });

        resolve(EngineManager::class)->extend('meilisearch_advanced', function () {
            return new MeiliSearchExtendedEngine(
                app(Client::class),
                config('scout.soft_delete', false)
            );
        });
    }
}
