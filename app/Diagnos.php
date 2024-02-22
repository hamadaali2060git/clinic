<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Diagnos extends Model
{
    protected $table = 'diagnosis';
    public function categories() {
        return $this->belongsTo(Category::class,"category_id","id")->selection();

    }
}
