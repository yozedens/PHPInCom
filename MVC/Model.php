<?php

class Model
{
    public static function getData()
    {
        $data = [
            ['id'=>101,'name'=>'Peter','age'=>28,'salary'=>3000],
            ['id'=>102,'name'=>'Jack','age'=>27,'salary'=>5000],
            ['id'=>103,'name'=>'Tom','age'=>24,'salary'=>4000],
            ['id'=>104,'name'=>'Bill','age'=>21,'salary'=>3200]
        ];

        return $data;
    }
}