<?php

namespace App\Controller;

use App\Entity\CityInfo;
use App\Form\CityFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\EtablissementPublicApi;

class EtablissementPubliqueController extends AbstractController
{
    /**
     * @Route("/etab", name="city-form")
     * @param Request $request
     * @param EtablissementPublicApi $etabPubApi
     * @return Response
     */
    public function index(Request $request, EtablissementPublicApi $etabPubApi)
    {
        $form = $this->createForm(CityFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $arrondissement = $data->getDistrict();
            $etabPubApi->getEtabInfo($arrondissement);
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}