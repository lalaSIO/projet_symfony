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

    if ( isset($_SESSION)){
        return $this->render("acc.html.twig");
    }
    else{
        return $this->render("connection.html.twig",array('last_username'=>'clement' , 'login_check'=>"/intervenant/login" ));
    }
}


    /**
     * @Route("/accueil")
     */
    function accueil(){

        if ( isset($_SESSION)){
        return $this->render("acc.html.twig");
        }
        else{
            return $this->render("connection.html.twig",array('last_username'=>'clement' , 'login_check'=>"/intervenant/login" ));
        }

    }

    /**
     * @Route("/logout")
     */
    function logout(){

        if ( isset ($_SESSION["nom"])){

            session_destroy();
            return $this->render("connection.html.twig",array('last_username'=>'clement' , 'login_check'=>"/intervenant/login" ));
        }
        else{
            return $this->render("connection.html.twig",array('last_username'=>'clement' , 'login_check'=>"/intervenant/login" ));
        }

    }

}
