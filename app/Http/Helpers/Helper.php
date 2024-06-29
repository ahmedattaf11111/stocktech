<?php

use App\Models\Dictionary;

function insertDictionary($data)
{
    $lang = app()->getLocale();
    foreach ($data as $element) {

        if ($element['value']) {
            $element['lang'] = $lang;
            if ($element['class']) {
                $dic = Dictionary::where("key", $element['key'])
                    ->where("lang", $lang)
                    ->where("class", $element['class'])
                    ->where("model_id", $element['model_id'])
                    ->first();
                if ($dic) {
                    $dic->value = $element["value"];
                    $dic->save();
                } else {
                    Dictionary::create($element);
                }
            } else {
                $dic = Dictionary::where("key", $element['key'])
                    ->where("lang", $lang)
                    ->first();
                if ($dic) {
                    $dic->value = $element["value"];
                    $dic->save();
                } else {
                    Dictionary::create($element);
                }
            }
        }
    }
}
function translate($dictionaries, $key, $def = null, $class = null, $model_id = null)
{
    $lang = app()->getLocale();
    $dic = null;
    if ($class) {
        $dic = $dictionaries->filter(function ($dic) use ($key, $lang, $class, $model_id) {
            return $dic->key == $key && $dic->lang == $lang && $dic->class == $class && $dic->model_id == $model_id;
        })->first();
    } else {
        $dic = $dictionaries->filter(function ($dic) use ($key, $lang) {
            return $dic->key == $key && $dic->lang == $lang;
        })->first();
    }
    return $dic ? $dic->value : $def;
}
function getDir($langs)
{
    $lang = $langs->filter(function ($lang) {
        return $lang->key == app()->getLocale();
    })->first();
    return $lang->is_rtl?"rtl":"ltr";
}
