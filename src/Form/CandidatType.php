<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Cin', IntegerType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('nom', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('prenom', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('score', IntegerType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('motcle', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ;
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
