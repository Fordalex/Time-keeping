<form action={{ $action }} method="POST">
    @method($method)
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-4">
                    <label class="label">From Date</label>
                    <input type="date" name="from_date" placeholder="Type here" class="input input-bordered w-full w-full" value="{{ $from_date }}" />
                </div>

                <div class="col-span-4">
                    <label class="label">To Date</label>
                    <input type="date" name="to_date" class="input input-bordered w-full w-full" value="{{ $to_date }}">
                </div>

                <div class="col-span-4">
                    <label class="label">Due Date</label>
                    <input type="date" placeholder="Type here" name="due_date" class="input input-bordered w-full w-full" />
                </div>

                <div class="col-span-6">
                    <label class="label">Company</label>
                    <select class="select select-bordered w-full" name="company">
                        <option>Commit Digital</option>
                        <option>Learning People</option>
                    </select>
                </div>

                <div class="col-span-6">
                    <label class="label">Terms</label>
                    <input type="text" placeholder="Information..." name="terms" class="input input-bordered w-full w-full" value="{{ $invoice->terms }}" />
                </div>

                <div class="col-span-4">
                    <label class="label">Bank</label>
                    <input type="text" placeholder="Bank Name" name="bank" class="input input-bordered w-full w-full" value="{{ $invoice->bank }}" />
                </div>

                <div class="col-span-4">
                    <label class="label">Account Number</label>
                    <input type="text" placeholder="00000000" name="account_number" class="input input-bordered w-full w-full" value="{{ $invoice->account_number }}" />
                </div>

                <div class="col-span-4">
                    <label class="label">Sort Code</label>
                    <input type="text" placeholder="00-00-00" name="sort_code" class="input input-bordered w-full w-full" value="{{ $invoice->sort_code }}" />
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
    </div>
</form>
