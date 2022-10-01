<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller

{
    protected function index()
    {
        $expenses = Expense::all()->sortby('date');

        return view('expenses.index', [
            'expenses' => $expenses,
        ]);
    }
}
