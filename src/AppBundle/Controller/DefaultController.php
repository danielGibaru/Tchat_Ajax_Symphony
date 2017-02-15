<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Form\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() {
        $em = $this->getDoctrine();

        $messages = $em->getRepository("AppBundle:Message")->findAll(array('id' => 'ASC'));

        $formMess = $this->createForm(MessageType::class)->createView();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                    "messages" => $messages,
                    "formMess" => $formMess
        ));
    }

    /**
     * @Route("/envois",name="sendMessage")
     */
    public function sendMessage(Request $request) {
        ////Recuperation du jason de mon ajax
        $inputMess = $request->get('inputMessJason');
        
        ///Ajout en Db :
        $em = $this->getDoctrine()->getManager();
        ///Creation Obj Message 
        $message = new Message();
        ///
        $message->setText($inputMess);
            // on sauvegarde en local
            $em->persist($message);
            // et on envoi en base de donnee
            $em->flush();
        ////Retour pour ajax de la request jason 
        $reponseJson = new JsonResponse();
        return $reponseJson->setData(); 
    }

}
