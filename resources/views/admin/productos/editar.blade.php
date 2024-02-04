@extends('admin.layouts.app')

@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">

    <style>
        .image-container {
            position: relative;
            overflow: hidden;
        }

        .blur-image {
            filter: blur(0);
            /* Ajustar el desenfoque inicial */
            transition: filter 0.3s ease;
            /* Agregar transición para el efecto de desenfoque */
        }

        .image-container:hover .blur-image {
            filter: blur(5px);
            /* Aplicar desenfoque a la imagen cuando el cursor esté sobre ella */
        }

        .trash-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            /* Ocultar el botón por defecto */
        }

        .image-container:hover .trash-btn {
            display: inline-block;
            /* Mostrar el botón cuando el cursor esté sobre la imagen */
        }
    </style>
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
                            <form action="" method="POST" enctype="multipart/form-data">
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
                                                <select name="categoria_id" required id="changeCategoria"
                                                    class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($getCategorias as $categorias)
                                                        <option
                                                            {{ $productos->categoria_id == $categorias->id ? 'selected' : '' }}
                                                            value="{{ $categorias->id }}">
                                                            {{ $categorias->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub categoría <span style="color: red">*</span></label>
                                                <select name="subcategoria_id" required id="getSubcategoria"
                                                    class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($get_subcategorias as $subCategorias)
                                                        <option
                                                            {{ $productos->subcategoria_id == $subCategorias->id ? 'selected' : '' }}
                                                            value="{{ $subCategorias->id }}">
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
                                                        <option {{ $productos->marca_id == $marcas->id ? 'selected' : '' }}
                                                            value="{{ $marcas->id }}">{{ $marcas->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estado <span style="color: red">*</span></label>
                                                <select class="form-control" required name="estado">
                                                    <option {{ $productos->estado == 0 ? 'selected' : '' }} value="0">
                                                        Activo</option>
                                                    <option {{ $productos->estado == 1 ? 'selected' : '' }} value="1">
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
                                                            <input {{ $checked }} type="checkbox" name="color_id[]"
                                                                value="{{ $colores->id }}"> {{ $colores->nombre }}
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
                                                <label>Tamaño <span style="color: red">*</span></label>
                                                <div>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Precio (S/.)</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="appendTamano">
                                                            @php
                                                                $i_t = 1;
                                                            @endphp
                                                            @foreach ($productos->getTamano as $tamano)
                                                                <tr id="eliminarTamano{{ $i_t }}">
                                                                    <td>
                                                                        <input type="text" value="{{ $tamano->nombre }}"
                                                                            name="tamano[{{ $i_t }}][nombre]"
                                                                            placeholder="Nombre" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="{{ $tamano->precio }}"
                                                                            name="tamano[{{ $i_t }}][precio]"
                                                                            placeholder="Precio" class="form-control">
                                                                    </td>
                                                                    <td style="width: 100px">
                                                                        <button type="button" id="{{ $i_t }}"
                                                                            class="btn btn-outline-danger eliminarTamano">
                                                                            <i class="fa-solid fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $i_t++;
                                                                @endphp
                                                            @endforeach
                                                            <tr>
                                                                <td>
                                                                    <input type="text" name="tamano[100][nombre]"
                                                                        placeholder="Nombre" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="tamano[100][precio]"
                                                                        placeholder="Precio" class="form-control">
                                                                </td>
                                                                <td style="width: 100px">
                                                                    <button type="button"
                                                                        class="btn btn-outline-success agregarTamano">
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
                                                <input type="text" class="form-control"
                                                    value="{{ !empty($productos->precio) ? $productos->precio : '' }}"
                                                    required name="precio" placeholder="Precio del producto">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Precio anterior (S/.) <span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{ !empty($productos->precio_anterior) ? $productos->precio_anterior : '' }}"
                                                    required name="precio_anterior"
                                                    placeholder="Precio anterior del producto">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Imágen <span style="color: red">*</span></label>
                                                <input type="file" class="form-control" style="padding: 5px"
                                                    name="imagen[]" id="" multiple accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    @if (!empty($productos->getImagen->count()))
                                        <div class="row" id="sortable">
                                            @foreach ($productos->getImagen as $imagen)
                                                @if (!empty($imagen->getLogo()))
                                                    <div class="col-md-1 sortable_imagen" id="{{ $imagen->id }}">
                                                        <div class="image-container">
                                                            <img style="width: 100%; height: 100px;"
                                                                src="{{ $imagen->getLogo() }}" class="blur-image">
                                                            <a onclick="return confirm('Estás seguro de elimianr?')"
                                                                href="{{ url('admin/productos/eliminar_imagen/' . $imagen->id) }}"
                                                                class="btn btn-outline-danger btn-sm trash-btn">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    <hr>

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
    <script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ url('public/sortable/jquery-ui.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    var imagen_id = new Array();
                    $('.sortable_imagen').each(function() {
                        var id = $(this).attr('id');
                        imagen_id.push(id);
                    });

                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/producto_imagen_sortable') }}",
                        data: {
                            "imagen_id": imagen_id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            
                        },
                        error: function(data) {}
                    });
                }
            });
        });

        // Summernote
        $('.editor').summernote({
            height: 200
        });

        var i = 101;

        $('body').delegate(".agregarTamano", "click", function() {
            var html = '<tr id="eliminarTamano' + i + '">\n\
                                    <td>\n\
                                        <input type="text" name="tamano[' + i + '][nombre]" placeholder="Nombre" class="form-control">\n\
                                    </td>\n\
                                    <td>\n\
                                        <input type="text" name="tamano[' + i + '][precio]" placeholder="Precio" class="form-control">\n\
                                    </td>\n\
                                    <td>\n\
                                        <button type="button" id="' + i + '" class="btn btn-outline-danger eliminarTamano">\n\
                                            <i class="fa-solid fa-trash"></i>\n\
                                        </button>\n\
                                    </td>\n\
                                </tr>';
            i++;

            $('#appendTamano').append(html);
        });

        $('body').delegate('.eliminarTamano', 'click', function() {
            var id = $(this).attr('id');
            $('#eliminarTamano' + id).remove();
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

        // Si estás utilizando jQuery, puedes hacer lo siguiente para mostrar el botón al pasar el cursor sobre la imagen:
        $(document).ready(function() {
            $('.image-container').hover(function() {
                $(this).find('.trash-btn').show();
            }, function() {
                $(this).find('.trash-btn').hide();
            });
        });
    </script>
@endsection
