<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Replies extends Model
{
    protected $table = 'replies';
    
    static $rules = [
    ];

    protected $fillable = [
        'id',
        'idUser',
        'idPost',
        'text'
    ];
}

?>