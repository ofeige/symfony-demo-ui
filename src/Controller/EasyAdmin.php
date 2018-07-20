<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EasyAdmin extends BaseAdminController
{
    protected $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function persistEntity($entity)
    {
        $this->updatePassword($entity);
        parent::persistEntity($entity);
    }

    private function updatePassword($entity)
    {
        if (is_subclass_of($entity, UserInterface::class) && method_exists($entity, 'getPlainPassword')) {
            if ($entity->getPlainPassword() == '') {
                return $entity;
            }
            $entity->setPassword($this->passwordEncoder->encodePassword($entity, $entity->getPlainPassword()));
        }

        return $entity;
    }

    public function updateEntity($entity)
    {
        $this->updatePassword($entity);
        parent::updateEntity($entity);
    }

    protected function rearangeAction() {
        $ids = json_decode($this->request->get('ids'));
        $order = 1;
        $entity = $this->request->get('entity');
        $sortField = $this->request->get('sortField');

        foreach($ids as $id) {
            $qb = $this->em->createQueryBuilder()->update('App:'.$entity, 'e')->set('e.'.$sortField, $order++)->where('e.id = :id');
            $qb->setParameter('id', $id);
            $qb->getQuery()->execute();
        }

        return $this->redirectToReferrer();
    }
}
