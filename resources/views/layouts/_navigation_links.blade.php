@if (Auth::check())
    <li><a href="/">Home</a></li>
    <li><a href="/shifts">Shifts</a></li>
    <li><a href="/invoices">Invoices</a></li>
    <li><a href="/expenses">Expenses</a></li>
    <li><a href="/clients">Clients</a></li>
    <form action="/logout" method="POST">
        @csrf
        <li><button type="submit">Logout</button></li>
    </form>
@endif
