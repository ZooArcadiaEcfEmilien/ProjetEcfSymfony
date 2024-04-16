<?php

namespace App\Form;

use App\Entity\AnimalEntity;
use App\Entity\HabitatEntity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('race')
            ->add('image')
            ->add('etatAnimal')
            ->add('nourritureType')
            ->add('nourritureQuantite')
            ->add('datePassage', null, [
                'widget' => 'single_text',
            ])
            ->add('detailsCommentaire')
            ->add('habitat', EntityType::class, [
                'class' => HabitatEntity::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnimalEntity::class,
        ]);
    }
}
