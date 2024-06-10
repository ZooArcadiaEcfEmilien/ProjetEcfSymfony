<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class HorairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }
    public function configureActions(Actions $actions): Actions{

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL)
                ->disable(Action::NEW,Action::DELETE);

        return $actions;
    }

    public function configureFields(string $pageName): iterable
{
    return [
        IdField::new('id')->hideOnForm(),
        TimeField::new('lundiStart')->setLabel('Lundi Ouverture'),
        TimeField::new('lundiClose')->setLabel('Lundi Fermeture'),
        TimeField::new('mardiStart')->setLabel('Mardi Ouverture'),
        TimeField::new('mardiClose')->setLabel('Mardi Fermeture'),
        TimeField::new('mercrediStart')->setLabel('Mercredi Ouverture'),
        TimeField::new('mercrediClose')->setLabel('Mercredi Fermeture'),
        TimeField::new('jeudiStart')->setLabel('Jeudi Ouverture'),
        TimeField::new('jeudiClose')->setLabel('Jeudi Fermeture'),
        TimeField::new('vendrediStart')->setLabel('Vendredi Ouverture'),
        TimeField::new('vendrediClose')->setLabel('Vendredi Fermeture'),
        TimeField::new('samediStart')->setLabel('Samedi Ouverture'),
        TimeField::new('samediClose')->setLabel('Samedi Fermeture'),
        TimeField::new('dimancheStart')->setLabel('Dimanche Ouverture'),
        TimeField::new('dimancheClose')->setLabel('Dimanche Fermeture'),
    ];
}
    
}
