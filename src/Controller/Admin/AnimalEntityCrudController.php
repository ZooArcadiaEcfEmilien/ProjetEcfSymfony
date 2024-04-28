<?php

namespace App\Controller\Admin;
use App\Entity\AnimalEntity;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

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

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Présentation','fa-solid fa-paw'),

            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('race', 'Race'),
            TextField::new('image'),
            AssociationField::new('habitatDeLAnimal', 'Choix de l\'habitat de l\'animal')
            ->setRequired(true),

            FormField::addTab('Santé de l\'animal', 'fa-solid fa-user-doctor'),

            TextField::new('etatAnimal', 'Etat de l\'animal'),
            TextField::new('nourritureType', 'Nourriture Type/préférée'),
            IntegerField::new('nourritureQuantite', 'Quantité de nourriture en Gramme'),
            DateTimeField::new('datePassage', 'Date de passage'),
            TextEditorField::new('detailsCommentaire', 'Commentaire')

        
        ];
    }
}

