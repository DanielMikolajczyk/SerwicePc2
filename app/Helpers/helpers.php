<?php

if(!function_exists('string_array_to_dot')){
  function string_array_to_dot(string $string){
    if(!Str::contains($string,'[')){
      return $string;
    }
    $string = Str::remove(']',$string);
    return Str::replace('[','.',$string);
  }
}

if(!function_exists('dot_to_string_array')){
  function dot_to_string_array(string $string){
    if(!Str::contains($string,'.')){
      return $string;
    }
    $string = Str::replace('.','][',$string);
    $string = Str::replaceFirst(']','',$string);
    return Str::finish($string, ']');
  }
}

if(!function_exists('array_key_contains')){
  function array_key_contains(string $string, array $array){
    foreach($array as $key => $value){
      if(Str::contains($key, $string)) return true;
    }
    return false;
  }
}