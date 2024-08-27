<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'pengumpulan';

    // Define the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'id_tugas', 
        'id_user', 
        'catatan', 
        'bukti', 
    ];

    // If you want to allow 'null' values in certain fields, ensure they're included in the $fillable array

    // Optionally define relationships if needed
    // For example, if Task belongs to a User:
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
