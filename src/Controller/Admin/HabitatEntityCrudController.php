<?php

namespace App\Controller\Admin;

use App\Entity\HabitatEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HabitatEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HabitatEntity::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), // Masquer l'ID dans le formulaire
            TextField::new('habitatNom', 'Nom'),
            TextEditorField::new('habitatDescription', 'Description'),
            TextField::new('habitatImage', 'Image'), 
        ];
    }
}
