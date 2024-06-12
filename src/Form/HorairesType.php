<?php

namespace App\Form;

use App\Entity\Horaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HorairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lundiStart', null, [
                'widget' => 'single_text',
            ])
            ->add('lundiClose', null, [
                'widget' => 'single_text',
            ])
            ->add('mardiStart', null, [
                'widget' => 'single_text',
            ])
            ->add('mardiClose', null, [
                'widget' => 'single_text',
            ])
            ->add('mercrediStart', null, [
                'widget' => 'single_text',
            ])
            ->add('mercrediClose', null, [
                'widget' => 'single_text',
            ])
            ->add('jeudiStart', null, [
                'widget' => 'single_text',
            ])
            ->add('jeudiClose', null, [
                'widget' => 'single_text',
            ])
            ->add('vendrediStart', null, [
                'widget' => 'single_text',
            ])
            ->add('vendrediClose', null, [
                'widget' => 'single_text',
            ])
            ->add('samediStart', null, [
                'widget' => 'single_text',
            ])
            ->add('samediClose', null, [
                'widget' => 'single_text',
            ])
            ->add('dimancheStart', null, [
                'widget' => 'single_text',
            ])
            ->add('dimancheClose', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Horaires::class,
        ]);
    }
}
