<?php

interface Db {
    public static function insert($table, $data);
    public static function select($table, $filter);
}

class jsonDb implements Db {
    public static function insert($table, $data) {
        $savedData = file_get_contents(__DIR__."/data/{$table}.json");
        $savedData = json_decode($savedData);
        if (is_null($savedData)) {
            file_put_contents(__DIR__."/data/{$table}.json",json_encode(array($data)));
        }
        else {
            array_push($savedData, $data);
            file_put_contents(__DIR__."/data/{$table}.json",json_encode($savedData));
        }
    }

    public static function select($table, $filter) {
        $savedData = file_get_contents(__DIR__."/data/{$table}.json");
        $savedData = json_decode($savedData);
        // var_dump($savedData[1]->username);
        foreach($savedData as $key => $val) {
            foreach($val as $key2 => $val2) {
                if ($filter[$key2] === $val2) {
                    return $savedData[$key];
                }
            }
        }
        return $savedData;

    }

    public static function selectAll($table, $filter) {
        $savedData = file_get_contents(__DIR__."/data/{$table}.json");
        $savedData = json_decode($savedData);
        // var_dump($savedData[1]->username);
        foreach($savedData as $key => $val) {
            foreach($val as $key2 => $val2) {
                if ($filter[$key2] === $val2) {
                    return $savedData[$key];
                }
            }
        }
        return $savedData;

    }
}

?>