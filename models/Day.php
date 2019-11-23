<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2019-11-24
 * Time: 00:45
 */

namespace app\models;


class Day
{
public $workingDay;

    /**
     * @return mixed
     */
    public function getWorkingDay()
    {
        return $this->workingDay;
    }
}