<?php declare(strict_types=1);

namespace Frosh\BunnycdnMediaStorage\Entities;

use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class BunnydnCacheEntity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var string
     */
    protected $encoder;

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    public function getEncoder(): string
    {
        return $this->hash;
    }

    public function setEncoder(string $encoderName): void
    {
        $this->encoder = $encoderName;
    }
}
