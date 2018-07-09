<?php
declare(strict_types=1);

namespace App\Controller;

use App\ApiClient\ApiClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Api
 * @package App\Controller
 */
class Api extends Controller
{

    /**
     * @Route("/users/v1", name="users_v1")
     * @param ApiClient $client
     * @return Response
     */
    public function usersV1(ApiClient $client)
    {
        dump($client->getUsersV1());
        return new Response('ok');
    }

    /**
     * @Route("/users/v2", name="users_v2")
     * @param ApiClient $client
     * @return Response
     */
    public function usersV2(ApiClient $client)
    {
        dump($client->getUsersV2());
        return new Response('ok');
    }

    /**
     * @Route("/users/v3", name="users_v3")
     * @param ApiClient $client
     * @return Response
     */
    public function usersV3(ApiClient $client)
    {
        dump($client->getUsersV3());
        return new Response('ok');
    }

    /**
     * @Route("/items/v1", name="items_v1")
     * @param ApiClient $client
     * @return Response
     */
    public function itemsV1(ApiClient $client)
    {
        dump($client->getItemsV1());
        return new Response('ok');
    }

    /**
     * @Route("/items/v1/php", name="items_v1_php")
     * @param ApiClient $client
     * @return Response
     */
    public function itemsV1Php(ApiClient $client)
    {
        dump($client->getItemsV1Php());
        return new Response('ok');
    }

}