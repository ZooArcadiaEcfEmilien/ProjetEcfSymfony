<?php

namespace App\Controller\Admin;

use App\Entity\AnimalEntity;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{AssociationField, DateTimeField, FormField, IdField, ImageField, IntegerField, TextEditorField, TextField};
use EasyCorp\Bundle\EasyAdminBundle\Config\{Action, Actions, Crud};

class AnimalEntityCrudController extends AbstractCrudController
{
    private $entityManager;
    private $documentManager;

    public function __construct(EntityManagerInterface $entityManager, DocumentManager $documentManager)
    {
        $this->entityManager = $entityManager;
        $this->documentManager = $documentManager;
    }

    public static function getEntityFqcn(): string
    {
        return AnimalEntity::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Présentation', 'fa-solid fa-paw'),
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('race', 'Race'),
            ImageField::new('image', 'Insérer une image')->setUploadDir('/public/uploads/images/Animal')->setBasePath('/uploads/images/Animal'),
            AssociationField::new('habitatDeLAnimal', 'Choix de l\'habitat de l\'animal')->setRequired(true),
            FormField::addTab('Santé de l\'animal', 'fa-solid fa-user-doctor'),
            DateTimeField::new('datePassage', 'Date de passage'),
            TextField::new('etatAnimal', 'Etat de l\'animal'),
            TextField::new('nourritureType', 'Nourriture favorite'),
            IntegerField::new('nourritureQuantite', 'Quantité de nourriture en Gramme'),
            TextEditorField::new('detailsCommentaire', 'Commentaire')
        ];
    }
}
