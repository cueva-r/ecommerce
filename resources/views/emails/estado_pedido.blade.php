@component('mail::message')
    <p>Estimado(a) {{ $pedido->nombres }}, {{ $pedido->apellidos }}</p>

    <p>Estado de pedido: <b>
        @if ($pedido->estado == 0)
            Pendiente
        @elseif ($pedido->estado == 1)   
            En progreso         
        @elseif ($pedido->estado == 2)      
            Entregado      
        @elseif ($pedido->estado == 3)         
            Completado   
        @elseif ($pedido->estado == 4)  
            Cancelado          
        @endif
        </b>
    </p>

    <h3>Detalles del pedido</h3>

    <ul>
        <li>Número de pedido: {{ $pedido->numero_pedido }}</li>
        <li>Fecha de compra: {{ date('Y-m-d', strtotime($pedido->created_at)) }}</li>
    </ul>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr>
                <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Artículo</th>
                <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Cantidad</th>
                <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido->getArticulo as $articulo)
                <tr>
                    <td style="margin: 8px; border-bottom: 1px solid #ddd;">
                        {{ $articulo->getProducto->titulo }}
                        <br>
                        Color: {{ $articulo->nombre_color }}
                        @if (!empty($articulo->nombre_tamano))
                            <br>
                            Tamaño: {{ $articulo->nombre_tamano }}
                            <br>
                            Cantidad de tamaño: s/. {{ number_format($articulo->cantidad_tamano, 2) }}
                        @endif
                    <td style="margin: 8px; border-bottom: 1px solid #ddd;">{{ $articulo->cantidad }}</td>
                    <td style="margin: 8px; border-bottom: 1px solid #ddd;">s/.
                        {{ number_format($articulo->precio_total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Nombre de envío: <b>{{ $pedido->getEnvio->nombre }}</b></p>
    <p>Cantidad de envío: <b>s/. {{ number_format($pedido->cantidad_envio, 2) }}</b></p>

    @if ($pedido->codigo_descuento)
        <p>Código de descuento: <b>{{ $pedido->codigo_descuento }}</b></p>
        <p>Cantidad de descuento: <b>s/. {{ number_format($pedido->cantidad_descuento, 2) }}</b></p>
    @endif

    <p>Cantidad total: <b>s/. {{ number_format($pedido->cantidad_total, 2) }}</b></p>
    <p style="text-transform: capitalize;">Metodo de pago: <b>{{ $pedido->metodo_pago }}</b></p>

    <p>Gracias por escoger <strong>E-commerce</strong>. Apreciamos su negocio.</p>

    Gracias, <br>
    {{ config('app.name') }}
@endcomponent
