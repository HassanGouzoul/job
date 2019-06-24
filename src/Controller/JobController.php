<?php


namespace App\Controller;


use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{

    /**
     * @Route("/" , name="homepage")
     * @return Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $job = new Job();
        $job->setTitle('On recherche un developpeur');
        $job->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. A blanditiis deserunt ducimus, 
                                        iure laboriosam omnis rem repudiandae suscipit temporibus voluptates!');
        $job->setCategorie(2);
        $job->setAdresse('Sur paris 75');
        $job->setSlug('on-recrute');
        $em->persist($job);
        $em->flush();
        return $this->render('job/index.html.twig', [
            'job'=>$job
        ]);

        /*  $job = [
              'id' => 1,
              'titre' => 'on cherche un développeur en informatique',
          ];
          dump($job);
          return new Response('<html><body>Bienvenu dans notre site job.com</html></body>');
          $offre = new \stdClass();
          $offre->titre = 'Nous cherchons un ingénieur en info';
          $offre->techno = 'Symfony';
          dump($offre);
          return $this->render('job/index.html.twig', [
              'offre'=>$offre
          ]);*/
    }

    /**
     * @Route("/contact")
     * @return Response
     */
    public function contactAction()
    {
        return new Response('<html><body>Bienvenu dans notre page <strong>Contact</strong></html></body>');
    }

    /**
     * @Route("/job/{id}")
     * @return Response
     */
    public function jobShowAction($id)
    //public function jobShowAction(job $job)
    {
        $job = $this->getDoctrine()->getRepository(Job::class)->find($id);
        if (empty($job)) {
            throw $this->createNotFoundException("Oups, l'offre $id n'existe pas ou il a été supprimé");
        }
        return $this->render('job/job_show.html.twig', [
            'job'=>$job
        ]);
        /*dump($id);
        return $this->render('job/job_show.html.twig', ['id' => $id]);*/
    }
}