<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * UserAccount
 */
class UserAccount extends BaseUser
{
    const ROLE_USER="ROLE_USER",ROLE_ADMIN="ROLE_ADMIN",ROLE_SUPER_ADMIN="ROLE_SUPER_ADMIN";

    /**
     * @var integer
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        $this->addRole(self::ROLE_DEFAULT);
    }
}

