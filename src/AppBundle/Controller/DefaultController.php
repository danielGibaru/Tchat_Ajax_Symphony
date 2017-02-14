<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\MessageType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
         $em = $this->getDoctrine();

         $messages = $em->getRepository("AppBundle:Message")->findAll(array('id'=>'ASC'));

         $f = $this->createForm(MessageType::class)->createView();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array(
             "messages" => $messages,
             "f" => $f
        ));
    }
}
