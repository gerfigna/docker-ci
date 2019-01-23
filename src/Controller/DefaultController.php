<?php

namespace App\Controller;

use App\Entity\Greeting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;



class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    /**
     * @Route("/hello/{name}", name="hello")
     */
    public function hello($name = '')
    {
        return $this->json([
            'message' => "Hello $name",
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    /**
     * @param Greeting $greeting
     *
     * @Route("/greeting/{id}", name="greeting")
     * @ParamConverter("id", class="App:Greeting")
     *
     * @return JsonResponse
     */
    public function greeting(Greeting $greeting)
    {
        return $this->json([
            'name' => $greeting->getName(),
            'last_name' => $greeting->getLastName(),
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }
}
