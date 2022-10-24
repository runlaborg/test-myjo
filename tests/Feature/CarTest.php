<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function we_can_create_car_factory()
    {
        $car = Car::factory()->create();

        $this->assertInstanceOf(Car::class, $car);
    }
    /** @test */
    public function we_can_provide_user_id_to_car_factory()
    {
        $user = User::factory()->create();
        $car = Car::factory()->create(['user_id' => $user->id]);

        $this->assertEquals($user->id, $car->user_id);
    }

    /** @test */
    public function we_can_provide_null_user_id_to_car_factory()
    {
        $car = Car::factory()->create(['user_id' => null]);

        $this->assertEquals($car->user_id, null);
    }
}
