<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    
    public function index()
    {
        return view('doctors.index');
    }

    
    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role' => 'doctor',
                'slug' => Str::slug($request->input('name')),
                'password' => bcrypt($request->input('password'))
            ]
        );
        $user->specialties()->attach($request->input('specialties'));

        toastr()->success('El médico se ha registrado correctamente.');

        return to_route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $doctor = User::doctors()->findOrFail($id);
        
        $specialties = Specialty::all();
        $specialty_ids = $doctor->specialties()->pluck('specialties.id');

        return view('doctors.edit', compact('doctor', 'specialties', 'specialty_ids'));
    }

    
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatorio',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::doctors()->findOrFail($id);

        $data = $request->only('name','email','cedula','address','phone');
        $data['slug'] = Str::slug($request->input('name'));
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        $user->specialties()->sync($request->input('specialties'));

        toastr()->success('La información del médico se actualizo correctamente.');

        return to_route('medicos.index');
    }

    
    public function destroy($id)
    {
        try {
            User::doctors()->findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Se ha eliminado correctamente.']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => '¡Algo salió mal!']);
        }
    }
}
