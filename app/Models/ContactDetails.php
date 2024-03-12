<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactDetails extends Model
{
    use HasFactory;
    protected $table = 'contact_details';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'value',
        'contact_id',
        'category_id',
    ];
    public function contact(): BelongsTo {
        return $this->belongsTo(Contact::class);
    }
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
