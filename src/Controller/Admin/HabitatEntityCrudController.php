<?php

namespace App\Controller\Admin;

use App\Entity\HabitatEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class HabitatEntityCrudController extends AbstractCrudController
{
    public function configureActions(Actions $actions): Actions{

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
        return $actions;
    }
    public static function getEntityFqcn(): string
    {
        return HabitatEntity::class;
    }   
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), 
            TextField::new('habitatNom', 'Habitat'),
            TextField::new('habitatDescription', 'Description'),
            ImageField::new('habitatImage', 'Insérer une image')->setUploadDir('/public/uploads/images/Habitats'),
            ArrayField::new('animalEntities')->hideOnForm()
        ];
    }
}

