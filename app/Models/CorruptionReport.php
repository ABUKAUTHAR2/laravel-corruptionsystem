<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorruptionReport extends Model
{
    use HasFactory;

    protected $table = 'corruption_reports'; // Name of your database table

    protected $fillable = [
        'name',
        'email',
        'region',
        'organization',
        'incident',
        'file_paths', // Assuming you have a column to store file paths
    ];
}
