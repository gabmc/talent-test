<?php

interface Db
{
    public static function insert($table, $data);
    public static function select($table, $filter);
}

class JsonDb implements Db
{
  /**
   * Inserts information into the database, in this case, a JSON file
   *
   * @param string $table the name of the json file
   * @param string $data the data to be inserted in the json file
   *
   */
    public static function insert($table, $data)
    {
        $savedData = file_get_contents(__DIR__ . "/data/{$table}.json");
        $savedData = json_decode($savedData);
        if (is_null($savedData)) {
            file_put_contents(__DIR__ . "/data/{$table}.json", json_encode(array($data)));
        } else {
            array_push($savedData, $data);
            file_put_contents(__DIR__ . "/data/{$table}.json", json_encode($savedData));
        }
    }

  /**
   * Retrieves information from the database, in this case, a JSON file
   *
   * @param string $table the name of the json file
   * @param string $filter the different filters to apply and get the information needed
   *
   * @return array objects found in the file
   */
    public static function select($table, $filter)
    {
        $output = array();
        $count = 0;
        $savedData = file_get_contents(__DIR__ . "/data/{$table}.json");
        if (strlen($savedData) === 0) {
            return $output;
        }
        $savedData = json_decode($savedData);
        foreach ($filter as $key => $val) {
            $count++;
        }
        if ($count === 0) {
            return $savedData;
        }
        foreach ($savedData as $data) {
            $count2 = 0;
            foreach ($data as $key => $val) {
                if ($filter[$key] === $val) {
                    $count2++;
                }
            }
            if ($count2 === $count) {
                array_push($output, $data);
            }
        }
        return $output;
    }

  /**
   * Retrieves information from the database, in this case, a JSON file that contains
   * a certain keyword
   *
   * @param string $table the name of the json file
   * @param string $filter the different filters to apply and get the information needed
   *
   * @return array objects found in the file
   */
    public static function selectContains($table, $filter)
    {
        $output = array();
        $count = 0;
        $savedData = file_get_contents(__DIR__ . "/data/{$table}.json");
        if (strlen($savedData) === 0) {
            return $output;
        }
        $savedData = json_decode($savedData);
        foreach ($filter as $key => $val) {
            $count++;
        }
        if ($count === 0) {
            return $savedData;
        }
        foreach ($savedData as $data) {
            foreach ($data as $key => $val) {
                if (strpos($val, $filter[$key]) !== false) {
                    array_push($output, $data);
                }
            }
        }
        return $output;
    }
}
