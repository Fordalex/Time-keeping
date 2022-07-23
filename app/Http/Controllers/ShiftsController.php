<?php

namespace App\Http\Controllers;
use App\Models\Shift;
use App\Models\Company;
use MoneyHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShiftsController extends Controller

{
    public function create()
    {
        Shift::create([
            'date' => Carbon::parse(request('date'))->format('Y-m-d H:i:s'),
            'description' => request('description'),
            'duration' => request('duration'),
            'hourly_rate' => request('hourly_rate'),
            'company_id' => request('company_id'),
        ]);

        return redirect('/shifts')->with('flash_message', ["type" => "success", "message" => "Shift was created successfully!"]);
    }

    public function index()
    {
        $from_date = Carbon::today()->subDays(30);
        $to_date = Carbon::today();
        if (isset($_REQUEST["from_date"]) && isset($_REQUEST["to_date"]))
        {
            $from_date = Carbon::parse($_REQUEST["from_date"]);
            $to_date = Carbon::parse($_REQUEST["to_date"]);
        }
        $shifts = Shift::all()->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sortby('date');
        $total_duration = $shifts->sum('duration');
        $total_earnt = MoneyHelper::total_earnt($shifts);

        return view('shifts.index', [
            'shifts' => $shifts,
            'total_duration' => $total_duration,
            'total_earnt' => $total_earnt,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function new()
    {
        $companies = Company::all();
        $shift = new Shift;

        return view('shifts.new', [
            'shift' => $shift,
            'companies' => $companies,
        ]);
    }

    public function edit(Shift $shift)
    {
        $companies = Company::all();

        return view('shifts.edit', [
            'shift' => $shift,
            'companies' => $companies,
        ]);
    }

    public function update(Shift $shift)
    {
        // model validation?
        request()->validate([
            'duration' => 'required',
            'hourly_rate' => 'required',
        ]);

        $shift->update([
            'description' => request('description'),
            'duration' => request('duration'),
            'hourly_rate' => request('hourly_rate'),
            'date' => Carbon::parse(request('date'))->format('Y-m-d H:i:s'),
            'company_id' => request('company_id')
        ]);

        return redirect('/shifts')->with('flash_message', ["type" => "success", "message" => "Shift was updated successfully!"]);;
    }
}
