<?php

namespace App\Controller\Admin;

use App\Entity\StatistiqueEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;

class StatistiqueEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StatistiqueEntity::class;
    }

}
