<?php

class View
{
    public static function display($data)
    {
        $table = '<h3 align="center">用户信息表</h3>';
        $table .= '<table border="1" cellspacing="0" width="50%" align="center">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>age</th>
                        <th>salary</th>
                    </tr>';
        foreach ($data as $key => $value) {
            $table .='<tr>';
            $table .='<td>'.$value['id'].'</td>';
            $table .='<td>'.$value['name'].'</td>';
            $table .='<td>'.$value['age'].'</td>';
            $table .='<td>'.$value['salary'].'</td>';
            $table .='</tr>';
        }
        return $table;
    }
}