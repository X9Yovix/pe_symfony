<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class MajVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serie', TextType::class, [
                'label' => 'Serie',
            ])
            ->add('date_mise_circulation', DateType::class, [
                'label' => 'Date de mise en circulation'
            ])
            ->add('modele', TextType::class, [
                'label' => 'Modele'
            ])
            ->add('prix_jour', NumberType::class, [
                'label' => 'Prix par jour'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
