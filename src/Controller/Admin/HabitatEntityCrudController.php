<?php

namespace App\Controller\Admin;

use App\Entity\HabitatEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;




class HabitatEntityCrudController extends AbstractCrudController
{
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
            TextField::new('habitatImage', 'Image'),
            ArrayField::new('animalEntities')->hideOnForm()
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_DETAIL, 'detail');
    }
}

