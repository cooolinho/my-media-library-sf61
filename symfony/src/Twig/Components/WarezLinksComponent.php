<?php

namespace App\Twig\Components;

use App\Entity\TvShow;
use App\Repository\WarezLinkRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('warez_links')]
class WarezLinksComponent
{
    #[ExposeInTemplate]
    public ?TvShow $tvshow = null;
    protected WarezLinkRepository $warezLinkRepository;

    public function __construct(WarezLinkRepository $warezLinkRepository)
    {
        $this->warezLinkRepository = $warezLinkRepository;
    }

    public function getLinks(): array
    {
        if ($this->tvshow === null) {
            return [];
        }

        $links = [];
        foreach ($this->warezLinkRepository->findAll() as $link) {
            $links[] = $link->setUrl(sprintf($link->getUrl(), str_replace(' ', '-', $this->tvshow->getWarezSearchTerm())));
        }

        return $links;
    }
}
