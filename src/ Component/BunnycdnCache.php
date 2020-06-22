<?php declare(strict_types=1);

namespace Frosh\BunnycdnMediaStorage\Component;

use Doctrine\Common\Cache\CacheProvider;
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
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    protected function doContains($path): void
    {
        // TODO: Implement doContains() method.
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    protected function doSave($path, $data, $lifeTime = 0)
    {
        if (!is_array($data)) {
            throw new \Exception('no array given');
        }

        if (!isset($data['path'])) {
            throw new \Exception('no path given');
        }

        if (!isset($data['hash'])) {
            throw new \Exception('no hash given');
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
     * {@inheritdoc}
     */
    protected function doDelete($path): void
    {
        // TODO: Implement doDelete() method.
    }

    /**
     * {@inheritdoc}
     */
    protected function doFlush(): void
    {
        // TODO: Implement doFlush() method.
    }

    /**
     * {@inheritdoc}
     */
    protected function doGetStats(): void
    {
        // TODO: Implement doGetStats() method.
    }
}
