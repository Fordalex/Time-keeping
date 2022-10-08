<form class="grid grid-cols-10 gap-0 sm:gap-6 mb-4">
    <div class="col-span-10 sm:col-span-2">
        <label class="label">From Date</label>
        <input type="date" name="from_date" value="{{ Auth::user()->preference->from_date->format('Y-m-d') }}" placeholder="Type here" class="input input-bordered w-full"/>
    </div>

    <div class="col-span-10 sm:col-span-2">
        <label class="label">To Date</label>
        <input type="date" name="to_date" value="{{ Auth::user()->preference->to_date->format('Y-m-d') }}" class="input input-bordered w-full">
    </div>

    <div class="col-span-10 sm:col-span-2">
        <label class="label">Company</label>
        <select class="input input-bordered w-full" name="company_filter">
            <option value="">All</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ Auth::user()->preference->company_filter == $company->id ? "selected" : "" }}>{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-span-10 sm:col-span-2">
        <label class="label">Shifts</label>
        <select class="input input-bordered w-full" name="shift_filter">
            <option value="">All</option>
            <option value="invoiced" {{ Auth::user()->preference->shift_filter == "invoiced" ? "selected" : "" }}>Invoiced</option>
            <option value="not_invoiced" {{ Auth::user()->preference->shift_filter == "not_invoiced" ? "selected" : "" }}>Not Invoiced</option>
        </select>
    </div>

    <div class="col-span-10 sm:col-span-2 flex items-end mt-3">
        <button type="submit" class="btn w-full">Filter</button>
    </div>
</form>
