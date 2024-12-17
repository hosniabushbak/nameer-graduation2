<?php

namespace App\Models;

use App\Http\Resources\Admin\HouseOwnerResource;
use App\Http\Resources\Admin\BusinessOwnerResource;
use \DateTimeInterface;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use HasFactory, ModelTrait, SoftDeletes;

    public $resource;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'id_number',
        'address',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function scopeSearch($query, $request)
    {
        if (!empty($request->search['value'])) {
            $search = '%' . $request->search['value'] . '%';
            return $query->where(function($query) use ($search) {
                $query->where('name', 'LIKE', $search)
                    ->orWhere('email', 'LIKE', $search)
                    ->orWhere('phone', 'LIKE', $search)
                    ->orWhere('id_number', 'LIKE', $search);
            });
        }
        return $query;
    }

    public function house()
    {
        return $this->hasOne(House::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class);
    }

    public function scopeHouseOwners($query)
    {
        $this->resource = HouseOwnerResource::class;
        return $query->with('house')->whereHas('house');
    }

    public function scopeBusinessOwners($query)
    {
        $this->resource = BusinessOwnerResource::class;
        return $query->with('business')->whereHas('business');
    }

    public function getFullAddressAttribute()
    {
        return $this->address ?? '-';
    }

    public function getFullPhoneAttribute()
    {
        return $this->phone ?? '-';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}