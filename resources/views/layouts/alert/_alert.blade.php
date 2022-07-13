<div class="alert alert-{{ $flash_message["type"] }} shadow-lg">
    <div>
        @include("layouts.alert._{$flash_message['type']}_icon")
        <span>{{ $flash_message["message"] }}</span>
    </div>
</div>
