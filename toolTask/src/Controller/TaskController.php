<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/create-project")
     */
    public function createProject(): Response
    {
        $project = new Project();
        $project->setTitle('Titre du projet');
        $project->setDescription('Lorem ipsum set atmet dolor es ignicum ad lib eternam requiem in pace');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($project);
        $entityManager->flush();

        return new Response(sprintf("<body>Projet %s créé</body>", $project->getTitle()));
    }
    /**
     * @Route("/create-task")
     */
    public function createTask(): Response
    {
        $task = new Task();
        $task->setTitle('Titre de la tâche');
        $task->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua');

        $project = new Project();
        $project->setTitle('Titre du projet #2');
        $project->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua');

        $task->setProject($project);

        $entityManger  = $this->getDoctrine()->getManager();
        $entityManger->persist($task);
        $entityManger->flush();

        return new Response(sprintf('Tâche %s créée', $task->getTitle()));
    }
}