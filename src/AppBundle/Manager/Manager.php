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
        $this->className = $className;
        $this->doctrine = $doctrine;
        $this->tokenStorage = $tokenStorage;
    }

    public function getRepository(){
        return $this->doctrine->getRepository($this->className);
    }

    public function getManager(){
        return $this->doctrine->getManager();
    }

    public function findAll(){
        return $this->getRepository()->findAll();
    }

    public function findById($id){
        return $this->getRepository()->find($id);
    }

    public function create(){
        return new $this->className;
    }

    public function save($entity,$flush=true){
        $this->getManager()->persist($entity);
        if($flush){
            $this->getManager()->flush();
        }
        return $entity;
    }
}