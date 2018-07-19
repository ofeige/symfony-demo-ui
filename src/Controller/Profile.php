<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Form\Type\UserProfileType;
use App\Repository\UserProfileRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class Profile extends Controller
{
    /**
     * @Route("/user/profile", name="user_profile")
     * @Security("has_role('ROLE_USER')")
     *
     * @param Request $request
     * @param UserProfileRepository $userProfileRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, UserProfileRepository $userProfileRepository)
    {
        $user = $this->getUser();
        $userProfile = $userProfileRepository->findOneBy(['user' => $user]);
        if($userProfile === null) {
            $userProfile = new UserProfile();
        }
        $form = $this->createForm(UserProfileType::class, $userProfile);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userProfile->setUser($user);
            $em->persist($userProfile);
            $em->flush();
        }

        return $this->render('profile/index.html.twig', [
            'form' => $form->createView(),
            'username' => $this->getUser()->getUsername(),
        ]);
    }

}
