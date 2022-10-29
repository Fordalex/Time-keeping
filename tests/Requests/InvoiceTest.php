<?php

namespace Tests\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Shift;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceTest extends TestCase
{
    use DatabaseTransactions;

    public function test_invoices_create()
    {
        $irrelevant_company = Company::factory()->create();
        $company = Company::factory()->state(['initial_invoice_no' => 3])->create();
        Shift::factory()->for($company)->state(['date' => Carbon::today()])->create();
        Shift::factory()->for($company)->state(['date' => Carbon::tomorrow()])->create();
        Shift::factory()->for($company)->state(['date' => Carbon::today()->subDays(2)])->create();
        Invoice::factory()->for($company)->create();
        Invoice::factory()->for($irrelevant_company)->create();
        $invoice_attributes = [
            'from_date' => Carbon::today(),
            'to_date' => Carbon::tomorrow(),
            'due_date' => Carbon::today()->subDays(10),
            'company_id' => $company->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => '01010101',
            'sort_code' => '00-00-00'
        ];
        $response = $this->post('/invoice', $invoice_attributes);
        $invoice_attributes["number"] = 5;
        $this->assertDatabaseHas('invoices', $invoice_attributes);
        $this->assertDatabaseCount('invoices', 3);
        $this->assertDatabaseCount('billed_shifts', 2);
        $response->assertRedirect('/invoices');
        $response->assertSessionHas('flash_message', ["type" => "success", "message" => "Invoice was created successfully!"]);

        // If a shift has already been billed there should be a validation error.
        $response = $this->post('/invoice', $invoice_attributes);
    }

    public function test_invoices_index()
    {
        $response = $this->get('/invoices');

        $response->assertOk();
    }

    public function test_invoices_show()
    {
        $company = Company::factory()->create();
        $invoice = Invoice::factory()
            ->for($company)
            ->create();

        $response = $this->get("/invoice/{$invoice->id}");

        $response->assertOk();
    }
}
