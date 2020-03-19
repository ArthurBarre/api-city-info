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
        $etabs = [];
        $errors = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $postal_code = $data->getDistrict();
            $code = $geoApi->getCityInfo($postal_code);
            $etabs = $etabPub->getTownHall($code);
            var_dump($etabs);
        }
        if ($postal_code == '') {
            array_push($errors, 'Veuillez entrer un code postale');
        } else if (strlen($postal_code) !== 5){
            array_push($errors, 'Veuillez entrer un code postale valide');
        } else if ($etabs == []){
            array_push($errors, "Aucune gendarmerie n'a été trouvé pour ce code postale");
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
            'etabs'=> $etabs,
            'errors'=>$errors
        ]);
    }

}