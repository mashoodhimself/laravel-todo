<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });

        $query->when($filters['date'] ?? false, function($query, $date) {
            $query->where( 'published_at', '<=', $date );
        });

        $query->when($filters['progress'] ?? false, function($query, $progress) {
            $query->where('status', 0);
        });

        $query->when($filters['completed'] ?? false, function($query, $completed) {
            $query->where('status', 1);
        });

        $query->when($filters['trashed'] ?? false, function($query, $trashed) {
            $query->where('status', 2);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
