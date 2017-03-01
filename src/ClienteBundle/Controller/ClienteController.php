<?php

namespace ClienteBundle\Controller;

use ClienteBundle\Form\ClienteType;
use ClienteBundle\Entity\Cliente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClienteController extends Controller
{
    public function listAction() {
        
        $em  = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository("ClienteBundle:Cliente")->findAll();
        
        return $this->render("ClienteBundle:Cliente:list.html.twig", array("cliente"=>$cliente));
    }

    public function addAction(Request $request)
    {
        // 1) build the form
        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($cliente);
            $em->flush();
            
            $this->addFlash("mensaje", "El cliente fue creado con éxito");
            
        }

        return $this->render("ClienteBundle:Cliente:add.html.twig", 
                array("form" => $form->createView())
        );
    }
}