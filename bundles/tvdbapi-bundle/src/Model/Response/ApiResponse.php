<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class ApiResponse
{
    private array $data = [];
    private string $status = '';

    public function __construct(ResponseInterface $response = null)
    {
        if ($response) {
            $this->handleResponse($response);
        }
    }

    public function handleResponse(ResponseInterface $response): ApiResponse
    {
        if (Response::HTTP_OK === $response->getStatusCode()) {
            $content = $response->toArray();
            $this->data = $content['data'];
            $this->status = $content['status'];
        }

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): ApiResponse
    {
        $this->data = $data;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): ApiResponse
    {
        $this->status = $status;

        return $this;
    }
}
