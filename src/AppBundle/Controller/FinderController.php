<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Finder;
use AppBundle\Entity\Tile;
use AppBundle\Services\MapManager;
use AppBundle\Traits\FinderTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Finder controller.
 *
 * @Route("finder")
 */
class FinderController extends Controller
{
    use FinderTrait;

    /**
     * @param string $direction
     * @Route("/direction/{direction}", name="moveDirection")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function moveDirection(string $direction)
    {
        $em = $this->getDoctrine()->getManager();
        $finder = $this->getFinder();
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
            $checkTreasure = $mapManager->checkTreasure($finder);
            if ($checkTreasure) {
                $this->addFlash('success', 'Tu as trouvé le trésor bravo à toi mon grand :) !');
            }
        } else {
            $this->addFlash('danger', 'Oula ! Si tu fais ça tu vas sauter par la fenêtre !');
        }
        return $this->redirectToRoute('map');
    }

    /**
     * Lists all finder entities.
     *
     * @Route("/", name="finder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $finders = $em->getRepository('AppBundle:Finder')->findAll();

        return $this->render('finder/index.html.twig', array(
            'finders' => $finders,
        ));
    }

    /**
     * Creates a new finder entity.
     *
     * @Route("/new", name="finder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $finder = new Finder();
        $form = $this->createForm('AppBundle\Form\FinderType', $finder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($finder);
            $em->flush();

            return $this->redirectToRoute('finder_show', array('id' => $finder->getId()));
        }

        return $this->render('finder/new.html.twig', array(
            'finder' => $finder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a finder entity.
     *
     * @Route("/{id}", name="finder_show")
     * @Method("GET")
     */
    public function showAction(Finder $finder)
    {
        $deleteForm = $this->createDeleteForm($finder);

        return $this->render('finder/show.html.twig', array(
            'finder' => $finder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing finder entity.
     *
     * @Route("/{id}/edit", name="finder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Finder $finder)
    {
        $deleteForm = $this->createDeleteForm($finder);
        $editForm = $this->createForm('AppBundle\Form\FinderType', $finder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('finder_edit', array('id' => $finder->getId()));
        }

        return $this->render('finder/edit.html.twig', array(
            'finder' => $finder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a finder entity.
     *
     * @Route("/{id}", name="finder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Finder $finder)
    {
        $form = $this->createDeleteForm($finder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($finder);
            $em->flush();
        }

        return $this->redirectToRoute('finder_index');
    }

    /**
     * Creates a form to delete a finder entity.
     *
     * @param Finder $finder The finder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Finder $finder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('finder_delete', array('id' => $finder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
