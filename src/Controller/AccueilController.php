<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AccueilController extends AbstractController
{
    /**
     * @Route("/")
     */

function bonjour(){
    //3
    return $this->render("connection.html.twig",array('last_username'=>'clement' , 'login_check'=>"/intervenant/login" ));
}


    /**
     * @Route("/accueil")
     */
    function accueil(){
        //3
        return $this->render("acc.html.twig");
    }

}
