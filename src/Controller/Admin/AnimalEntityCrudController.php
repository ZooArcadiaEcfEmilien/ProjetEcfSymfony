<?php

namespace App\Controller\Admin;

use App\Entity\AnimalEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\Fieldtext;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class AnimalEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AnimalEntity::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('race'),
            TextEditorField::new('image'),
            TextField::new('habitat'),
            TextField::new('etatAnimal'),
            TextField::new('nourritureType'),
            IntegerField::new('nourritureQuantite'),
            DateTimeField::new('datePassage'),
            TextField::new('detailsCommentaire'),

        ];
    }
    
}
