<?php declare(strict_types=1);

namespace App\Model\TheTVDB\Response;

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
        if ($response->getStatusCode() === Response::HTTP_OK) {
            $content = $response->toArray();
            $this->data = $content['data'];
            $this->status = $content['status'];
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return ApiResponse
     */
    public function setData(array $data): ApiResponse
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ApiResponse
     */
    public function setStatus(string $status): ApiResponse
    {
        $this->status = $status;
        return $this;
    }
}
