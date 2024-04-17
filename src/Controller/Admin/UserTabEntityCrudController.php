<?php

namespace App\Controller\Admin;

use App\Entity\UserTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserTabEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserTabEntity::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('userType'),
            TextField::new('password'),
            TextField::new('userName'),
            TextField::new('mail'),
        ];
    }
    
}
