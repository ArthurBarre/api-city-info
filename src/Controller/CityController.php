<?php

namespace App\Controller;

use App\Entity\CityInfo;
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
        // creates a task object and initializes some data for this example
        $city_info = new CityInfo();
        $city_info->setCity('');
        $city_info->setDistrict('');

        $form = $this->createFormBuilder($city_info)
            ->add('city', TextType::class)
            ->add('district', TextType::class)
            ->add('search', SubmitType::class, ['label' => 'Rechercher'])
            ->getForm();


        if ($form->isSubmitted() ) {
            $city = $form->get('city');
            $postal_code = $form->get('district');
            dd($city,$postal_code);
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}