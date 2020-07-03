<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportingDocument extends Model
{
    use SoftDeletes;

    protected $table = 'supporting_document';
    protected $primaryKey = 'supporting_document_id';

    protected $dates = [
        'supporting_document_upload_date'
    ];

    protected $fillable = [
        'project_id',
        'supporting_document_name',
        'supporting_document_path',
        'supporting_document_upload_date',
    ];
}
