<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Artist controller.
 *
 * @Route("artist")
 */
class ArtistController extends Controller
{
    /**
     * Lists all artist entities.
     *
     * @Route("/", name="artist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artists = $em->getRepository('AppBundle:Artist')->findAll();

        return $this->render('artist/index.html.twig', array(
            'artists' => $artists,
        ));
    }

    /**
     * Creates a new artist entity.
     *
     * @Route("/new", name="artist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $artist = new Artist();
        $form = $this->createForm('AppBundle\Form\ArtistType', $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artist);
            $em->flush();

            return $this->redirectToRoute('artist_show', array('id' => $artist->getId()));
        }

        return $this->render('artist/new.html.twig', array(
            'artist' => $artist,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artist entity.
     *
     * @Route("/{id}", name="artist_show")
     * @Method("GET")
     */
    public function showAction(Artist $artist)
    {
        $deleteForm = $this->createDeleteForm($artist);

        return $this->render('artist/show.html.twig', array(
            'artist' => $artist,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artist entity.
     *
     * @Route("/{id}/edit", name="artist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Artist $artist)
    {
        $deleteForm = $this->createDeleteForm($artist);
        $editForm = $this->createForm('AppBundle\Form\ArtistType', $artist);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artist_edit', array('id' => $artist->getId()));
        }

        return $this->render('artist/edit.html.twig', array(
            'artist' => $artist,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artist entity.
     *
     * @Route("/{id}", name="artist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Artist $artist)
    {
        $form = $this->createDeleteForm($artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artist);
            $em->flush();
        }

        return $this->redirectToRoute('artist_index');
    }

    /**
     * Creates a form to delete a artist entity.
     *
     * @param Artist $artist The artist entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artist $artist)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artist_delete', array('id' => $artist->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
