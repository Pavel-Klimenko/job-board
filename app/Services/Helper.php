<?php

namespace App\Services;

use App\Models\JobCategories;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use App\Constants;

class Helper
{
    /**Удобный var_dump
     *
     * @param $data
     */
    public function vardump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    public static function getRoleIdByName($roleName)
    {
        $role = Roles::where('name', $roleName)->firstOrFail();
        return $role->id;
    }

    public static function getTableRow($modelObject, $column, $value)
    {
        return $modelObject::where($column, $value)->firstOrFail();
    }


    public static function countTableRow($modelObject, $column, $value)
    {
        return $modelObject::where($column, $value)->count();
    }


    /**Check is current user is a company
     *
     * @return bool
     *
     */
    public static function isCompany()
    {
        if (Auth::check()) {
            $currentRole = Auth::user()->role_id;
            $roleName = Constants::USER_ROLE_NAMES['company'];
            $companyRole = self::getRoleIdByName($roleName);
            return ($currentRole == $companyRole) ? true : false;
        } else {
            return false;
        }
    }

    /**Check is current user is a candidate
     *
     * @return bool
     *
     */
    public static function isCandidate()
    {
        if (Auth::check()) {
            $currentRole = Auth::user()->role_id;
            $roleName = Constants::USER_ROLE_NAMES['candidate'];
            $candidateRole = self::getRoleIdByName($roleName);
            return ($currentRole == $candidateRole) ? true : false;
        } else {
            return false;
        }
    }

    /**Convert text point (each on a new line) to json list
     *
     * @param $TEXT_POINTS
     * @return false|string
     */
    public static function convertTextPointsToJson($TEXT_POINTS)
    {
        $listOfPoints = str_replace(" ", "", $TEXT_POINTS);
        $arrListOfPoints = explode(PHP_EOL, $listOfPoints);
        return json_encode($arrListOfPoints);
    }


    public static function isFilterSet() {
        $arrFilter = $_GET;
        $arrNotFilterParams = ['page'];

        foreach ($arrNotFilterParams as $param) {
            if (array_key_exists($param, $arrFilter)) unset($arrFilter[$param]);
        }

        return (!empty($arrFilter)) ? true : false;
    }


    public static function delEmptyArrKeys($oldArray) {
        $newArray = array_filter($oldArray, function($element) {
            return !empty($element);
        });

        return $newArray;
    }

    public static function getExtension($filename) {
        $fileExtension =  explode( '.', $filename);
        return array_pop($fileExtension);
    }


}
