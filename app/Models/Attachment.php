<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'user_id',
        'link',
    ];

    public function readableName()
    {
        $parts = explode('|', $this->link);
        $filename = $parts[2];
        $filenameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
        $name =  str_replace('_', ' ', $filenameWithoutExt);

        return __($name);
    }
}
