<?php

namespace Dever4eg\Classes\Mvc;

use Dever4eg\Classes\DB;

class Model
{
    static protected $table;

    public $id;

    public static function FindAll()
    {
        $db = DB::instance();

        $class = get_called_class();
        $db->SetClassName($class);

        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql);
    }

    public static function FindOneByPk($id)
    {
        $db = DB::instance();
        $db->SetClassName(get_called_class());

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $params = [':id' => $id];


        $res = $db->query($sql, $params);

        if (empty($res))
            return false;

        return $res[0];
    }

    public static function FindByColumn($column, $value)
    {
        $db = DB::instance();
        $db->SetClassName(get_called_class());

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $params = [':value' => $value];

        $res = $db->query($sql, $params);

        if (empty($res))
            return false;

        return $res[0];
    }

    public static function FindByCols($cols)
    {
        //['login' => 'test', 'password' => '123']

        $db = DB::instance();
        $db->SetClassName(get_called_class());

        $vars = [];
        $ins = [];

        foreach ($cols as $k => $v) {
            $vars[] = $k .'=:'. $k;
            $ins[':'. $k] = $v;
        }

        //($vars);
        //ldd($ins);


        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . implode(' AND ', $vars);

        //ld($sql);
        //ldd($ins);

        $res = $db->query($sql, $ins);

        if (empty($res))
            return false;
        return $res;
    }


    public function Save()
    {
        if (empty($this->id))
            $this->Insert();
        else
            $this->Update();
    }

    protected function Insert()
    {
        $vars = get_object_vars($this);     //обычные ключи
        $ins = [];                          //ключи с добавлением :

        //ld($vars);

        foreach ($vars as $key => $val) {
            if (null !== ($vars[$key])) {
                $ins[':' . $key] = $val;
            } else {
                unset($vars[$key]);
            }
        }

        $sql = '
            INSERT INTO ' . static::$table . '
            (' . implode(', ', array_keys($vars)) . ')
            VALUES
            (' . implode(', ', array_keys($ins)) . ')
        ';

        //ld($sql);
        //ld($ins);

        $db = DB::instance();
        $db->execute($sql, $ins);
        $this->id = $db->lastInsertId() + 0;
    }

    protected function Update()
    {
        $vars = get_object_vars($this);     //вернет все свойства модели

        $cols = [];                         //масив строк вида 'id=:id' для подстановки в sql
        $data = [];                         //масив параметров для pdo вида ':id'=>'9'

        foreach ($vars as $key => $val) {
            $data[':' . $key] = $val;

            if ($key == 'id')
                continue;

            $cols[] = $key . '=:' . $key;
        }

        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols) . '
            WHERE id=:id;
        ';


        $db = DB::instance();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        if (empty($this->id))
            return false;

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $params = [':id' => $this->id];

        $db = DB::instance();
        $db->execute($sql, $params);
    }
}