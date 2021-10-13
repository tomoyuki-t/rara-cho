@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($erros->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif