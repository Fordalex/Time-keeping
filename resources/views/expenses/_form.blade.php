<form action={{ $action }} method="POST">
    @method($method)
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <label class="label">Date</label>
                    <input type="date" name="date" class="input input-bordered w-full w-full" value="{{ $expense->date?->format('Y-m-d') }}">
                </div>

                <div class="col-span-6">
                    <label class="label">Description</label>
                    <input type="text" placeholder="Type here" name="description" class="input input-bordered w-full w-full" value="{{ $expense->description }}" />
                </div>

                <div class="col-span-6">
                    <label class="label">Amount</label>
                    <input type="number" name="amount" placeholder="Type here" class="input input-bordered w-full w-full" value="{{ $expense->amount }}" />
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
    </div>
</form>
