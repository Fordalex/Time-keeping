<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Invoice;
use App\Models\Company;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceTest extends TestCase
{
    use DatabaseTransactions;

    public function test_formatted_number()
    {
        $company = Company::factory()->create();
        $invoice_one = Invoice::factory()
            ->for($company)
            ->state(['number'=>1])
            ->create();
        $invoice_five = Invoice::factory()
            ->for($company)
            ->state(['number'=>555])
            ->create();
        $this->assertEquals($invoice_one->formatted_number(), "001");
        $this->assertEquals($invoice_five->formatted_number(), "555");
    }
}
