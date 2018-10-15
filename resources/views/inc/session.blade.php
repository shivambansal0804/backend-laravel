@if (Session::has('success'))

<div class="content is-success" role="alert">
    <span class="badge badge-success">{{ Session::get('success') }}</span>
</div>

@endif