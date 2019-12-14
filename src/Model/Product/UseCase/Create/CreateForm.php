<?php

declare(strict_types=1);

namespace App\Model\Product\UseCase\Create;

use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

/**
 * Class CreateForm.
 */
class CreateForm extends AbstractType
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
            ->add('sku', Type\TextType::class, ['label' => 'Sku', 'required' => true])
            ->add('name', Type\TextType::class, ['label' => 'Product name', 'required' => true])
            ->add('photos', Type\FileType::class, [
                'required' => false,
                'multiple' => true,
                'label' => 'Product photos',
                'attr'     => [
                    'accept' => 'image/*',
                    'multiple' => 'multiple'
                ],
            ])
            ->add('description', Type\TextType::class, [
                'label' => 'Product description',
                'required' => true
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
            'data_class' => CreateDto::class,
            'csrf_protection' => false
        ));
    }
}
