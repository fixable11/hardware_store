<?php

declare(strict_types=1);

namespace App\Model\Category\UseCase\Update;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

/**
 * Class UpdateForm.
 */
class UpdateForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder Builder.
     * @param array                $options Options.
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', Type\TextType::class, ['label' => 'Category name', 'required' => true])
            ->add('parentId', Type\IntegerType::class, [
                'label' => 'Parent category id',
                'required' => false
            ]);
    }

    /**
     * @param OptionsResolver $resolver Resolver.
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(array(
            'data_class' => UpdateDto::class,
            'csrf_protection' => false
        ));
    }
}