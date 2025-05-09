<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sanpham extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function danhmuc()
{
    return $this->belongsTo(Danhmuc::class, 'id_danhmuc');
}

}
