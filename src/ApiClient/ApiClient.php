<?php

namespace App\ApiClient;

use Api\Dto\ItemV1;
use Api\Dto\UserV1;
use Api\Dto\UserV2;
use Api\Dto\UserV3;
use GuzzleHttp\Client;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
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
    private $serializerWithoutCollections;

    /**
     * ApiClient constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->serializerWithoutCollections = new Serializer([
            new DateTimeNormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
            new ArrayDenormalizer()
        ], [
            new JsonEncoder()
        ]);
    }

    private function pathToDtoArrayWithoutCollections($uri, $dtoClass): array
    {
        $data = $this->client->get($uri);
        $content = $data->getBody()->getContents();

        return $this->serializerWithoutCollections->deserialize($content, $dtoClass . '[]', 'json');
    }

    private function pathToDtoArrayWithPhpSerialize($uri): array
    {
        $data = $this->client->get($uri, [
            'headers' => [
                'Accept' => 'application/vnd.demo.dto'
            ]
        ]);
        $content = $data->getBody()->getContents();

        return unserialize($content);
    }

    /**
     * @return UserV1[]
     */
    public function getUsersV1(): array
    {
        return $this->pathToDtoArrayWithoutCollections('/api/v1/users', UserV1::class);
    }

    /**
     * @return UserV2[]
     */
    public function getUsersV2(): array
    {
        return $this->pathToDtoArrayWithoutCollections('/api/v2/users', UserV2::class);
    }

    /**
     * @return UserV3[]
     */
    public function getUsersV3(): array
    {
        return $this->pathToDtoArrayWithoutCollections('/api/v3/users', UserV3::class);
    }

    /**
     * @return UserV1[]
     */
    public function getItemsV1(): array
    {
        return $this->pathToDtoArrayWithoutCollections('/api/v1/items', ItemV1::class);
    }

    /**
     * @return UserV1[]
     */
    public function getItemsV1Php(): array
    {
        return $this->pathToDtoArrayWithPhpSerialize('/api/v1/items');
    }
}
