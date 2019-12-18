<?php


namespace App\Controller;
use DateInterval;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use function Sodium\add;


class PlanningController extends AbstractController
{
    /**
     * @Route("/planning/month")
     */

    function month(){


        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            // This month
            $ym = date('Y-m');
        }
        $timestamp = strtotime($ym . '-01');
        if ($timestamp === false) {
            $ym = date('Y-m');
            $timestamp = strtotime($ym . '-01');
        }
        $today = date('Y-m-j', time());
        $html_title = date('Y / m', $timestamp);
        $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
        $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
        $day_count = date('t', $timestamp);
        $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
        $weeks = array();
        $week = '';
        $week .= str_repeat('<td></td>', $str);
        for ( $day = 1; $day <= $day_count; $day++, $str++) {
            $date_modal = date('Y-m-d', mktime(0, 0, 0, date('m', $timestamp), $day, date('Y', $timestamp)));
            $date = $ym . '-' . $day;

            if ($today == $date) {
                $week .= '<td class="today">  <button type="button" class="button1" data-toggle="modal" data-target="#myModal" data-val="user1" > '. $day .'</button>';
            } else {
                $week .= '<td class="today"> <button class="button_mois">'. $day .'</button>';
            }
            $week .= '</td>';

            // End of the week OR End of the month
            if ($str % 7 == 6 || $day == $day_count) {
                if ($day == $day_count) {
                    // Add empty cell
                    $week .= str_repeat('<td></td>', 6 - ($str % 7));
                }
                $weeks[] = '<tr class="text-center">' . $week . '</tr>';
                // Prepare for new week
                $week = '';
            }
        }
        return $this->render("planning.html.twig",array("semaines"=>$weeks,"pre"=>$prev,"sui"=>$next , "actuelle"=>$ym));
    }

    /**
     * @Route("/planning/year")
     */

    function year(){

           $jour = new \DateTime('2019-09-01');
        $interval = new DateInterval('P1D');
        $dates = array();

        for ($i = 1; $i <= 366; $i++) {
            array_push($dates, clone $jour);
            $jour->add($interval);

        }


        return $this->render("planningAnuelle.html.twig",array("calen"=>$dates));

    }
    /**
     * @Route("/planning/week")
     */
    function week(){

        $dt = new DateTime;
        if (isset($_GET['year']) && isset($_GET['week'])) {
            $dt->setISODate($_GET['year'], $_GET['week']);
        } else {
            $dt->setISODate($dt->format('o'), $dt->format('W'));
        }
        $year =$dt->format('o');
        $week = $dt->format('W');

        $semaine = "";

        do {
            $semaine .=  '<td>' . $dt->format('d M Y') . "</td>\n";
            $dt->modify('+1 day');
        } while ($week == $dt->format('W'));



        return $this->render("weekly.html.twig",array("semaine"=>$semaine,"numerosemaine"=>$week,"anne"=>$year));
    }

}