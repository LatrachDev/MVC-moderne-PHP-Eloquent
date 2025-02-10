<?php

    namespace App\Core;

    class Model
    {
        protected static $table;
        public static function all()
        {
            return \Illuminate\Database\Capsule\Manager::table(static::$table)->get();
        }

        public static function find($id)
        {
            return \Illuminate\Database\Capsule\Manager::table(static::$table)->where('id', $id)->first();
        }
    }