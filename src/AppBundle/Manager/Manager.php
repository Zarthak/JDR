<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 14/01/2018
 * Time: 23:56
 */

namespace AppBundle\Manager;


use AppBundle\Entity\UserAccount;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

abstract class Manager
{
    protected $className;

    /** @var Registry */
    protected $doctrine;

    /** @var TokenStorage */
    protected $tokenStorage;

    public function __construct(Registry $doctrine, TokenStorage $tokenStorage, $className = null)
    {
        dump($doctrine->getEntityManager()->getClassMetadata(UserAccount::class)->getTableName());
        die();
        $this->className = $className;
        $this->doctrine = $doctrine;
        $this->tokenStorage = $tokenStorage;
    }

    public function findAll(){
        $this->doctrine->getRepository($this->className)->findAll();
    }
}