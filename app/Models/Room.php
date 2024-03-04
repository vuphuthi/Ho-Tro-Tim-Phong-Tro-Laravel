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

    const STATUS_DEFAULT = 1; // khởi tạo
    const STATUS_PAID = 2; // đã thanh toán
    const STATUS_EXPIRED = -2; // hết hạn
    const STATUS_ACTIVE = 3; // đã duyệt
    const STATUS_CANCEL = -1; // huỷ bỏ


    protected $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'class' => 'text-black-50'
        ],
        self::STATUS_EXPIRED => [
            'name' => 'Hết hạn',
            'class' => 'text-danger'
        ],
        self::STATUS_PAID => [
            'name' => 'Đã thanh toán',
            'class' => 'text-info'
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
    public function district()
    {
        return $this->belongsTo(Location::class,'district_id');
    }
    public function wards()
    {
        return $this->belongsTo(Location::class,'wards_id');
    }

    public function paymentHistory(){
        return $this->hasMany(PaymentHistory::class,'room_id');
    }

    public function roomOptionItem()
    {
        return $this->belongsToMany(OptionItems::class, RoomOptionItem::class, 'room_id', 'option_item_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
