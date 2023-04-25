<?php

namespace AlejandroAkbal\ScoutAdvancedMeilisearch\Interfaces;

interface MeilisearchSearchableModel
{
    public function getSearchableAttributes(): array;

    public function getFilterableAttributes(): array;

    public function getSortableAttributes(): array;

    public function toSearchableArray(): array;
}
