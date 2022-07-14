<div class="text-sm breadcrumbs breadcrumbs-container">
    <ul>
        @foreach($breadcrumbs as $breadcrumb)
            <li><a href="{{ $breadcrumb["link"] }}">{{ $breadcrumb["label"] }}</a></li>
        @endforeach
        <li>@yield('title')</li>
    </ul>
</div>
