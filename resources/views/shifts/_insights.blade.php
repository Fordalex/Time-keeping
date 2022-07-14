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
                <button class="btn btn-sm w-full">Invoice</button>
              </div>
        </div>
    </div>
</div>
