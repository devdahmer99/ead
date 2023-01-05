<?php

namespace App\Models;

use App\Models\Support;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method where(string $string, string $moduleId)
 * @method findOrFail(string $identify)
 */
class Lesson extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['name', 'description', 'video'];

    public function supports()
    {
        return $this->hasMany(Support::class);
    }

    public function view()
    {
        return $this->hasMany(View::class)
                    ->where(function ($query) {
                        if(auth()->check()) {
                            return $query->where('user_id', auth()->user()->id);
                        }
                    });
    }

}
