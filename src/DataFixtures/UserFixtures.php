<?php

namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\UserProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword($this->encoder->encodePassword($user, 'test'));
        $user->setEmail('admin@example.com');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        $userProfile = new UserProfile();
        $userProfile->setUser($user);
        $userProfile->setFullname('Oliver Feige');
        $userProfile->setJobTitle('Director IT');
        $userProfile->setMention('ofeige');

        $userProfile->setUser($user);
        $user->setUserProfile($userProfile);

        $manager->persist($user);
        $manager->persist($userProfile);

        $this->addReference('admin-user', $user);

        $user = new User();
        $user->setUsername('demo');
        $user->setPassword($this->encoder->encodePassword($user, 'test'));
        $user->setEmail('demo@example.com');
        $manager->persist($user);


        $manager->flush();
    }
}