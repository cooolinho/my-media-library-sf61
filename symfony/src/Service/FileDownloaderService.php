<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use ZipArchive;

class FileDownloaderService
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function downloadFromUrl(string $url, string $directory): ?string
    {
        $client = HttpClient::create();
        $filesystem = new Filesystem();

        if (!$filesystem->exists($directory)) {
            $filesystem->mkdir($directory);
        }
        try {
            $response = $client->request('GET', $url);

            if ($response->getStatusCode() === Response::HTTP_OK) {
                $content = $response->getContent();
                $filename = pathinfo($url, PATHINFO_BASENAME);


                $destinationFile = sprintf('%s/%s',
                    $directory,
                    $filename
                );

                if (!$filesystem->exists($destinationFile)) {
                    file_put_contents($destinationFile, $content);

                    return $filename;
                }
            }
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());
        }

        return null;
    }

    public function downloadFilesAsZip(array $filesToZip, string $zipFilePath, string $zipFilename = null): BinaryFileResponse
    {
        $filesystem = new Filesystem();
        if ($filesystem->exists($zipFilePath)) {
            $filesystem->remove($zipFilePath);
        }

        $zip = new ZipArchive();
        $zip->open($zipFilePath, ZipArchive::CREATE);

        foreach ($filesToZip as $file) {
            $zip->addFile($file, pathinfo($file, PATHINFO_BASENAME));
        }
        $zip->close();

        $response = new BinaryFileResponse($zipFilePath);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $zipFilename ?? pathinfo($zipFilePath, PATHINFO_BASENAME)
        );

        return $response;
    }
}
