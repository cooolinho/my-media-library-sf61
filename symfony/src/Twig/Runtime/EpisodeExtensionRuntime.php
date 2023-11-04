<?php

declare(strict_types=1);

namespace App\Twig\Runtime;

use App\Controller\Admin\DashboardController;
use App\Controller\Admin\EpisodeCrudController;
use App\Entity\Episode;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Twig\Extension\RuntimeExtensionInterface;

class EpisodeExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(protected AdminUrlGenerator $adminUrlGenerator)
    {
    }

    public function getEpisodeShowUrl(Episode $episode): string
    {
        return $this->adminUrlGenerator
            ->setDashboard(DashboardController::class)
            ->setController(EpisodeCrudController::class)
            ->setEntityId($episode->getId())
            ->setAction(Action::DETAIL)
            ->generateUrl();
    }
}
