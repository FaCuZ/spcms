@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>Hay un problema con tus datos.</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-remove"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif