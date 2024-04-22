<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Note extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'date'];


    public function scopeOrderByDateDescending($query)
    {
        return $query->orderBy('date', 'desc');
    }

    public function scopeFilterByDate($query, $date)
    {
        return $query->whereDate('date', $date);
    }

    public function scopeFilterByKeyword($query, $keyword)
    {
        return $query->where('titre', 'like', '%' . $keyword . '%')
            ->orWhere('contenu', 'like', '%' . $keyword . '%');
    }
}
