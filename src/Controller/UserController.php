<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Userr;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Userr::class);
        $users = $repo->findAll();
        #$users = ["user1", "user2", "user3"];
        return $this->render('user/index.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/user/detail2/{id}", name="detail2")
     */
    public function detail($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Userr::class);
        $user = $repo->find($id);
        return $this->render('user/detail2.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/user/delete2/{id}", name="delete2")
     */
    public function delete($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Userr::class);
        $user = $repo->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($user);
        $manager->flush();
        #return $this->render('user/detail2.html.twig', [
        #   'user' => $user,
        #]);
        return $this->redirectToRoute('user');
    }
}
