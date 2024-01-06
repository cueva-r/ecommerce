<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Agregar cupón
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">Cupones</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCoupon">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Código de cupón</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Código de cupon" class="form-control input-md" wire:model="code" />                                    
                                    @error('code')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tipo de cupón</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="type">
                                        <option value="">Seleccionar</option>
                                        <option value="fijado">Fijado</option>
                                        <option value="porcentaje">Porcentaje</option>
                                    </select>
                                    @error('type')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Valor de cupón</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Valor de cupón" class="form-control input-md" wire:model="value" />                                    
                                    @error('value')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Valor de carrito</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Valor de carrito" class="form-control input-md" wire:model="cart_value" />                                    
                                    @error('cart_value')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha de expiración</label>
                                <div class="col-md-4" wire:ignore>
                                    <input type="text" id="expity-date" placeholder="Fecha de expiración" class="form-control input-md" wire:model="expity_date" />                                    
                                    @error('expity_date')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('#expity-date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change', function(ev){
                var data = ('#expity-date').val()
                @this.set('expity-date', data)
            })
        })
    </script>
@endpush
