<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Style;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Style controller.
 *
 * @Route("style")
 */
class StyleController extends Controller
{
    /**
     * Lists all style entities.
     *
     * @Route("/", name="style_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $styles = $em->getRepository('AppBundle:Style')->findAll();

        return $this->render('style/index.html.twig', array(
            'styles' => $styles,
        ));
    }

    /**
     * Creates a new style entity.
     *
     * @Route("/new", name="style_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $style = new Style();
        $form = $this->createForm('AppBundle\Form\StyleType', $style);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($style);
            $em->flush();

            return $this->redirectToRoute('style_show', array('id' => $style->getId()));
        }

        return $this->render('style/new.html.twig', array(
            'style' => $style,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a style entity.
     *
     * @Route("/{id}", name="style_show")
     * @Method("GET")
     */
    public function showAction(Style $style)
    {
        $deleteForm = $this->createDeleteForm($style);

        return $this->render('style/show.html.twig', array(
            'style' => $style,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing style entity.
     *
     * @Route("/{id}/edit", name="style_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Style $style)
    {
        $deleteForm = $this->createDeleteForm($style);
        $editForm = $this->createForm('AppBundle\Form\StyleType', $style);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('style_edit', array('id' => $style->getId()));
        }

        return $this->render('style/edit.html.twig', array(
            'style' => $style,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a style entity.
     *
     * @Route("/{id}", name="style_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Style $style)
    {
        $form = $this->createDeleteForm($style);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($style);
            $em->flush();
        }

        return $this->redirectToRoute('style_index');
    }

    /**
     * Creates a form to delete a style entity.
     *
     * @param Style $style The style entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Style $style)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('style_delete', array('id' => $style->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
