<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;
use Auth;

class ExpensesController extends Controller

{
    protected function index()
    {
        $expenses = Expense::all()->where('user_id', Auth::id())->sortby('date');

        return view('expenses.index', compact('expenses'));
    }
}
