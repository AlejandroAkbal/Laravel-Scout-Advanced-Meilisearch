<?php

namespace AlejandroAkbal\ScoutAdvancedMeilisearch\Facades\MeiliSearch;

use AlejandroAkbal\ScoutAdvancedMeilisearch\Interfaces\MeiliSearchSearchableModel;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void updateIndexSettings(MeiliSearchSearchableModel $model)
 */
class MeiliSearch extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'meiliSearch';
    }
}
