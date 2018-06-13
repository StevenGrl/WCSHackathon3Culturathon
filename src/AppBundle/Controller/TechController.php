<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tech;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tech controller.
 *
 * @Route("tech")
 */
class TechController extends Controller
{
    /**
     * Lists all tech entities.
     *
     * @Route("/", name="tech_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teches = $em->getRepository('AppBundle:Tech')->findAll();

        return $this->render('tech/index.html.twig', array(
            'teches' => $teches,
        ));
    }

    /**
     * Creates a new tech entity.
     *
     * @Route("/new", name="tech_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tech = new Tech();
        $form = $this->createForm('AppBundle\Form\TechType', $tech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tech);
            $em->flush();

            return $this->redirectToRoute('tech_show', array('id' => $tech->getId()));
        }

        return $this->render('tech/new.html.twig', array(
            'tech' => $tech,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tech entity.
     *
     * @Route("/{id}", name="tech_show")
     * @Method("GET")
     */
    public function showAction(Tech $tech)
    {
        $deleteForm = $this->createDeleteForm($tech);

        return $this->render('tech/show.html.twig', array(
            'tech' => $tech,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tech entity.
     *
     * @Route("/{id}/edit", name="tech_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tech $tech)
    {
        $deleteForm = $this->createDeleteForm($tech);
        $editForm = $this->createForm('AppBundle\Form\TechType', $tech);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tech_edit', array('id' => $tech->getId()));
        }

        return $this->render('tech/edit.html.twig', array(
            'tech' => $tech,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tech entity.
     *
     * @Route("/{id}", name="tech_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tech $tech)
    {
        $form = $this->createDeleteForm($tech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tech);
            $em->flush();
        }

        return $this->redirectToRoute('tech_index');
    }

    /**
     * Creates a form to delete a tech entity.
     *
     * @param Tech $tech The tech entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tech $tech)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tech_delete', array('id' => $tech->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
