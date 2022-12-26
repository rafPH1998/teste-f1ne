<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }

    public function format_phone(string $phone): string 
    {
        $ac = substr($phone, 0, 2);
        $prefix = substr($phone, 3, 4);
        $suffix = substr($phone, 6);
    
        return "({$ac}) {$prefix}-{$suffix}";
    }

    protected function telephone(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $this->format_phone($value) : 'Nenhum telefone cadastrado',
        );
    }

    protected function cellphone(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $this->format_phone($value) : 'Nenhum telefone cadastrado',
        );
    }

    

}
