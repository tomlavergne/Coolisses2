<?php

namespace App\Form;

use App\Entity\Experience;
use App\Entity\Genre;
use App\Entity\Langue;
use App\Entity\Metier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('metier', EntityType::class, [
                'class' => Metier::class,
                'required' => false,
                'placeholder' => 'Sélectionner',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'appearance-none px-4 py-2 bg-[#eeeeee] [&:not(:focus)]:text-gray-500 [&:not(:focus)]:italic',
                    'data-live-submit' => true,
                    'onchange' => 'this.form.submit()'
                ],
                'label_attr' => ['class' => 'font-medium'],
            ])

            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'required' => false,
                'placeholder' => 'Sélectionner',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'appearance-none px-4 py-2 bg-[#eeeeee] [&:not(:focus)]:text-gray-500 [&:not(:focus)]:italic',
                    'data-live-submit' => true,
                    'onchange' => 'this.form.submit()'
                ],
                'label_attr' => ['class' => 'font-medium'],
            ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'required' => false,
                'placeholder' => 'Sélectionner',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'appearance-none px-4 py-2 bg-[#eeeeee] [&:not(:focus)]:text-gray-500 [&:not(:focus)]:italic',
                    'data-live-submit' => true,
                    'onchange' => 'this.form.submit()'
                ],
                'label_attr' => ['class' => 'font-medium'],
            ])
            ->add('langue', EntityType::class, [
                'class' => Langue::class,
                'required' => false,
                'placeholder' => 'Sélectionner',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'appearance-none px-4 py-2 bg-[#eeeeee] [&:not(:focus)]:text-gray-500 [&:not(:focus)]:italic',
                    'data-live-submit' => true,
                    'onchange' => 'this.form.submit()'
                ],
                'label_attr' => ['class' => 'font-medium'],
            ])
            ->add('agemin', NumberType::class, [
                'invalid_message' => 'Saisissez un nombre',
                'required' => false,
                'attr' => [
                    'class' => 'px-4 py-2 bg-[#eeeeee]',
                    'data-live-submit' => true,
                    'onchange' => 'this.form.submit()'
                ],
                'label_attr' => ['class' => 'font-medium'],
            ])
            ->add('agemax', NumberType::class, [
                'invalid_message' => 'Saisissez un nombre',
                'required' => false,
                'attr' => [
                    'class' => 'px-4 py-2 bg-[#eeeeee]',
                    'data-live-submit' => true,
                    'onchange' => 'this.form.submit()'
                ],
                'label_attr' => ['class' => 'font-medium'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
