<?php

namespace App\ApiClient;

use Api\Dto\UserV3;
use GuzzleHttp\Client;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiClient
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ApiClient constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->serializer = new Serializer([
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
            new ArrayDenormalizer()
        ], [
            new JsonEncoder()
        ]);
    }

    private function pathToDtoArray($uri, $dtoClass): array
    {
        $data = $this->client->get($uri);
        $content = $data->getBody()->getContents();

        return $this->serializer->deserialize($content, $dtoClass . '[]', 'json');
    }

    /**
     * @return UserV3[]
     */
    public function getUsers(): array
    {
        return $this->pathToDtoArray('/api/v3/users', UserV3::class);
    }
}