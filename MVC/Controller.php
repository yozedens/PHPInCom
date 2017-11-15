<?php

class Controller
{
    public static function show()
    {
        $data = Model::getData();
        echo View::display($data);
    }
}