<?php declare(strict_types=1);

namespace Frosh\BunnycdnMediaStorage;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

class FroshPlatformBunnycdnMediaStorage extends Plugin
{
    public function update(UpdateContext $updateContext): void
    {
        if ($updateContext->getCurrentPluginVersion() === '1.0.0') {
            $this->container->get('filesystem')->remove(
                $this->container->getParameter('kernel.root_dir') . '/var/cache/bunnycdn_storage'
            );
        }
    }
}
