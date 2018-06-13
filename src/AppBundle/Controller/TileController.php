<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tile controller.
 *
 * @Route("tile")
 */
class TileController extends Controller
{
    /**
     * Lists all tile entities.
     *
     * @Route("/", name="tile_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tiles = $em->getRepository('AppBundle:Tile')->findAll();

        return $this->render('tile/index.html.twig', array(
            'tiles' => $tiles,
        ));
    }

    /**
     * Creates a new tile entity.
     *
     * @Route("/new", name="tile_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tile = new Tile();
        $form = $this->createForm('AppBundle\Form\TileType', $tile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tile);
            $em->flush();

            return $this->redirectToRoute('tile_show', array('id' => $tile->getId()));
        }

        return $this->render('tile/new.html.twig', array(
            'tile' => $tile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tile entity.
     *
     * @Route("/{id}", name="tile_show")
     * @Method("GET")
     */
    public function showAction(Tile $tile)
    {
        $deleteForm = $this->createDeleteForm($tile);

        return $this->render('tile/show.html.twig', array(
            'tile' => $tile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tile entity.
     *
     * @Route("/{id}/edit", name="tile_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tile $tile)
    {
        $deleteForm = $this->createDeleteForm($tile);
        $editForm = $this->createForm('AppBundle\Form\TileType', $tile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tile_edit', array('id' => $tile->getId()));
        }

        return $this->render('tile/edit.html.twig', array(
            'tile' => $tile,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tile entity.
     *
     * @Route("/{id}", name="tile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tile $tile)
    {
        $form = $this->createDeleteForm($tile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tile);
            $em->flush();
        }

        return $this->redirectToRoute('tile_index');
    }

    /**
     * Creates a form to delete a tile entity.
     *
     * @param Tile $tile The tile entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tile $tile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tile_delete', array('id' => $tile->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
