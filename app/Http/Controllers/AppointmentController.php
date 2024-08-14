<?php

namespace App\Http\Controllers;

use App\Interfaces\HorarioServiceInterface;
use App\Mail\ResponseMailable;
use App\Models\Appointment;
use App\Models\CancelledAppointment;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{

    public function index(){
        return view('appointments.index');
    }

    public function pendient(){
        return view('appointments.pendient');
    }

    public function historial(){
        return view('appointments.historial');
    }

    public function create(HorarioServiceInterface $horarioServiceInterface) {
        $specialties = Specialty::all();

        $specialtyId = old('specialty_id');
        if ($specialtyId) {
            $specialty = Specialty::find($specialtyId);
            $doctors = $specialty->users;
        } else {
            $doctors = collect();
        }

        $date = old('scheduled_date');
        $doctorId = old('doctor_id');
        if ($date && $doctorId) {
            $intervals = $horarioServiceInterface->getAvailableIntervals($date, $doctorId);
        }else {
            $intervals = null;
        }

        return view('appointments.create', compact('specialties', 'doctors', 'intervals'));
    }

    public function store(Request $request, HorarioServiceInterface $horarioServiceInterface) {

        $rules = [
            'scheduled_time' => 'required',
            'type' => 'required',
            'description' => 'required',
            'doctor_id' => 'exists:users,id',
            'specialty_id' => 'exists:specialties,id'
        ];

        $messages = [
            'scheduled_time.required' => 'Olvidaste seleccionar una hora para tu cita.',
            'type.required' => 'Olvidaste seleccionar el tipo de consulta.',
            'description.required' => 'Explícanos un poco de contexto.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) use ($request, $horarioServiceInterface) {

            $date = $request->input('scheduled_date');
            $doctorId = $request->input('doctor_id');
            $scheduled_time = $request->input('scheduled_time');
            if ($date && $doctorId && $scheduled_time) {
                $start = new Carbon($scheduled_time);
            }else {
                return;
            }

            if (!$horarioServiceInterface->isAvailableInterval($date, $doctorId, $start)) {
                $validator->errors()->add(
                    'available_time', 'La hora seleccionada ya se encuentra reservada por otro paciente.'
                );
            }
        });

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->only([
            'scheduled_date',
            'scheduled_time',
            'type',
            'description',
            'doctor_id',
            'specialty_id'
        ]);
        $data['patient_id'] = auth()->id();
        
        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);

        toastr()->success('La cita se ha realizado correctamente.');
        return to_route('miscitas.index');
    }

    public function cancel(Appointment $appointment, Request $request) {

        if($request->has('justification')){
            $cancellation = new CancelledAppointment();
            $cancellation->justification = $request->input('justification');
            $cancellation->cancelled_by_id = auth()->id();

            $appointment->cancellation()->save($cancellation);
        }

        $appointment->status = 'Cancelada';
        $appointment->save();

        $patient_email = $appointment->patient->email;

        $data = [
            'name' => $appointment->doctor->name,
            'email' => $appointment->doctor->email,
            'phone' => $appointment->doctor->phone,
            'type' => 'danger',
            'title' => 'Tu cita ha sido cancelado',
            'msg' => $request->input('justification'),
        ];

        Mail::to($patient_email)->send(new ResponseMailable($data));

        toastr()->success('Cita cancelada Correctamente');

        return to_route('miscitas.index');
    }

    public function confirm(Appointment $appointment) {

        $appointment->status = 'Confirmada';
        $appointment->save();
        
        $patient_email = $appointment->patient->email;

        $data = [
            'name' => $appointment->doctor->name,
            'email' => $appointment->doctor->email,
            'phone' => $appointment->doctor->phone,
            'type' => 'success',
            'title' => 'Tu cita ha sido aceptada',
        ];

        Mail::to($patient_email)->send(new ResponseMailable($data));

        toastr()->success('Cita confirmada!');

        return to_route('miscitas.index');
    }

    public function formCancel(Appointment $appointment) {
        if($appointment->status == 'Confirmada' || 'Reservada'){
            $role = auth()->user()->role;
            return view('appointments.cancel', compact('appointment', 'role'));
        }
        return to_route('miscitas.index');
        
    }

    public function show(Appointment $appointment){
        $role = auth()->user()->role;
        return view('appointments.show', compact('appointment', 'role'));
    }

    public function atender(Appointment $appointment) {

        $appointment->status = 'Atendida';
        $appointment->save();
        
        $patient_email = $appointment->patient->email;

        $data = [
            'name' => $appointment->doctor->name,
            'email' => $appointment->doctor->email,
            'phone' => $appointment->doctor->phone,
            'type' => 'success',
            'title' => 'Cita Atendida',
        ];

        Mail::to($patient_email)->send(new ResponseMailable($data));

        toastr()->success('Cita atendida');

        return to_route('miscitas.index');
    }
}
