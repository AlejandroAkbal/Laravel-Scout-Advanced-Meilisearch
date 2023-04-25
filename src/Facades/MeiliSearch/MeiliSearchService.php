<?php

namespace AlejandroAkbal\ScoutAdvancedMeilisearch\Facades\MeiliSearch;

use AlejandroAkbal\ScoutAdvancedMeilisearch\Interfaces\MeiliSearchSearchableModel;
use MeiliSearch\Client;

class MeiliSearchService
{
    public function __construct(protected Client $meiliSearchClient)
    {

    }

    public function updateIndexSettings(MeilisearchSearchableModel $model)
    {
        $index = $this->meiliSearchClient->index($model->searchableAs());

        $index->updateSearchableAttributes($model->getSearchableAttributes());
        $index->updateSortableAttributes($model->getSortableAttributes());
        $index->updateFilterableAttributes($model->getFilterableAttributes());

        if (method_exists($model, 'getTypoToleranceSettings')) {
            $index->updateTypoTolerance($model->getTypoToleranceSettings());
        }
    }
}
