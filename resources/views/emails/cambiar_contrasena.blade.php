@component('mail::layout')

    Hola <b>{{ $user->name }}</b>

    <p>Nosotros entendemos que pasa</p>


    @component('mail::button', ['url' => url('cambiar/' . $user->remember_token)])
        Restablece tu contraseña
    @endcomponent


    <p>En caso de que tenga algún problema para recuperar su contraseña, contáctenos.</p>

    Gracias, <br>
    {{ config('app.name') }}

@endcomponent
