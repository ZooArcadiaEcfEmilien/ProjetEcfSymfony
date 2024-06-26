<?php
namespace App\Controller;

use App\Service\CountLikeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalLikeController extends AbstractController
{
    private $countLikeService;

    public function __construct(CountLikeService $countLikeService)
    {
        $this->countLikeService = $countLikeService;
    }

    /**
     * @Route("/animal/like/{id}", name="animal_like", methods={"POST"})
     */
    public function likeAnimal(int $id): Response
    {
        try {
            $this->countLikeService->likeAnimal($id);
        } catch (\Exception $e) {
            return new Response($e->getMessage(), 404);
        }

        return $this->redirectToRoute('animal_list'); // Redirection après avoir cliqué sur "Like"
    }
}
