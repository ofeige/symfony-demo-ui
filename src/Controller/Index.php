<?php

namespace App\Controller;

use App\ApiClient\ApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Index extends Controller
{

    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/terms", name="terms")
     */
    public function terms()
    {
        return $this->render('terms.html.twig');
    }

    /**
     * @Route("/coming_soon", name="coming_soon")
     */
    public function comingSoon()
    {
        return $this->render('coming_soon.html.twig');
    }

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
     * @Route("/users/v4", name="users_v4")
     * @param ApiClient $client
     * @return Response
     */
    public function usersV4(ApiClient $client)
    {
        dump($client->getUsersV4());
        return new Response('ok');
    }

    /**
     * @Route("/users/v5", name="users_v5")
     * @param ApiClient $client
     * @return Response
     */
    public function usersV5(ApiClient $client)
    {
        dump($client->getUsersV5());
        return new Response('ok');
    }

    /**
     * @Route("/users/v6", name="users_v6")
     * @param ApiClient $client
     * @return Response
     */
    public function usersV6(ApiClient $client)
    {
        dump($client->getUsersV6());
        return new Response('ok');
    }
}
