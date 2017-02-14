<?php

namespace AppBundle\Controller;

use AppBundle\Form\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
         $em = $this->getDoctrine();

         $messages = $em->getRepository("AppBundle:Message")->findAll(array('id'=>'ASC'));

         $formMess = $this->createForm(MessageType::class)->createView();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array(
             "messages" => $messages,
             "formMess" => $formMess
        ));
    }
    
    
    /**
     * @Route("/envois",name="sendMessage")
     */
    public function sendMessage()
    {
        ////Recuperation du jason de mon ajax
        
    }

}
