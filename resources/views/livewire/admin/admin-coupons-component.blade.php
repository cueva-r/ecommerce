<div>    
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Todos los cupones
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupon')}}" class="btn btn-success pull-right"><i class="fas fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Código de cupón</th>
                                    <th>Tipo de cupón</th>
                                    <th>Valor del cupón</th>
                                    <th>Valor del carrito</th>   
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->type}}</td>
                                        @if($coupon->type == 'Fijado')                                        
                                            <td>S/. {{$coupon->value}}</td>
                                        @else
                                            <td>{{$coupon->value}} %</td>
                                        @endif
                                        <td>S/. {{$coupon->cart_value}}</td>
                                        <td>
                                            <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="confirm('¿Estás seguro, quieres eliminar este cupón?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left:10px; ">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
