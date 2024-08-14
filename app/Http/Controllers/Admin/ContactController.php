<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $contact = Contact::first();
        return view('contacts.show', compact('contact'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'cedula' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener máximo 255 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ]);

        $contact = Contact::findOrFail($id);
        $data = $request->only('name','email','cedula','address','phone', 'message', 'facebook', 'youtube', 'twitter', 'github', 'pinterest');
        $contact->fill($data);
        $contact->save();

        toastr()->success('Medios actualizados');

        return to_route('contact.show');
    }
}
