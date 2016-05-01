<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends Controller
{
    /**
     * @Route("/outclass/{ship}", name="outclass")
     */
    public function canOutclassAction(Request $request,$ship)
    {
        //TODO : Check Ajax request
        //TODO : get Customer for check last booking
        //TODO : add Message in Json Repsonse
        $ship = $this->getDoctrine()->getManager()->getRepository('AppBundle:Ship')->find($ship);

        $canOutclass = $this->get('app.outclass')->canOutclass($ship);
        $response = new JsonResponse();
        $response->setData(array('outclass' => $canOutclass));
        return $response;
    }
}
