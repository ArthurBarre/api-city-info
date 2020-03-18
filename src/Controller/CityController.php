<?php

namespace App\Controller;

use App\Entity\CityInfo;
use App\Form\CityFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/", name="city-form")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request)
    {
        $form = $this->createForm(CityFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->fetchData($data);
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function fetchData($data){
        var_dump($data->getCity());
        var_dump($data->getDistrict());
    }
}