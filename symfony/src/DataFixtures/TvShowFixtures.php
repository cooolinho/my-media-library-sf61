<?php

namespace App\DataFixtures;

use App\Entity\TvShow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TvShowFixtures extends Fixture
{
    private static array $tvshows = [
        ['2 Broke Girls', 248741],
        ['Alle unter einem Dach', 76732],
        ['American Dad', 73141],
        ['Anger Management', 253350],
        ['Better Call Saul', 273181],
        ['Blue Mountain State', 134511],
        ['Breaking Bad', 81189],
        ['Californication', 80349],
        ['Chip und Chap', 75477],
        ['ComedyStreet', 80402],
        ['Darkwing Duck', 75475],
        ['Der Prinz von Bel Air', 76738],
        ['Dexter', 79349],
        ['Dexter New Blood', 412366],
        ['Die Gummibaerenbande', 76081],
        ['Die Simpsons', 71663],
        ['Die Sopranos', 75299],
        ['Die Tex Avery Show', 251672],
        ['Die Tudors', 79925],
        ['Disneys Grosse Pause', 71780],
        ['Ehe ist', 79384],
        ['Ein Herz und eine Seele', 81303],
        ['Elton vs. Simon', 80172],
        ['Family Guy', 75978],
        ['Fear the Walking Dead', 290853],
        ['Flashpoint Das Spezialkommando', 82438],
        ['Friends', 79168],
        ['Fringe - Grenzfaelle des FBI', 82066],
        ['From Dusk Till Dawn', 276312],
        ['Futurama', 73871],
        ['Game of Thrones', 121361],
        ['Goofy & Max', 78250],
        ['Hausmeister Krause - Ordnung muss sein', 83523],
        ['Hey Arnold', 72005],
        ['House of Cards (US)', 262980],
        ['How I Met Your Mother', 75760],
        ['Immer wieder Jim', 75926],
        ['Justified', 134241],
        ['King of Queens', 73641],
        ['Limitless', 295743],
        ['Little Britain', 72135],
        ['Malcolm mittendrin', 73838],
        ['Medical Detectives - Geheimnisse der Gerichtsmedizin', 71415],
        ['Misfits', 124051],
        ['Modern Family', 95011],
        ['Mr. Robot', 289590],
        ['My Name is Earl', 75397],
        ['Narcos', 282670],
        ['New Girl', 248682],
        ['Prison Break', 360115],
        ['Rules of Engagement', 79842],
        ['Scrubs', 76156],
        ['Shameless', 161511],
        ['Sons of Anarchy', 82696],
        ['South Park', 75897],
        ['Stromberg', 79656],
        ['Suits', 247808],
        ['Squid Game', 383275],
        ["Takeshi's Castle", 74787],
        ['The Big Bang Theory', 80379],
        ['The Blacklist', 266189],
        ['The Hard Times of RJ Berger', 165851],
        ['The Middle', 95021],
        ['The Walking Dead', 153021],
        ['The Wire', 79126],
        ['Tom und Jerry', 72860],
        ['True Detective', 270633],
        ['Two and a Half Man', 72227],
        ['Typisch Andy', 92241],
        ['Under the Dome', 264492],
        ['Vikings', 260449],
        ['Weeds', 74845],
        ['Weihnachtsmann und Co. KG', 123891],
        ['Wickie und die starken Männer', 81643],
        ['Yu-Gi-Oh! Capsule Monsters', 267996],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$tvshows as [$name, $theTvDbId]) {
            $tvShow = new TvShow();
            $tvShow->setName($name);
            if (0 !== $theTvDbId) {
                $tvShow->setTheTvDbId($theTvDbId);
            }

            $manager->persist($tvShow);
        }

        $manager->flush();
    }
}
