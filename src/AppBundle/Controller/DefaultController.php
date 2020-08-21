<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Repository\PostcodeRepository;
use Doctrine\ORM\EntityManager;

class DefaultController extends Controller
{
    private $postcodeRepository;

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
       // print_r($this->postcodeRepository->findByPartialPostcode("AA"));
        // replace this example code with whatever you need
         return $this->render('default/index.html.twig');
    }
    /**
     * @Route("/postcode/{lat}/{lon}", name="postcode_latlang")
     */
    public function laglongAction(Request $request){
       
        $lat = $request->get("lat");
        $lon = $request->get('lon');
        $this->postcodeRepository = $this->getDoctrine()->getRepository("AppBundle:Postcode");

        $result = $this->postcodeRepository->findByLatLonPostcode($lat,$lon);
        
        return new JsonResponse($result);
    }
    
    /**
     * @Route("/postcode/{postcode}", name="postcode_postcode")
     */
    public function postcodeAction(Request $request){
        $postcode = $request->get('postcode');
        $this->postcodeRepository = $this->get('postcodeRepository');
        $result = $this->postcodeRepository->findByPartialPostcode($postcode);
        
         
                
       return new JsonResponse($result);
    }
}
