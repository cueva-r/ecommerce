@component('mail::message')
    Hola Admin

    Nombre: {{ $user->nombre }}
    Email: {{ $user->email }}
    Teléfono: {{ $user->telefono }}
    Subjeto: {{ $user->subjeto }}
    Mensaje: {{ $user->mensaje }}

@endcomponent