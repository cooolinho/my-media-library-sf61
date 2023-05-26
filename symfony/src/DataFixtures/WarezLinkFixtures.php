<?php

namespace App\DataFixtures;

use App\Entity\WarezLink;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WarezLinkFixtures extends Fixture
{
    private static array $links = [
        ['Serienjunkies.org', 'https://serienjunkies.org/serie/%s'],
        ['thetvdb.com Suche', 'https://thetvdb.com/search?query=%s'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$links as [$name, $url]) {
            $link = new WarezLink();
            $link->setName($name);
            $link->setUrl($url);
            $manager->persist($link);
        }

        $manager->flush();
    }
}
