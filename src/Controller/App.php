<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class App extends Controller
{
    /**
     * It is the first Action that is called after login!
     *
     * @Route("/app/dashboard", name="app")
     * @Security("has_role('ROLE_USER')")
     */
    public function authenticated()
    {
        return $this->render('comingsoon.html.twig');
    }

    /**
     * @Route("/app/link1", name="link1")
     * @Security("has_role('ROLE_USER')")
     */
    public function link1()
    {
        return $this->render('comingsoon.html.twig');
    }

    /**
     * @Route("/app/link2", name="link2")
     * @Security("has_role('ROLE_USER')")
     */
    public function link2()
    {
        return $this->render('comingsoon.html.twig');
    }
}
