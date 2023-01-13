<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FileController extends Controller
{
    public static function upload($file, $path)
    {
        $fileName = '';

        if (!is_null($file)) {
            // Buat nama gambar
            $fileName = time() . ' ' . $file->getClientOriginalName();
            $fileName = self::stringClean($fileName);

            // Move gambar ke public
            $file->move($path, $fileName);
        }

        return $fileName;
    }

    public static function stringClean($string)
    {
        $string = strtolower(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.
    }
}
