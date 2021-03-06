<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Model\Category\Entity\Category;
use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use Faker\Factory;
use Faker\Generator;

/**
 * Class ProductFixture
 *
 * @package App\DataFixtures
 */
class ProductFixture extends Fixture implements DependentFixtureInterface
{
    public const ITERATIONS = 30;

    /**
     * @var Generator $faker Faker.
     */
    private $faker;

    /**
     * ProductFixture constructor.
     *
     */
    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * @param ObjectManager $manager Object manager.
     *
     * @return void
     *
     * @throws Exception Exception.
     */
    public function load(ObjectManager $manager)
    {
        $materials = ["iron", "wood", "gold"];

        for ($i = 0; $i < self::ITERATIONS; $i++) {
            $product = new Product(
                Sku::next(),
                $this->faker->text(10),
                $this->faker->text(200)
            );
            /** @var Category $category */
            $category = $this->getReference(CategoryFixture::CATEGORY_REFERENCE . '_' . $i);
            $product->assignCategory($category);
            for ($j = 0; $j < round(self::ITERATIONS / 2); $j++) {
                $product->addProductDetail(
                    'ver' . $this->faker->randomDigit,
                    $this->faker->numberBetween(1, 100),
                    $this->faker->colorName,
                    $this->faker->text(200),
                    (string) $this->faker->numberBetween(100, 2000),
                    $materials[array_rand($materials)]
                );
            }
            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            CategoryFixture::class
        ];
    }
}
