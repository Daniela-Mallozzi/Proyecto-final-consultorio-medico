<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SpecialtyController extends Controller
{

    public function index()
    {
        return view('specialties.index');
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de que el campo sea una imagen válida
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de 3 caracteres.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe ser mayor a 2MB.',
        ];

        $this->validate($request, $rules, $messages);

         // Guardar la imagen en el sistema de archivos utilizando Storage
         $imagePath = $request->file('image')->store('specialties');

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->slug = Str::slug($request->input('name'));
        $specialty->image = $imagePath;
        $specialty->save();

        toastr()->success('La especialidad se ha creado correctamente.');

        return to_route('specialties.index');
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {

        $rules = [
            'name' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de 3 caracteres.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe ser mayor a 2MB.',
        ];

        $this->validate($request, $rules, $messages);

        // Si se selecciona una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            Storage::delete('specialties/' . $specialty->image);
    
            // Guardar la nueva imagen
            $imagePath = $request->file('image')->store('sliders');
    
            // Actualizar la imagen en la base de datos
            $specialty->image = $imagePath;
        }

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->slug = Str::slug($request->input('name'));
        $specialty->save();

        toastr()->success('La especialidad se ha actualizado correctamente.');
        return to_route('specialties.index');
    }

    public function destroy($id)
    {
        try {
            $slider = Specialty::findOrFail($id);
            //ELIMINAR LA IMAGEN
            Storage::delete('specialties/' . $slider->slider);
            $slider->delete();
            return response(['status' => 'success', 'message' => 'La especialidad se ha eliminado correctamente.']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => '¡algo salió mal!']);
        }
    }
}
