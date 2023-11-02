<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Api;

enum SeasonType: string
{
    const DEFAULT = 'default';
    const OFFICIAL = 'official';
    const ALTERNATE = 'alternate';
    const REGIONAL = 'regional';
    const DVD = 'dvd';
}
