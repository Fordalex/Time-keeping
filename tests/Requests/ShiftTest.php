<?php

namespace Tests\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use App\Models\Company;
use App\Models\Shift;

class ShiftTest extends TestCase
{
    // Test that a shift is created with a company attached.
    public function test_shifts_create()
    {
        $company = Company::factory()->create();
        $shift_attributes = [
            'date' => Carbon::today(),
            'description' => 'mentoring',
            'duration' => '60',
            'hourly_rate' => '20.00',
            'company_id' => $company->id
        ];
        $response = $this->post('/shift', $shift_attributes);

        $response->assertStatus(302);
        $response->assertRedirect('/shifts');
        $response->assertSessionHas('flash_message', ["type" => "success", "message" => "Shift was created successfully!"]);
        $this->assertDatabaseHas('shifts', $shift_attributes);
    }

    public function test_shifts_index()
    {
        $company = Company::factory()->create();
        $shift = Shift::factory()->for($company)->create();

        $response = $this->get("/shifts/{$shift->id}/edit");

        $response->assertOk();
    }

    public function test_shifts_new()
    {
        $response = $this->get('/shifts');

        $response->assertOk();
    }

    public function test_shifts_edit()
    {
        $response = $this->get('/shifts/new');

        $response->assertOk();
    }


    public function test_shifts_update()
    {
        $old_company = Company::factory()->create();
        $new_company = Company::factory()->create();
        $old_attributes = [
            'description' => 'Old description',
            'duration' => '20.00',
            'hourly_rate' => '20',
            'date' => Carbon::today(),
            'company_id' => $old_company->id
        ];

        $shift = Shift::factory()
            ->for($old_company)
            ->state($old_attributes)
            ->create();

        $new_attributes = [
            'description' => 'New description',
            'duration' => '25.00',
            'hourly_rate' => '25',
            'date' => Carbon::tomorrow(),
            'company_id' => $new_company->id
        ];

        $response = $this->put("/shifts/{$shift->id}", $new_attributes);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('shifts', $old_attributes);
        $this->assertDatabaseHas('shifts', $new_attributes);
    }
}
