<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/06/18
 * Time: 09:30
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConceptController extends Controller
{
    /**
     * @Route("/concept", name="concept")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('concept/index.html.twig');
    }
}
