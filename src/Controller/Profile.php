<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Form\Type\UserProfileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class Profile extends Controller
{
    /**
     * @Route("/user/profile", name="user_profile")
     * @Security("has_role('ROLE_USER')")
     */
    public function index(Request $request)
    {
        $user = $this->getUser();
        $userProfile = $user->getUserProfile();
        if($userProfile === null) {
            $userProfile = new UserProfile();
        }
        $form = $this->createForm(UserProfileType::class, $userProfile);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userProfile->setUser($user);
            $user->setUserProfile($userProfile);
            $em->persist($userProfile);
            $em->persist($user);
            $em->flush();
        }

        return $this->render('profile/index.html.twig', [
            'form' => $form->createView(),
            'username' => $this->getUser()->getUsername(),
        ]);
    }

}
