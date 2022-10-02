
<form class="grid grid-cols-11 gap-6 mb-4">
    <div class="col-span-4">
        <label class="label">From Date</label>
        <input type="date" name="from_date" value="{{ $shift_range->from_date->format('Y-m-d') }}" placeholder="Type here" class="input input-bordered w-full"  />
    </div>

    <div class="col-span-4">
        <label class="label">To Date</label>
        <input type="date" name="to_date" value="{{ $shift_range->to_date->format('Y-m-d') }}" class="input input-bordered w-full">
    </div>

    <div class="col-span-2">
        <label class="label">Only not invoiced</label>
        <input type="checkbox" name="not_invoiced" class="input input-bordered w-full">
    </div>

    <div class="col-span-1 flex items-end">
        <button type="submit" class="btn w-full">Filter</button>
    </div>
</form>

