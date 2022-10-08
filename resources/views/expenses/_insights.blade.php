<div class="py-4 flex justify-center">
    <div class="stats stats-horizontal lg:stats-horizontal shadow">
        <div class="stat">
            <div class="stat-title">Expenses</div>
            <div class="stat-value">{{ count($expenses) }}</div>
            <div class="stat-desc"></div>
        </div>

        <div class="stat">
            <div class="stat-title">Total</div>
            <div class="stat-value">{{ MoneyHelper::format_amount(10) }}</div>
            <div class="stat-desc"></div>
        </div>
    </div>
</div>
