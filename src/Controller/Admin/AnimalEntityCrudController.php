<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\CustomAction;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;


class AnimalEntityCrudController extends AbstractCrudController
{
    public function configureActions(Actions $actions): Actions{

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
        return $actions;
    }
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
            ImageField::new('image', 'Insérer une image')->setUploadDir('/public/uploads/images/Animal')->setBasePath('/uploads/images/Animal'),
            AssociationField::new('habitatDeLAnimal', 'Choix de l\'habitat de l\'animal')
            ->setRequired(true),

            FormField::addTab('Santé de l\'animal', 'fa-solid fa-user-doctor'),

            DateTimeField::new('datePassage', 'Date de passage'),
            TextField::new('etatAnimal', 'Etat de l\'animal'),
            TextField::new('nourritureType', 'Nourriture favorite'),
            IntegerField::new('nourritureQuantite', 'Quantité de nourriture en Gramme'),
            TextEditorField::new('detailsCommentaire', 'Commentaire')

        
        ];
    }
}

