<?php

namespace App\Http\Controllers;
use App\Models\Shift;

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
        ]);

        return redirect('/shifts')->with('flash_message', ["type" => "success", "message" => "Shift was created successfully!"]);
    }

    public function index()
    {
        $shifts = Shift::all();
        $total_duration = 4;
        $total_earnt = 0.50;

        return view('shifts.index', ['shifts' => $shifts, 'total_duration' => $total_duration, 'total_earnt' => $total_earnt]);
    }

    public function new()
    {
        $shift = new Shift;

        return view('shifts.new', ['shift' => $shift]);
    }

    public function edit(Shift $shift)
    {
        return view('shifts.edit', ['shift' => $shift]);
    }

    public function update(Shift $shift)
    {
        // model validation?
        request()->validate([
            'duration' => 'required',
            'hourly_rate' => 'required',
            'description' => 'required',
        ]);

        $shift->update([
            'description' => request('description'),
            'duration' => request('duration'),
            'hourly_rate' => request('hourly_rate'),
        ]);

        return redirect('/shifts')->with('flash_message', ["type" => "success", "message" => "Shift was updated successfully!"]);;
    }
}
