<?php

namespace App\Form;

use App\Entity\FormulaireEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ForumlaireEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomFormulaire', TextType::class)
            ->add('prenomFormulaire', TextType::class)
            ->add('adresseMailFormulaire', EmailType::class) 
            ->add('sujetFormulaire', TextType::class)
            ->add('descriptionFormulaire', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => 'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormulaireEntity::class,
        ]);
    }
}
