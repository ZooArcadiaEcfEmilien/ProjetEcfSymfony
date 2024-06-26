<?php
namespace App\Controller;

use App\Entity\AnimalEntity;
use App\Document\AnimalLike;
use App\Repository\AnimalEntityRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
namespace App\Controller;

use App\Entity\AnimalEntity;
use App\Document\AnimalLike;
use App\Repository\AnimalEntityRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    private $animalRepository;
    private $documentManager;

    public function __construct(AnimalEntityRepository $animalRepository, DocumentManager $documentManager)
    {
        $this->animalRepository = $animalRepository;
        $this->documentManager = $documentManager;
    }

    /**
     * @Route("/animals", name="animal_list")
     */
    public function list(): Response
    {
        $animals = $this->animalRepository->findAll();
        $animalsWithLikes = [];

        // Récupérer les likes depuis MongoDB pour chaque animal
        foreach ($animals as $animal) {
            $animalLikes = $this->documentManager->getRepository(AnimalLike::class)->findOneBy(['name' => $animal->getName()]);
            $likeCount = $animalLikes ? $animalLikes->getLikeCount() : 0;
            $animalsWithLikes[] = [
                'animal' => $animal,
                'likeCount' => $likeCount,
            ];
        }

        return $this->render('animal_list.html.twig', [
            'animalsWithLikes' => $animalsWithLikes,
            'habitat' => $animals[0]->getHabitatDeLAnimal(), // Ajout de l'habitat pour la vue
        ]);
    }
}
