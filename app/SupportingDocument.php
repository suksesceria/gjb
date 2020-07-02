<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportingDocument extends Model
{
    use SoftDeletes;

    protected $table = 'supporting_document';
    protected $primaryKey = 'supporting_document_id';
}
