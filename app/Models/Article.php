<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
	use HasDateTimeFormatter;

	protected $fillable = ['content','title',];

	public function category()
    {
        return $this->belongsTo(Category::class);
	}
	
	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
