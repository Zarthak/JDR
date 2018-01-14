<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUsers();
        dump($user);
        $userManager = $this->get('app.manager.user');
        $user1 = $userManager->findAll();
        dump($user1);
        die();
        return $this->render('@App/Home/home.html.twig');
    }
}
