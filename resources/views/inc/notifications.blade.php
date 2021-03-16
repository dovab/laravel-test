@if (session("status"))
    <div class="alert alert-success mt-5">
        {{ session("status") }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
