<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller

{
    public function index()
    {
        $expenses = Expense::all();

        return view('expenses.index', [
            'expenses' => $expenses,
        ]);
    }
}
