<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 26/06/2018
 * Time: 12:06
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserPageController extends Controller
{
    /**
     * @Route("/userPage", name="userPage")
     */
    public function index()
    {
        return $this->render('userPage/index.html.twig', [
            'controller_name' => 'UserPageController',
            'title' => "Profil"
        ]);
    }
}