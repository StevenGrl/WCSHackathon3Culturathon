<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Materials;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Material controller.
 *
 * @Route("materials")
 */
class MaterialsController extends Controller
{
    /**
     * Lists all material entities.
     *
     * @Route("/", name="materials_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $materials = $em->getRepository('AppBundle:Materials')->findAll();

        return $this->render('materials/index.html.twig', array(
            'materials' => $materials,
        ));
    }

    /**
     * Creates a new material entity.
     *
     * @Route("/new", name="materials_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $material = new Materials();
        $form = $this->createForm('AppBundle\Form\MaterialsType', $material);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($material);
            $em->flush();

            return $this->redirectToRoute('materials_show', array('id' => $material->getId()));
        }

        return $this->render('materials/new.html.twig', array(
            'material' => $material,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a material entity.
     *
     * @Route("/{id}", name="materials_show")
     * @Method("GET")
     */
    public function showAction(Materials $material)
    {
        $deleteForm = $this->createDeleteForm($material);

        return $this->render('materials/show.html.twig', array(
            'material' => $material,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing material entity.
     *
     * @Route("/{id}/edit", name="materials_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Materials $material)
    {
        $deleteForm = $this->createDeleteForm($material);
        $editForm = $this->createForm('AppBundle\Form\MaterialsType', $material);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materials_edit', array('id' => $material->getId()));
        }

        return $this->render('materials/edit.html.twig', array(
            'material' => $material,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a material entity.
     *
     * @Route("/{id}", name="materials_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Materials $material)
    {
        $form = $this->createDeleteForm($material);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($material);
            $em->flush();
        }

        return $this->redirectToRoute('materials_index');
    }

    /**
     * Creates a form to delete a material entity.
     *
     * @param Materials $material The material entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Materials $material)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materials_delete', array('id' => $material->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
