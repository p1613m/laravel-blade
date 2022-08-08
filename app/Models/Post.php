<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'description',
        'content',
        'image_path',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * Fill post image
     * @param UploadedFile $file
     * @return void
     */
    public function fillImage(UploadedFile $file)
    {
        $imageDirectory = 'public/images';
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($imageDirectory, $imageName);

        $this->image_path = $imageDirectory . '/' . $imageName;
        $this->save();
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }
}
