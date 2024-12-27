<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'code', 'method'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
