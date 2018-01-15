<?php

namespace AdminBundle\Controller;

use AppBundle\Form\UserAccountType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function listAction(){
        $userManager = $this->get('app.manager.user');
        $user= $userManager->findAll();
        dump($user);
        die();
    }

    public function editUserAction(Request $request,$userID){
        $userManager = $this->get('app.manager.user');
        $user= $userManager->findById($userID);
        $form = $this->createForm(UserAccountType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            dump($form->getData());
            $userManager->save($form->getData());
            return $this->redirectToRoute("userList");
        }
        return $this->render('@Admin/Users/edit.html.twig',array("toto"=>$form->createView()));
    }
}