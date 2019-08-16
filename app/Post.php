<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
												

class Post extends Model
{
//
//protected $table = 'posts'; //To select the name of the table
//protected $primaryKey = 'post_id'; //if primary key is not id, must specify
//converts lower and plural, for database I have so "posts"
use SoftDeletes;

protected $dates = ['deleted_at'];

protected $fillable = [
'title',
'body',
'is_admin'
];

}
