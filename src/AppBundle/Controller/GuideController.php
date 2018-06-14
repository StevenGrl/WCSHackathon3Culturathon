<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Guide;
use AppBundle\Entity\Tile;
use AppBundle\Services\MapManager;
use AppBundle\Traits\GuideTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Guide controller.
 *
 * @Route("guide")
 */
class GuideController extends Controller
{

    use GuideTrait;

    /**
     * @param string $direction
     * @Route("/direction/{direction}", name="moveDirectionGuide")
     */
    public function moveDirectionGuide(string $direction)
    {
        $em = $this->getDoctrine()->getManager();
        $finder = $this->getGuide();
        $y = $finder->getCoordY();
        $x = $finder->getCoordX();
        if ($direction === "N" || $direction === "S") {
            if ($direction === "N") {
                $y--;
            } else {
                $y++;
            }
        } elseif ($direction === "E" || $direction === "W") {
            if ($direction === "E") {
                $x++;
            } else {
                $x--;
            }
        }
        $tileRepository = $this->getDoctrine()->getRepository(Tile::class);
        $mapManager = new MapManager($tileRepository);
        $tileExist = $mapManager->tileExists($x, $y, $em);
        if ($tileExist) {
            $finder->setCoordY($y);
            $finder->setCoordX($x);
            $em->flush();
        } else {
            $this->addFlash('danger', "TU NE PASSERA PAS !");
        }
        return $this->redirectToRoute('visite');
    }

    /**
     * Lists all guide entities.
     *
     * @Route("/", name="guide_index")
     * @Method("GET")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $guides = $em->getRepository('AppBundle:Guide')->findAll();

        return $this->render('guide/index.html.twig', array(
            'guides' => $guides,
        ));
    }

    /**
     * Creates a new guide entity.
     *
     * @Route("/new", name="guide_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $guide = new Guide();
        $form = $this->createForm('AppBundle\Form\GuideType', $guide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guide);
            $em->flush();

            return $this->redirectToRoute('guide_show', array('id' => $guide->getId()));
        }

        return $this->render('guide/new.html.twig', array(
            'guide' => $guide,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a guide entity.
     *
     * @Route("/{id}", name="guide_show")
     * @Method("GET")
     */
    public function showAction(Guide $guide)
    {
        $deleteForm = $this->createDeleteForm($guide);

        return $this->render('guide/show.html.twig', array(
            'guide' => $guide,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing guide entity.
     *
     * @Route("/{id}/edit", name="guide_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Guide $guide)
    {
        $deleteForm = $this->createDeleteForm($guide);
        $editForm = $this->createForm('AppBundle\Form\GuideType', $guide);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('guide_edit', array('id' => $guide->getId()));
        }

        return $this->render('guide/edit.html.twig', array(
            'guide' => $guide,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a guide entity.
     *
     * @Route("/{id}", name="guide_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Guide $guide)
    {
        $form = $this->createDeleteForm($guide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($guide);
            $em->flush();
        }

        return $this->redirectToRoute('guide_index');
    }

    /**
     * Creates a form to delete a guide entity.
     *
     * @param Guide $guide The guide entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Guide $guide)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('guide_delete', array('id' => $guide->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
