<?php
namespace App\Traits;


trait Trans
{
    public function getTransNameAttribute()
    {
        if($this->name){
          return  json_decode($this->name,true) [app()->currentLocale()];

        }else {
            return $this->name;
        }
    }

    public function getNameEnAttribute()
    {
        if($this->name){
          return json_decode($this->name,true)  ['en'];

        }else {
            return $this->name;
        }
    }

    public function getNameArAttribute()
    {
        if($this->name){
            return json_decode($this->name,true)  ['ar'];

        }else {
            return $this->name;
        }
    }


    public function getTransContentAttribute()
    {
        if($this->content){
          return   $this->content [app()->currentLocale()];

        }else {
            return $this->content;
        }
    }

    public function getContentEnAttribute()
    {
        if($this->content){
            return json_decode($this->content,true)  ['en'];

        }else {
            return $this->content;
        }
    }

    public function getContentArAttribute()
    {
        if($this->content){
            return json_decode($this->content,true)  ['ar'];

        }else {
            return $this->content;
        }
    }
}

