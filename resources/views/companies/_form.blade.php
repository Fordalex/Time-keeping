<form action={{ $action }} method="POST">
    @method($method)
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <label class="label">Name</label>
                    <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full w-full" value="{{ $company->name }}" />
                </div>

                <div class="col-span-6">
                    <label class="label">Initial invoice no</label>
                    <input type="number" name="initial_invoice_no" class="input input-bordered w-full w-full" value="{{ $company->initial_invoice_no }}">
                </div>

                <div class="col-span-6">
                    <label class="label">City</label>
                    <input type="text" placeholder="Type here" name="city" class="input input-bordered w-full w-full" value="{{ $company->city }}"/>
                </div>

                <div class="col-span-6">
                    <label class="label">First line address</label>
                    <input type="text" placeholder="Information..." name="first_line_address" class="input input-bordered w-full w-full" value="{{ $company->first_line_address }}" />
                </div>

                <div class="col-span-6">
                    <label class="label">Country</label>
                    <input type="text" placeholder="00000000" name="country" class="input input-bordered w-full w-full" value="{{ $company->country }}" />
                </div>

                <div class="col-span-6">
                    <label class="label">Postcode</label>
                    <input type="text" placeholder="00-00-00" name="postcode" class="input input-bordered w-full w-full" value="{{ $company->postcode }}" />
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
    </div>
</form>
