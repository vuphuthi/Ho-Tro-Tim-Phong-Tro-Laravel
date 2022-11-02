<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $guarded = [''];

    const STATUS_DEFAULT = 1;
    const STATUS_EXPIRED = 2;
    const STATUS_ACTIVE = 3;
    const STATUS_CANCEL = -1;

    protected $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'class' => 'text-black-50'
        ],
        self::STATUS_EXPIRED => [
            'name' => 'Hết hạn',
            'class' => 'text-danger'
        ],
        self::STATUS_ACTIVE => [
            'name' => 'Hiển thị',
            'class' => 'text-success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Đã huỷ',
            'class' => 'text-danger'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->setStatus,$this->status,[]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function city()
    {
        return $this->belongsTo(Location::class,'city_id');
    }
}
