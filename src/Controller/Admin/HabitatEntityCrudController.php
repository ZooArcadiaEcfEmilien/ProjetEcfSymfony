<?php

namespace App\Controller\Admin;

use App\Entity\HabitatEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Form\HabitatEntityType; // Import du formulaire HabitatEntityType
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;




class HabitatEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HabitatEntity::class;
    }   
    
    public function configureFields(string $pageName): iterable
    {
        // Retourner les champs à afficher dans le formulaire d'édition et de création
        return [
            IdField::new('id')->hideOnForm(), // Masquer l'ID dans le formulaire
            // Utilisation des champs définis dans HabitatEntityType
            TextField::new('habitatNom', 'Habitat'),
            TextField::new('habitatDescription', 'Description'),
            TextField::new('habitatImage', 'Image')
        ];
    }

        public function configureActions(Actions $actions): Actions
        {
            return $actions
                ->add(Crud::PAGE_DETAIL, 'detail');
        }
        

}

