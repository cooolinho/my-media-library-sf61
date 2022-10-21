<?php declare(strict_types=1);

namespace App\Service;

use App\Model\TheTVDB\Response\ApiResponse;
use Exception;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TheTVDBApiService implements ApiServiceInterface
{
    private const SESSION_AUTH_TOKEN = 'thetvdb_auth_token';

    protected HttpClientInterface $client;
    protected RequestStack $requestStack;
    protected string $apiKey;
    protected string $apiPin;
    protected bool $hasAuthToken;
    protected LoggerInterface $logger;

    public function __construct(
        HttpClientInterface   $thetvdbClient,
        RequestStack          $requestStack,
        ParameterBagInterface $parameterBag,
        LoggerInterface       $logger
    )
    {
        $this->client = $thetvdbClient;
        $this->requestStack = $requestStack;

        $this->hasAuthToken = $this->requestStack->getSession()->has(self::SESSION_AUTH_TOKEN);

        $this->apiKey = $parameterBag->get('thetvdb.apikey');
        $this->apiPin = $parameterBag->get('thetvdb.pin');
        $this->logger = $logger;
    }

    /**
     * @return bool
     * @throws ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface
     */
    public function login(): bool
    {
        try {
            $response = $this->client->request(Request::METHOD_POST, 'login', [
                'json' => [
                    'apikey' => $this->apiKey,
                    'pin' => $this->apiPin,
                ],
            ]);

            if ($response->getStatusCode() === Response::HTTP_OK) {
                $content = $response->toArray();

                if ($content['status'] === 'success') {
                    $this->requestStack->getSession()->set(self::SESSION_AUTH_TOKEN, $content['data']['token']);

                    return true;
                }
            }
        } catch (Exception $e) {
            $this->logger->log(LogLevel::ERROR, $e->getMessage());
        }

        return false;
    }

    /**
     * @param string $path
     * @param array $query
     * @param string $method
     * @return ApiResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function request(string $path, array $query = [], string $method = Request::METHOD_GET): ApiResponse
    {
        if (!$this->hasAuthToken) {
            $this->login();
        }

        $apiResponse = new ApiResponse();

        try {
            $response = $this->client->request($method, $path, [
                'auth_bearer' => $this->requestStack->getSession()->get(self::SESSION_AUTH_TOKEN),
                'query' => $query,
            ]);

            $apiResponse->handleResponse($response);
        } catch (Exception|ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            $this->logger->log(LogLevel::ERROR, $e->getMessage());
        }

        return $apiResponse;
    }
}
