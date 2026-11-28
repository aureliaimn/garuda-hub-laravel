<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['client_id', 'title', 'description', 'category', 'budget_min', 'budget_max', 'deadline', 'status'])]
class Project extends Model
{
    protected function casts(): array
    {
        return ['deadline' => 'date'];
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function isOpen(): bool
    {
        return $this->status === 'open' && $this->deadline->gte(today());
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open')->whereDate('deadline', '>=', today());
    }
}