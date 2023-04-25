# Scout Advanced Meilisearch

## What this package provides

### Extended scout query builder

Added next changes to the basic query builder:

1) ```where('column', '<=', $value)``` - extended where, which supports 3 optional parameters for comparison.
   Two parameters are also allowed.
2) ```where(Clusure $query)``` - where can take a closure as the first parameter in order to group queries (the same
   for ```orWhere```)
3) ```whereBetween('column', [$value1, $value2])```
4) ```whereNotIn('column', [$value1, $value2, $value3])```
5) All where clauses have or variant: ```orWhere```, ```orWhereIn```, etc

### Two scout drivers

The drivers are compatible with the new scout builder.

- meilisearch_advanced
- collection_advanced

#### meilisearch_advanced

Uses all the advantages of meilisearch for comparison the results, searching in indexed arrays.
Also fixes an issue with the calculation of the total number of values.
(The current implementation requests the entire dataset in case scout builder has ```->query()``` method used)

#### collection_advanced

The driver imitates how meilisearch work and completely relies on collections. It should be used
only for tests as the whole searchable models data is in memory.
The driver allows testing filtering and sorting as well as Extended scout builder features.

## How to use?

1) In ```config/scout.php``` set ```'driver'``` to ```meilisearch_advanced``` or ```collection_advanced``` (for tests)

## Development

### PHP

Use PHP with Docker

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install
```

#### Run tests

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer test
```

### Publish

You can publish a package version with:

```bash
git tag -a 1.0.0 -m "First release"
git push --tags
```
