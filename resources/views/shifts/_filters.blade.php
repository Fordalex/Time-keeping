
<form class="grid grid-cols-11 gap-6 mb-4">
    <div class="col-span-5">
        <label class="label">From Date</label>
        <input type="date" name="from_date" value="{{ $from_date->format('Y-m-d') }}" placeholder="Type here" class="input input-bordered w-full"  />
    </div>

    <div class="col-span-5">
        <label class="label">To Date</label>
        <input type="date" name="to_date" value="{{ $to_date->format('Y-m-d') }}" class="input input-bordered w-full">
    </div>

    <div class="col-span-1 flex items-end">
        <button type="submit" class="btn btn-warning w-full">Filter</button>
    </div>
</form>

