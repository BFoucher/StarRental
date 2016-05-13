<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends Controller
{
    /**
     * @Route("/outclass/", name="outclass")
     */
    public function canOutclassAction(Request $request)
    {
        //Check Ajax request
        if (!$request->isXmlHttpRequest()){
            return $this->redirectToRoute('booking_index');
        };

        $em = $this->getDoctrine()->getManager();
        $ship = $request->request->get('ship');
        $ship = $em->getRepository('AppBundle:Ship')->find($ship);
        $customer = $request->request->get('customer');
        $customer = $em->getRepository('AppBundle:Customer')->find($customer);


        $canOutclass = $this->get('app.outclass')->canOutclass($ship,$customer);
        
        $response = new JsonResponse();
        if ($canOutclass){
            $response->setData(array(
                'outclass' => true,
                'msg'=>'M. Han Solo a le droit d’être surclassé sur les TieFighters'
            ));
        }else{
            $response->setData(array(
                'outclass' => false,
                'msg'=>'M. Han Solo ne peut être surclassé sur les TieFighters et doit donc rester sur les XWing '
            ));
        }
        return $response;
    }
}
