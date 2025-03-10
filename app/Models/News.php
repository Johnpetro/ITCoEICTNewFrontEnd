<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\eloquent\factory;
use Illuminate\Database\eloquent\model;
//use Illuminate\Notifications\Notifiable;



class News extends Model {
   // use HasApiTokens, HasFactory, Notifiable;

   
    use HasFactory; 
    protected $table ='news';
    protected $fillable =['title','message','date_posted','image','document'];


}