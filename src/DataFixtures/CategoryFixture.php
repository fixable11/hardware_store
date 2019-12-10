<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Model\Category\Entity\Category;
use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use Faker\Factory;
use Faker\Generator;

class CategoryFixture extends Fixture
{
    public const CATEGORY_REFERENCE = 'category_reference';

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
        for ($i = 0; $i < ProductFixture::ITERATIONS; $i++) {
            $parent = new Category(
                $this->faker->text(10),
            );

            $category = new Category(
                $this->faker->text(10),
                $parent
            );

            $this->addReference(self::CATEGORY_REFERENCE . '_' . $i, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}