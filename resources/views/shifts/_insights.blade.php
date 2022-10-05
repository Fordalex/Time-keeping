<div>
    <div class="stats stats-horizontal lg:stats-horizontal shadow insights-container">
        <div class="stat">
            <div class="stat-title">Days</div>
            <div class="stat-value">{{ $shift_range->total_days() }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Shifts</div>
            <div class="stat-value">{{ $shift_range->shift_count() }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Average Per Day</div>
            <div class="stat-value">{{ MoneyHelper::format_amount($shift_range->average_per_day()) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Duration</div>
            <div class="stat-value">{{ TimeHelper::format_minutes($shift_range->total_duration(), " ") }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Earnt</div>
            <div class="stat-value">{{ MoneyHelper::format_amount($shift_range->total_amount()) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">After Tax</div>
            <div class="stat-value">{{ MoneyHelper::format_amount($shift_range->total_amount_after_tax()) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-actions">
                <form action="/invoices/new">
                    <input type="hidden" value="{{ $shift_range->from_date->format('Y-m-d') }}" name="from_date">
                    <input type="hidden" value="{{ $shift_range->to_date->format('Y-m-d') }}" name="to_date">
                    <input class="btn btn-success w-full" type="submit" value="Invoice">
                </form>
              </div>
        </div>
    </div>
</div>
