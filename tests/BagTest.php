<?php

declare(strict_types = 1);

namespace Example\Tests;

use Example\App\Bag;
use Example\App\ContainerFullException;
use PHPStan\Testing\TestCase;

class BagTest extends TestCase
{
    /** @test */
    public function a_new_bag_is_empty(): void
    {
        $bag = new Bag();

        $this->assertEquals([], $bag->items());
    }

    /** @test */
    public function a_bag_can_have_a_category(): void
    {
        $bag = new Bag('a category');

        $this->assertEquals('a category', $bag->category());
    }

    /** @test */
    public function can_add_an_item_to_the_bag(): void
    {
        $bag = new Bag();

        $bag->add('wool');

        $this->assertEquals(['wool'], $bag->items());
    }

    /** @test */
    public function a_bag_can_hold_up_to_4_items(): void
    {
        $bag = new Bag();
        $bag->add("item 1");
        $bag->add("item 2");
        $bag->add("item 3");
        $bag->add("item 4");

        $this->expectException(ContainerFullException::class);

        $bag->add("item 5");
    }
}
