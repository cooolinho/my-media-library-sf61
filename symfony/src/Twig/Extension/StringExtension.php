<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\StringExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class StringExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('str_pad_left', [StringExtensionRuntime::class, 'strPadLeft']),
        ];
    }
}
