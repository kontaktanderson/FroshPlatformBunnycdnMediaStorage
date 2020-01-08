<?php declare(strict_types=1);

namespace Frosh\BunnycdnMediaStorage\Entities;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                    add(BunnydnCacheEntity $entity)
 * @method void                    set(string $key, BunnydnCacheEntity $entity)
 * @method BunnydnCacheEntity[]    getIterator()
 * @method BunnydnCacheEntity[]    getElements()
 * @method BunnydnCacheEntity|null get(string $key)
 * @method BunnydnCacheEntity|null first()
 * @method BunnydnCacheEntity|null last()
 */
class BunnydnCacheEntityDefinitionCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return BunnydnCacheEntity::class;
    }
}
