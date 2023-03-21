<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPlaceController extends Controller
{
    public function page(): string
    {
        return 'This is my page!';
    }

    public function hobby(): string
    {
        return 'I like read books';
    }

    public function anotherHobby(): string
    {
        return 'I also like play videogames';
    }

    public function pet(): string
    {
        return 'I have dog, her name is Juja';
    }

    public function parent(): string
    {
        return 'I have mother. Her name is Hanna';
    }

    public function partner(): string
    {
        return 'I have a boyfriend. His name is Aleksandr';
    }

    public function city(): string
    {
        return 'I live in Minsk, Republic of Belarus';
    }

    public function languages(): string
    {
        return 'I know English on Intermidiate level and Sweden on Start level';
    }
}
