@extends('admin.layouts.app')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="{{url('public/assets/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar este producto</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/productos/listar') }}" class="btn btn-primary">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('admin.layouts._message')

                        <div class="card card-primary">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Título <span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('titulo', $productos->titulo) }}" required name="titulo"
                                                    placeholder="Título del producto">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SKU <span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('sku', $productos->sku) }}" required name="sku"
                                                    placeholder="SKU del producto">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Categoría <span style="color: red">*</span></label>
                                                <select name="categoria_id" required id="changeCategoria" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($getCategorias as $categorias)
                                                        <option {{ ($productos->categoria_id == $categorias->id) ? 'selected' : '' }} value="{{ $categorias->id }}">
                                                            {{ $categorias->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub categoría <span style="color: red">*</span></label>
                                                <select name="subcategoria_id" required id="getSubcategoria" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($get_subcategorias as $subCategorias)
                                                        <option {{ ($productos->subcategoria_id == $subCategorias->id) ? 'selected' : '' }} value="{{ $subCategorias->id }}">
                                                            {{ $subCategorias->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Marca <span style="color: red">*</span></label>
                                                <select name="marca_id" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($getMarcas as $marcas)
                                                        <option {{ ($productos->marca_id == $marcas->id) ? 'selected' : '' }} value="{{ $marcas->id }}">{{ $marcas->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estado <span style="color: red">*</span></label>
                                                <select class="form-control" required name="estado">
                                                    <option {{ ($productos->estado == 0) ? 'selected' : '' }} value="0">
                                                        Activo</option>
                                                    <option {{ ($productos->estado == 1) ? 'selected' : '' }} value="1">
                                                        Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color <span style="color: red">*</span></label>
                                                @foreach ($getColores as $colores)
                                                    @php
                                                        $checked = '';
                                                    @endphp

                                                    @foreach ($productos->getColor as $pcolor)
                                                        @if ($pcolor->color_id == $colores->id)
                                                        @php
                                                            $checked = 'checked';
                                                        @endphp
                                                        @endif
                                                    @endforeach
                                                    <div>
                                                        <label>
                                                            <input {{ $checked }} type="checkbox" name="color_id[]" value="{{ $colores->id }}"> {{ $colores->nombre }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Magnitud <span style="color: red">*</span></label>
                                                <div>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Precio (S/.)</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="appendMagnitud">
                                                            <tr>
                                                                <td>
                                                                    <input type="text" placeholder="Nombre" name="" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="" placeholder="Precio" class="form-control">
                                                                </td>
                                                                <td style="width: 100px">
                                                                    <button type="button" class="btn btn-outline-success agregarMagnitud">
                                                                        <i class="fa-solid fa-plus"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Precio (S/.) <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" value="{{ $productos->precio }}" required
                                                    name="precio" placeholder="Precio del producto">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Precio anterior (S/.) <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" value="{{ $productos->precio_anterior }}" required
                                                    name="precio_anterior" placeholder="Precio anterior del producto">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descripción corta <span style="color: red">*</span></label>
                                                <textarea name="descripcion_corta" class="form-control editor" placeholder="Descripción corta del producto">{{ $productos->descripcion_corta }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descripción <span style="color: red">*</span></label>
                                                <textarea name="descripcion" class="form-control editor" placeholder="Descripción del producto">{{ $productos->descripcion }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Información adicional <span style="color: red">*</span></label>
                                                <textarea name="informacion_adicional" class="form-control editor" placeholder="Información adicional del producto">{{ $productos->informacion_adicional }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Envíos y devoluciones <span style="color: red">*</span></label>
                                                <textarea name="envios_devoluciones" class="form-control editor" placeholder="Envíos y devoluciones del producto">{{ $productos->envios_devoluciones }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@section('script')

    <!-- Summernote -->
    <script src="{{url('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script>

        // Summernote
        $('.editor').summernote({
            height: 200
        });

        var i = 1000;

        $('body').delegate(".agregarMagnitud", "click", function(){
            var html = '<tr id="eliminarMagnitud'+i+'">\n\
                <td>\n\
                    <input type="text" name="" placeholder="Nombre" class="form-control">\n\
                </td>\n\
                <td>\n\
                    <input type="text" name="" placeholder="Precio" class="form-control">\n\
                </td>\n\
                <td>\n\
                    <button type="button" id="'+i+'" class="btn btn-outline-danger eliminarMagnitud">\n\
                        <i class="fa-solid fa-trash"></i>\n\
                    </button>\n\
                </td>\n\
            </tr>';
            i++;

            $('#appendMagnitud').append(html);
        });

        $('body').delegate('.eliminarMagnitud', 'click', function(){
            var id = $(this).attr('id');
            $('#eliminarMagnitud' + id).remove();
        });

        $('body').delegate('#changeCategoria', 'change', function(e) {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/get_subcategorias') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#getSubcategoria').html(data.html);
                },
                error: function(data) {}
            });
        });
    </script>
@endsection
