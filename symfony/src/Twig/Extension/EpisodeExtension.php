<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\EpisodeExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class EpisodeExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('episode_show_url', [EpisodeExtensionRuntime::class, 'getEpisodeShowUrl']),
        ];
    }
}
