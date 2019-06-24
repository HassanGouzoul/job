<?php


namespace App\DataFixture;


use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        for ($i = 0; $i<30; $i++){
            $job = new Job();
            $job->setTitle("Job N°". $i);
            $job->setSlug("on-recrute");
            $job->setCategorie($i);
            $job->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium 
                                            delectus doloremque numquam possimus sint temporibus vitae? Amet consectetur
                                            consequatur in ipsa itaque iure natus recusandae. Atque commodi corporis 
                                            dolore esse, numquam obcaecati placeat provident tempore velit! Deleniti 
                                            minus reiciendis unde?");
            $job->setAdresse("Paris 75");
            $manager->persist($job);
        }
        $manager->flush();
    }
}