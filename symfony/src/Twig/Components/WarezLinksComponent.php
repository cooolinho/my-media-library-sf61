<?php

namespace App\Twig\Components;

use App\Repository\WarezLinkRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('warez_links')]
class WarezLinksComponent
{
    #[ExposeInTemplate]
    public string $tvshow = '';
    protected WarezLinkRepository $warezLinkRepository;

    public function __construct(WarezLinkRepository $warezLinkRepository)
    {
        $this->warezLinkRepository = $warezLinkRepository;
    }

    public function getLinks(): array
    {
        $links = [];

        foreach ($this->warezLinkRepository->findAll() as $link) {
            $links[] = $link->setUrl(sprintf($link->getUrl(), urlencode($this->tvshow)));
        }

        return $links;
    }
}
