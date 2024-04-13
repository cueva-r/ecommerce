@component('mail::message')
    Hola <b>{{ $user->name }}</b>

    <p>Ya casi estás listo para comenzar a disfrutar de los beneficios del E-commerce</p>

    <p>Simplemente haga clic en el botón a continuación su correo electrónico</p>

    <p>
        @component('mail::button', ['url' => url('activar/' . base64_encode($user->id))])
            Verificar
        @endcomponent
    </p>

    <p>Esto verificará tu correo electrónico y luego serás oficialmente parte del E-commerce.</p>

@endcomponent