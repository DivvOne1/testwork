<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['user_id', 'setting_key', 'setting_value'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
