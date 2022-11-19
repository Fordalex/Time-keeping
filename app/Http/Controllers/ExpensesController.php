<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class ExpensesController extends Controller

{
    protected function create()
    {
        Expense::create([
            'date' => request('date'),
            'description' => request('description'),
            'amount' => request('amount'),
            'user_id' => Auth::id(),
        ]);

        return redirect('/expenses')->with('flash_message', ["type" => "success", "message" => "Expense was created successfully!"]);
    }

    protected function index()
    {
        $expenses = Expense::all()->where('user_id', Auth::id())->sortby('date');
        $expenses_total = $expenses->sum('amount');

        return view('expenses.index', compact('expenses', 'expenses_total'));
    }

    protected function new()
    {
        $today = Carbon::today();
        $expense = new Expense(['date' => $today]);

        return view('expenses.new', compact('expense'));
    }

    protected function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    protected function update(Expense $expense)
    {
        $expense->update([
            'date' => request('date'),
            'description' => request('description'),
            'amount' => request('amount'),
        ]);

        return redirect('/expenses')->with('flash_message', ["type" => "success", "message" => "Expense was updated successfully!"]);
    }
}
