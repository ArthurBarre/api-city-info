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

class CityController extends AbstractController
{
    /**
     * @Route("/geo", name="geo")
     * @param Request $request
     * @param GeoApi $geoApi
     * @return Response
     */
    public function index(Request $request, GeoApi $geoApi)
    {
        $form = $this->createForm(CityFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $city = $data->getCity();
            $postal_code = $data->getDistrict();
            $geoApi->getCityInfo($city,$postal_code);
//            dd($geoApi->getCityInfo());
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}