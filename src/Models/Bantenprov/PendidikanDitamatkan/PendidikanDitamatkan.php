<?php

namespace Bantenprov\PendidikanDitamatkan\Models\Bantenprov\PendidikanDitamatkan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanDitamatkan extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'pendidikan_ditamatkans';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
