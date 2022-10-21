<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getCacheDir(): string
    {
        return $this->getPath() . '/cache';
    }

    public function getLogDir(): string
    {
        return $this->getPath() . '/log';
    }

    private function getPath(): string
    {
        $path = dirname(__DIR__) . '/var/' . $this->environment;

        if ('dev' === $this->environment) {
            $path = '/tmp/symfony/';
        }

        return $path;
    }
}
