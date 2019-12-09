<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use Faker\Factory;
use Faker\Generator;

/**
 * Class ProductFixture
 *
 * @package App\DataFixtures
 */
class ProductFixture extends Fixture
{
    private const ITERATIONS = 5;

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
            for ($j = 0; $j < self::ITERATIONS; $j++) {
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
}
