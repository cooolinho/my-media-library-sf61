<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class StringExtensionRuntime implements RuntimeExtensionInterface
{
    public function strPadLeft($value, int $length = 2, string $padString = '0'): string
    {
        return str_pad($value, $length, $padString, STR_PAD_LEFT);
    }
}
