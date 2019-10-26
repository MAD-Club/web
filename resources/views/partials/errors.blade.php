@if($errors->any())
    <p style="color:red">
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </p>
@endif

