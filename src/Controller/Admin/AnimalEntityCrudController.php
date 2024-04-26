<?php

namespace App\Controller\Admin;
use App\Entity\AnimalEntity;
use App\Entity\HabitatEntity;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class AnimalEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AnimalEntity::class;
    }
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    // La fonction configureFields est utilisée pour configurer l'affichage des champs de l'entité AnimalEntity dans l'interface d'administration EasyAdmin.
    // Elle détermine quels champs seront visibles dans la vue CRUD et leurs configurations spécifiques, comme les choix pour les champs liés à d'autres entités.
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('race'),
            TextField::new('image'),
            TextField::new('etatAnimal'),
            TextField::new('nourritureType'),
            IntegerField::new('nourritureQuantite'),
            DateTimeField::new('datePassage'),
            TextField::new('detailsCommentaire'),
           /* ChoiceField::new('habitat')
                ->setChoices(function () {
                    $habitats = $this->entityManager->getRepository(HabitatEntity::class)->findAll();
                    $choices = [];
                    foreach ($habitats as $habitat) {
                        $choices[$habitat->getHabitatNom()] = $habitat; 
                    }
                    return $choices;
                })
                ->allowMultipleChoices(false)
                ->autocomplete()
                ->setRequired(true)
        */
        ];
    }
}
