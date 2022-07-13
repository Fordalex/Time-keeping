<form action={{ $action }} method="POST">
    @method($method)
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <label class="label">Hourly Rate</label>
                    <input type="number" name="hourly_rate" placeholder="Type here" class="input input-bordered w-full w-full" value="{{ $shift->hourly_rate }}" />
                </div>

                <div class="col-span-6">
                    <label class="label">Date</label>
                    <input type="date" name="date" class="input input-bordered w-full w-full">
                </div>

                <div class="col-span-6">
                    <label class="label">Description</label>
                    <input type="text" placeholder="Type here" name="description" class="input input-bordered w-full w-full" value="{{ $shift->description }}" />
                </div>

                <div class="col-span-6">
                    <label class="label">Company</label>
                    <select class="select select-bordered w-full">
                        <option>Commit Digital</option>
                        <option>Learning People</option>
                    </select>
                </div>

                <div class="col-span-12">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="range" min="0" max="480" value="{{ $shift->duration }}" class="range" step="15" name="duration" />
                    <div class="w-full flex justify-between text-xs px-2 rangeMarks-container">
                        @foreach(range(0, 32) as $i)
                            <span>| {{ TimeHelper::format_minutes($i * 15) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
    </div>
</form>
