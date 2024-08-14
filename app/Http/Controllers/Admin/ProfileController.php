<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->id());;
        return view('users.profile', compact('user'));
    }

    public function update(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'address' => 'nullable|min:6',
            'phone' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $messages = [
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no debe ser mayor a 2MB.',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::findOrFail(auth()->id());;
        $imagePath = $user['picture'];
        // Si se selecciona una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            Storage::delete('users/' . $user->image);

            // Guardar la nueva imagen
            $imagePath = $request->file('image')->store('users');
        }

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');
        $data['picture'] = $imagePath;
        $user->fill($data);
        $user->save();

        //toastr()->success('Usuario actualizado correctamente.');
        toastr("okay",'success',["slideDown"]);

        return to_route('profile.index');
    }

    public function updatePass(Request $request)
    {
        // Validar los datos del formulario
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed', // La contraseña debe ser de al menos 8 caracteres y coincidir con la confirmación
        ]);

        // Obtener el usuario actual
        $user = auth()->user();

        // Actualizar la contraseña del usuario
        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->success('Contraseña actualizada correctamente.');

        // Redirigir a la página de perfil con un mensaje de éxito
        return to_route('profile.index');
    }
}