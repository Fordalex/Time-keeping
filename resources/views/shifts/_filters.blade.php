
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
        <button type="submit" class="inline-flex justify-center py-3 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">Filter</button>
    </div>
</form>

