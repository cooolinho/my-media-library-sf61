<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\TvShow;
use App\Service\ImportService;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TvShowSubscriber implements EventSubscriberInterface
{
    protected ImportService $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterEntityPersistedEvent::class => 'onAfterEntityPersistedEvent',
        ];
    }

    public function onAfterEntityPersistedEvent(AfterEntityPersistedEvent $event): void
    {
        if (($tvShow = $event->getEntityInstance()) && !$tvShow instanceof TvShow) {
            return;
        }

        $this->importService->importEpisodesFromTheTVDB($tvShow);
    }
}
