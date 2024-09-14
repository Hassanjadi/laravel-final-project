<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    
    protected $table = 'borrows';

    protected $fillable = ['tanggal_peminjaman', 'tanggal_pengembalian', 'user_id', 'book_id'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
