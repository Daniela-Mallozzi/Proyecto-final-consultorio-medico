<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de que el campo sea una imagen válida
        ];

        $messages = [
            'title.required' => 'El título es requerido.',
            'subtitle.required' => 'El subtítulo es requerido.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe ser mayor a 2MB.',
        ];

        $this->validate($request, $rules, $messages);

        // Guardar la imagen en el sistema de archivos utilizando Storage
        $imagePath = $request->file('image')->store('sliders');

        // Crear y guardar el Slider en la base de datos
        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->url = $request->input('url');
        $slider->image = $imagePath; // Guarda el nombre de la imagen en la base de datos
        $slider->save();

        toastr()->success('El slider se ha creado correctamente.');

        return to_route('sliders.index');
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {

        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ahora la imagen es opcional
        ];
    
        $messages = [
            'title.required' => 'El título es requerido.',
            'subtitle.required' => 'El subtítulo es requerido.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe ser mayor a 2MB.',
        ];
    
        $this->validate($request, $rules, $messages);
    
        // Si se selecciona una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            Storage::delete('sliders/' . $slider->image);
    
            // Guardar la nueva imagen
            $imagePath = $request->file('image')->store('sliders');
    
            // Actualizar la imagen en la base de datos
            $slider->image = $imagePath;
        }
    
        // Actualizar otros campos del slider
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->save();

        toastr()->success('El slider se ha actualizado correctamente.');

        return to_route('sliders.index');
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            //ELIMINAR LA IMAGEN
            Storage::delete('sliders/' . $slider->slider);
            $slider->delete();
            return response(['status' => 'success', 'message' => 'El slider se ha eliminado correctamente.']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => '¡algo salió mal!']);
        }
    }
}
