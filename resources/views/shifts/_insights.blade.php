<div class="py-4 flex justify-center">
    <div class="stats stats-horizontal lg:stats-horizontal shadow">
        <div class="stat">
            <div class="stat-title">Shifts</div>
            <div class="stat-value">{{ count($shifts) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Duration</div>
            <div class="stat-value">{{ TimeHelper::format_minutes($total_duration) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Earnt</div>
            <div class="stat-value">{{ MoneyHelper::format_money($total_earnt) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">After Tax</div>
            <div class="stat-value">{{ MoneyHelper::format_money($total_earnt * 0.8) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-actions">
                <form action="/invoices/new">
                    <input type="hidden" value="{{ $from_date->format('Y-m-d') }}" name="from_date">
                    <input type="hidden" value="{{ $to_date->format('Y-m-d') }}" name="to_date">
                    <input class="btn btn-sm w-full" type="submit" value="Invoice">
                </form>
              </div>
        </div>
    </div>
</div>
