<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response\Traits;

use Symfony\Contracts\HttpClient\ResponseInterface;

trait UseLinksTrait
{
    private array $links = [];

    public function getLinks(): array
    {
        return $this->links;
    }

    public function setLinks(ResponseInterface $response): self
    {
        if (($originalResponse = $response->toArray()) && isset($originalResponse['links'])) {
            $this->links = $originalResponse['links'];
        }

        return $this;
    }

    public function getPrevLink()
    {
        return $this->getLink('prev');
    }

    public function getSelfLink()
    {
        return $this->getLink('self');
    }

    public function getSelfPageNr(): int
    {
        if (!$this->getSelfLink()) {
            return 0;
        }

        $queries = parse_url($this->getSelfLink(), PHP_URL_QUERY);
        parse_str($queries, $params);

        return (int) $params['page'];
    }

    public function getNextLink()
    {
        return $this->getLink('next');
    }

    public function getNextPageNr(): int
    {
        if (!$this->getNextLink()) {
            return 0;
        }

        $queries = parse_url($this->getNextLink(), PHP_URL_QUERY);
        parse_str($queries, $params);

        return (int) $params['page'];
    }

    public function getTotalItems()
    {
        return $this->getLink('total_items') ?? 0;
    }

    public function getPageSize()
    {
        return $this->getLink('page_size') ?? 0;
    }

    private function getLink(string $key)
    {
        return $this->links[$key] ?? null;
    }
}
