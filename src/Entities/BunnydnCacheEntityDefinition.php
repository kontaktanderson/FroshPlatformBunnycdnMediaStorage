<?php declare(strict_types=1);

namespace Frosh\BunnycdnMediaStorage\Entities;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class BunnydnCacheEntityDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'bunnycdn_cache_entity';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return BunnydnCacheEntityDefinitionCollection::class;
    }

    public function getEntityClass(): string
    {
        return BunnydnCacheEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new StringField('path', 'path'),
            new StringField('hash', 'hash'),
            new StringField('encoder', 'encoder'),
        ]);
    }
}
