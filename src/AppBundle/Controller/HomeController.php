<?php

namespace AppBundle\Controller;

use AppBundle\Entity\UserAccount;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUsers();
        dump($user);
        $userManager = $this->get('app.manager.user');
        $user= $userManager->findAll();
        dump($user);
        die();
        return $this->render('@App/Home/home.html.twig');
    }
}
