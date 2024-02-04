<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaModel;
use App\Models\ColorModel;
use App\Models\MarcaModel;
use App\Models\ProductoColorModel;
use App\Models\ProductoImagenModel;
use App\Models\ProductoModel;
use App\Models\ProductoTamanoModel;
use App\Models\SubCategoriaModel;
use Illuminate\Http\Request;

use Str;
use Auth;

class ProductoController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = ProductoModel::getRecord();
        $data['header_title'] = 'Productos';
        return view('admin.productos.list', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar productos';
        return view('admin.productos.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $titulo = trim($request->titulo);
        $productos = new ProductoModel();
        $productos->titulo = $titulo;
        $productos->creado_por = Auth::user()->id;
        $productos->save();

        $slug = Str::slug($titulo, '-');
        $checkSlug = ProductoModel::checkSlug($slug);
        if (empty($checkSlug)) {
            $productos->slug = $slug;
            $productos->save();
        } else {
            $nuevo_slug = $slug . '-' . $productos->id;
            $productos->slug = $nuevo_slug;
            $productos->save();
        }

        return redirect('admin/productos/editar/' . $productos->id);
    }

    public function editar($producto_id)
    {
        $productos = ProductoModel::getSingle($producto_id);
        if (!empty($productos)) {
            $data['getCategorias'] = CategoriaModel::getRecordActive();
            $data['getMarcas'] = MarcaModel::getRecordActive();
            $data['getColores'] = ColorModel::getRecordActive();
            $data['productos'] = $productos;

            $data['get_subcategorias'] = SubCategoriaModel::getRecordSubCategoria($productos->categoria_id);

            $data['header_title'] = 'Editar productos';
            return view('admin.productos.editar', $data);
        }
    }

    public function actualizar($producto_id, Request $request)
    {
        $productos = ProductoModel::getSingle($producto_id);
        if (!empty($productos)) {
            $productos->titulo = trim($request->titulo);
            $productos->sku = trim($request->sku);
            $productos->categoria_id = trim($request->categoria_id);
            $productos->subcategoria_id = trim($request->subcategoria_id);
            $productos->marca_id = trim($request->marca_id);
            $productos->precio = trim($request->precio);
            $productos->precio_anterior = trim($request->precio_anterior);
            $productos->descripcion_corta = trim($request->descripcion_corta);
            $productos->descripcion = trim($request->descripcion);
            $productos->informacion_adicional = trim($request->informacion_adicional);
            $productos->envios_devoluciones = trim($request->envios_devoluciones);
            $productos->estado = trim($request->estado);
            $productos->save();

            ProductoColorModel::deleteRecord($productos->id);

            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color_id) {
                    $color = new ProductoColorModel;
                    $color->color_id = $color_id;
                    $color->producto_id = $productos->id;
                    $color->save();
                }
            }

            ProductoTamanoModel::deleteRecord($productos->id);

            if (!empty($request->tamano)) {
                foreach ($request->tamano as $tamano) {
                    if (!empty($tamano['nombre'])) {
                        $guardarTamano = new ProductoTamanoModel;
                        $guardarTamano->nombre = $tamano['nombre'];
                        $guardarTamano->precio = !empty($tamano['precio']) ? $tamano['precio'] : 0;
                        $guardarTamano->producto_id = $productos->id;
                        $guardarTamano->save();
                    }
                }
            }

            if ($request->file('imagen')) {
                foreach ($request->file('imagen') as $valor) {
                    if ($valor->isValid()) {
                        $ext = $valor->getClientOriginalExtension();
                        $randomStr = $productos->id . Str::random(20);
                        $filename = strtolower($randomStr) . '.' . $ext;
                        $valor->move('upload/productos/', $filename);

                        $imagenupload = new ProductoImagenModel;
                        $imagenupload->nombre_imagen = $filename;
                        $imagenupload->imagen_extension = $ext;
                        $imagenupload->producto_id = $productos->id;
                        $imagenupload->save();
                    }
                }
            }

            return redirect()->back()->with("success", "Producto editado exitosamente");
        } else {
            abort(404);
        }
    }

    public function eliminar_imagen($id)
    {
        $imagen = ProductoImagenModel::getSingle($id);
        if (!empty($imagen->getLogo())) {
            unlink('upload/productos/' . $imagen->nombre_imagen);
        }

        $imagen->delete();

        return redirect()->back()->with("success", "Imágen del producto eliminado exitosamente");
    }

    public function producto_imagen_sortable(Request $request)
    {
        if (!empty($request->imagen_id)) {
            $i = 1;
            foreach ($request->imagen_id as $imagen_id) {
                $imagen = ProductoImagenModel::getSingle($imagen_id);
                $imagen->ordenar_por = $i;
                $imagen->save();

                $i++;
            }
        }

        $json['success'] = true;
        echo json_encode($json);
    }
}
