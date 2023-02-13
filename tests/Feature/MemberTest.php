<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Member;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;

class MemberTest extends TestCase
{  
    use RefreshDatabase;

    public function testMemberIsShownCorrectly() {
        $member = Member::create(
            [
                "name" => "Dagmar Hahn V",
                "email" => "oreilly.ret123a@yahoo.com",
                "address" => "6228 Pablo Mill Apt. 416",
                "city" => "West Naomieport",
                "state" => "Massachusetts",
                "postal_code" => "44011-1742"
            ]
        );

        $this->withoutMiddleware();

        $this->json('GET', "api/v1/members/$member->id")
            ->assertStatus(Response::HTTP_OK);
    }

    public function testMemberCreateCorrectly()
    {
        Sanctum::actingAs(User::factory()->create());

        $member = [
            "name"=> "Stewart Hansen",
            "email"=> "iokon@schinner.com",
            "address"=> "6448 Predovic Way",
            "city"=> "Littelmouth",
            "state"=> "Utah",
            "postal_code"=> "52001"
        ];

        $this->json('POST', 'api/v1/members', $member)
            ->assertStatus(Response::HTTP_CREATED);
    }
}
