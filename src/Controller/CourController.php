<?php


namespace App\Controller;
use DateTime;
use DateTimeInterface;
use App\Entity\Demijour;
use App\Entity\Intervenant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CourController extends AbstractController
{


    /**
     * @Route("/court/ajout")
     * @return Response
     */
    public function add(){
        return $this->render('ajoutcour.html.twig');
    }

    /**
     * @Route("/court/ajoutcourt")
     * @param Request $request
     * @return Response
     */
    public function addcourt(Request $request)
    {

        $moment= ($request->request->get('moment'));
        $date= ($request->request->get('date'));
        $mat= ($request->request->get('matiere'));
        $entityManager = $this->getDoctrine()->getManager();
        $inter = new demijour();
        $inter->setMoment($moment);
        $inter->setDatedemijour( new DateTime($date));
        $inter->setMatiere($mat);

        $entityManager->persist($inter);

        $entityManager->flush();
        return $this->render('ajoutcour.html.twig');

    }





}