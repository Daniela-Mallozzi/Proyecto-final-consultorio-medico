<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cedula',
        'address',
        'phone',
        'role',
        'slug',
        'picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function specialties(){
        return $this->belongsToMany(Specialty::class)->withTimestamps();
    }

    public function scopePatients($query){
        return $query->where('role', 'paciente');
    }
    public function scopeDoctors($query){
        return $query->where('role', 'doctor');
    }

    public function asDoctorAppointments(){
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
    
    public function confirmAppointments(){
        return $this->asDoctorAppointments()->where('status', 'Confirmada');
    }

    public function attendedAppointments(){
        return $this->asDoctorAppointments()->where('status', 'Atendida');
    }
    public function cancellAppointments(){
        return $this->asDoctorAppointments()->where('status', 'Cancelada');
    }

    public function asPatientAppointments(){
        return $this->hasMany(Appointment::class, 'patient_id');
    }
}
