<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    // phone relation name
    // 一對一 單數 phone
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }

    // hobbies relation name
    // 一對多 複數 hobbies
    public function hobbies(): HasMany
    {
        return $this->hasMany(Hobby::class);
    }
}
