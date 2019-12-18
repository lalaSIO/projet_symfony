<?php

namespace App\Controller;

use App\Entity\Intervenant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IntervenantController extends AbstractController
{
    /**
     * @Route("/intervenant", name="intervenant")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();



        $inter = new Intervenant();
        $inter->setNom('lala');
        $inter->setPrenom('clement');
        $inter->setSpecialiteprofessionnelle('developper');

        $entityManager->persist($inter);

        $entityManager->flush();
        return $this->render('intervenant/index.html.twig', [
            'controller_name' => 'IntervenantController',
        ]);
    }

    /**
     * @Route("/intervenant_show/{id}")
     * @param $id
     * @return Response
     */

    public function show($id)
    {
       $inter = $this->getDoctrine()
            ->getRepository(intervenant::class)
            ->find($id);

       if(!$inter)
       {
           throw $this->createNotFoundException("pas d'interveneant pour l'id ".$id);
       }

       return new Response("id numero ".$id. " Nom :" .$inter->getNom(). " Prenom : ".$inter->getPrenom());
    }

    /**
     * @Route("/intervenant/ajout")
     * @return Response
     */
public function add(){
    return $this->render('ajoutIntervenant.html.twig');
}

    /**
     * @Route("intervenant/ajoutProfesseur")
     * @param Request $request
     * @return Response
     */
    public function addinter(Request $request)
    {
       $nom= ($request->request->get('nom'));
       $prenom= ($request->request->get('prenom'));
       $mdp= ($request->request->get('password'));
       $mat= ($request->request->get('matiere'));


        $entityManager = $this->getDoctrine()->getManager();
        $inter = new Intervenant();
        $inter->setNom($nom);
        $inter->setPrenom($prenom);
        $inter->setMdp($mdp);
        $inter->setSpecialiteprofessionnelle($mat);

        $entityManager->persist($inter);

        $entityManager->flush();
        return $this->render('ajoutIntervenant.html.twig');

    }



    /**
     * @Route("/intervenant/login")
     * @param Request $request
     * @return Response
     */
    public function connectionAction(Request $request) {
        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        $inter = $this->getDoctrine()

            ->getRepository(intervenant::class)
            ->checklog2($username,$password);

        if ($inter != null){
            session_start();
            $_SESSION["nom"] = "$username";
            return $this->render("acc.html.twig",array('nom' =>$_SESSION["nom"]));
        }
        else{
            return $this->render("connection.html.twig",array('last_username'=>'clement','login_check'=>"/intervenant/login" ));
        }

    }


}
