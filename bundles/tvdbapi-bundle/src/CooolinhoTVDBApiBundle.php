<?php

namespace Cooolinho\Bundle\TVDBApiBundle;

use Cooolinho\Bundle\TVDBApiBundle\DependencyInjection\CooolinhoTVDBApiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CooolinhoTVDBApiBundle extends Bundle
{

    public function getContainerExtension(): CooolinhoTVDBApiExtension
    {
        return new CooolinhoTVDBApiExtension();
    }
}
