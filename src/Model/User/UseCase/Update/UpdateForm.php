<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\Update;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', Type\EmailType::class, ['label' => 'Email', 'required' => true])
            ->add('firstName', Type\TextType::class, ['label' => 'First name', 'required' => true])
            ->add('lastName', Type\TextType::class, ['label' => 'Last name', 'required' => true]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UpdateDto::class,
            'csrf_protection' => false
        ]);
    }
}