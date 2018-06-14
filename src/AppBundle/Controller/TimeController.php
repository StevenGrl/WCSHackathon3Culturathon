<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Time;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Time controller.
 *
 * @Route("time")
 */
class TimeController extends Controller
{
    /**
     * Lists all time entities.
     *
     * @Route("/", name="time_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $times = $em->getRepository('AppBundle:Time')->findAll();

        return $this->render('time/index.html.twig', array(
            'times' => $times,
        ));
    }

    /**
     * Creates a new time entity.
     *
     * @Route("/new", name="time_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $time = new Time();
        $form = $this->createForm('AppBundle\Form\TimeType', $time);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($time);
            $em->flush();

            return $this->redirectToRoute('time_show', array('id' => $time->getId()));
        }

        return $this->render('time/new.html.twig', array(
            'time' => $time,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a time entity.
     *
     * @Route("/{id}", name="time_show")
     * @Method("GET")
     */
    public function showAction(Time $time)
    {
        $deleteForm = $this->createDeleteForm($time);

        return $this->render('time/show.html.twig', array(
            'time' => $time,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing time entity.
     *
     * @Route("/{id}/edit", name="time_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Time $time)
    {
        $deleteForm = $this->createDeleteForm($time);
        $editForm = $this->createForm('AppBundle\Form\TimeType', $time);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('time_edit', array('id' => $time->getId()));
        }

        return $this->render('time/edit.html.twig', array(
            'time' => $time,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a time entity.
     *
     * @Route("/{id}", name="time_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Time $time)
    {
        $form = $this->createDeleteForm($time);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($time);
            $em->flush();
        }

        return $this->redirectToRoute('time_index');
    }

    /**
     * Creates a form to delete a time entity.
     *
     * @param Time $time The time entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Time $time)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('time_delete', array('id' => $time->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
