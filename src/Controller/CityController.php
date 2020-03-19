<?php

namespace App\Controller;

use App\Entity\CityInfo;
use App\Form\CityFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GeoApi;
use App\Service\EtablissementPublicApi;
use \stdClass;

class CityController extends AbstractController
{
    /**
     * @Route("/", name="geo")
     * @param Request $request
     * @param GeoApi $geoApi
     * @param EtablissementPublicApi $etabPub
     * @return Response
     */
    public function index(Request $request, GeoApi $geoApi,EtablissementPublicApi $etabPub)
    {
        $form = $this->createForm(CityFormType::class);
        $form->handleRequest($request);
        // $etabs = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $postal_code = $data->getDistrict();
            $code = $geoApi->getCityInfo($postal_code);
            // var_dump($code);
            $etabs = $etabPub->getTownHall($code);
            $obj = json_decode (json_encode ($etabs[0]), FALSE);
            // var_dump($obj->properties);

        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
            'etabs'=> $etabs
        ]);
    }

}