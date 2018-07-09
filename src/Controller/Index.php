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

}
