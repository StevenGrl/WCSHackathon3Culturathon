<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $favorite2 = $em->getRepository('AppBundle:Favorite')->findAll();

        return $this->render('default/index.html.twig', array(
            'favorites' => $favorite2,
        ));
    }

    /**
     * @Route("/favorite", name="favorite")
     */
    public function getFavorite()
    {
        $em = $this->getDoctrine()->getManager();
        $favorites = $em->getRepository('AppBundle:Favorite')->findAll();

        return $this->render('base.html.twig', array(
            'favorites' => $favorites,
        ));
    }

}
