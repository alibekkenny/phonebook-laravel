<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
    ];
    public function contact_details(): HasMany {
        return $this->hasMany(ContactDetails::class);
    }
}
