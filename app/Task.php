<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['title', 'user_id'];
    
    public static function store($title, $user){
        return Task::create([
            "title" => $title,
            "user_id" => $user
        ]);
    }

    public static function updateTask($title , $id, $user){
        return Task::where('id', $id)->update([
            "title" => $title,
            "user_id" => $user
        ]);
    }

}
