@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('registerPost') }}">
    @csrf
    <input type="text" placeholder="Ваше имя" name="name">
    <input type="email" placeholder="E-mail" name="email">
    <input type="password" placeholder="Пароль" name="password">
    <input type="submit">
</form>
