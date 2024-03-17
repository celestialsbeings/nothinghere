<?php


function limpiar($string) {
$texto = preg_replace("/\r|\n/", " ", $string);
    $str1 = preg_replace('/\s+/', ' ', $texto);
    $str = preg_replace("/[^0-9]/", " ", $str1);
    $string = trim($str, " ");
    $lista = preg_replace('/\s+/', '', $string);
    $lista = str_replace('x', '', $lista); // Elimina las letras 'x'
    return $lista;
}

function limpiar2($string) {
$texto = preg_replace("/\r|\n/", "", $string);
    $str1 = preg_replace('/\s+/', ' ', $texto);
    $str = preg_replace("/[^0-9x]/", "", $str1);
    $string = trim($str, " ");
    $lista = preg_replace('/\s+/', '', $string);
    $lista = str_replace('x', '', $lista); // Elimina las letras 'x'
    return $lista;
}

function limpiar1($string) {
$str = preg_replace("/[^0-9]/", " ", $string);
  return $str;
}


function luhn_verification($num) {
  $num = strval($num);
  $num = array_map('intval', str_split($num));
  $check_digit = array_pop($num);
  $num = array_reverse($num);
  $total = 0;
  foreach ($num as $i => $digit) {
      if ($i % 2 == 0) {
          $digit = $digit * 2;
      }
      if ($digit > 9) {
          $digit = $digit - 9;
      }
      $total += $digit;
  }
  $total = $total * 9;
  return ($total % 10) == $check_digit;
}

function cc_gen($cc, $mes='x', $ano='x', $cvv='x') {
    $ccv_length = 3; 
    if (substr($cc, 0, 1) == '3') {
        $ccv_length = 4;
    }
    $ccs = array();
    while (count($ccs) < 10) {
        $card = strval($cc);
        $digits = '0123456789012345';
        $list_digits = str_split($digits);
        shuffle($list_digits);
        $string_digits = implode('', $list_digits);
        $card = $card . $string_digits;
        $card = substr($card, 0, 16);
  
        if ($mes == 'x') {
            $mes = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
        }
        if ($ano == 'x') {
            $ano = rand(date('Y'), date('Y')+6);
        }
  
        if ($cvv == 'x') {
            $ccv = substr(str_shuffle(str_repeat('0123456789', $ccv_length)), 0, $ccv_length);
        } else {
            $ccv = $cvv;
        }
  
        if (luhn_verification($card)) {
            $ccs[] = $card . '|' . $mes . '|' . $ano . '|' . $ccv;
        }
    }
    return $ccs;
}