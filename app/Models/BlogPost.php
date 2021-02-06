<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'publication_date', 'user_id'];

    protected $dates = ['publication_date'];

    public static function createFromData(array $data)
    {

        $validator = Validator::make($data, [
            'data' => 'required|array',
            'data.*.title' => 'required',
            'data.*.publication_date' => 'required|date',
        ]);

        if($validator->fails()) {
            return ;
        }

        foreach ($data['data'] as $post) {
            self::createAsAdmin($post);
        }
    }

    public static function createAsAdmin(array $post)
    {

        $admin = User::getSystemAdmin();

        return ($admin) ? $admin->blogs()->create($post) : null;

    }

}
