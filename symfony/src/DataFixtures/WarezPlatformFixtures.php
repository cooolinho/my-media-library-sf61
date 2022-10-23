<?php

namespace App\DataFixtures;

use App\Entity\WarezPlatform;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WarezPlatformFixtures extends Fixture
{
    private static array $platforms = [
        ['uploaded.net', 'https://uploaded.net'],
        ['filer.net', 'https://filer.net'],
        ['ddownload.com', 'https://ddownload.com'],
        ['rapidgator.net', 'https://rapidgator.net'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$platforms as [$name, $url]) {
            $platform = new WarezPlatform();
            $platform->setName($name);
            $platform->setUrl($url);

            $manager->persist($platform);
        }

        $manager->flush();
    }
}
