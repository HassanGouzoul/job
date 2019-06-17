<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{

    /**
     * @Route("/" , name="homepage")
     * @return Response
     */
public function indexAction() {
    /*$job = [
        'id' => 1,
        'titre' => 'on cherche un développeur en informatique',
    ];
    dump($job);
    return new Response('<html><body>Bienvenu dans notre site job.com</html></body>');*/
    return $this->render('job/index.html.twig');
}

    /**
     * @Route("/contact")
     * @return Response
     */
public function contactAction() {
    return new Response('<html><body>Bienvenu dans notre page <strong>Contact</strong></html></body>');
}
}