<?php

namespace Frosh\BunnycdnMediaStorage\Component;

use Doctrine\Common\Cache\CacheProvider;
use Exception;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

class BunnycdnCache extends CacheProvider
{

    /**
     * @var EntityRepositoryInterface
     */
    private $cacheEntityRepository;

    public function __construct(EntityRepositoryInterface $cacheEntityRepository)
    {
        $this->cacheEntityRepository = $cacheEntityRepository;
    }

    /**
     * @inheritDoc
     */
    protected function doFetch($path)
    {
        //TODO: ready machen
        return $this->cacheEntityRepository->search(
            (new Criteria())->addFilter(new EqualsFilter('path', $path)),
            Context::createDefaultContext()
        )->get('hash');
    }

    /**
     * @inheritDoc
     */
    protected function doContains($path)
    {
        // TODO: Implement doContains() method.
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function doSave($path, $data, $lifeTime = 0)
    {
        if (!is_array($data)) {
            throw new Exception('no array given');
        }

        if (!isset($data['path'])) {
            throw new Exception('no path given');
        }

        if (!isset($data['hash'])) {
            throw new Exception('no hash given');
        }

        if (!isset($data['encoder'])) {
            $data['encoder'] = 'sha1';
        }

        return $this->cacheEntityRepository->create(
            $data,
            Context::createDefaultContext()
        );
    }

    /**
     * @inheritDoc
     */
    protected function doDelete($path)
    {
        // TODO: Implement doDelete() method.
    }

    /**
     * @inheritDoc
     */
    protected function doFlush()
    {
        // TODO: Implement doFlush() method.
    }

    /**
     * @inheritDoc
     */
    protected function doGetStats()
    {
        // TODO: Implement doGetStats() method.
    }
}
