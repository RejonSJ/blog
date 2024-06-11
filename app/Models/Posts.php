<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Posts extends Model
{
    protected $table = 'posts';
    
    static $rules = [
    ];

    protected $fillable = [
        'id',
        'idUser',
        'title',
        'text',
        'image'
    ];
}

?>