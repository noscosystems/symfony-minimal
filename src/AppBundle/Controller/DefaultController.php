<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Action: Hello
     *
     * @access public
     * @param string $name
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function helloAction($name)
    {
        return $this->render('AppBundle:Default:hello.html.twig', [
            'name' => $name,
        ]);
    }
}
