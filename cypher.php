
<?php

// Függvények

// Ascii stringet, hexadecimális stringé alakító függvény    
function ascii2hex($ascii)
{
    $hex = '';
    for ($i = 0; $i < strlen($ascii); $i++) {
        $byte = strtoupper(dechex(ord($ascii[$i])));
        $byte = str_repeat('0', 2 - strlen($byte)) . $byte;
        $hex .= $byte . " ";
    }
    return $hex;
}

//A decimális karaktereket tartalmazó array elemeit a megadott kulccsal eltoló, stringet visszaadó függvény
function decode($content)
{
    $decoded = '';
    $key = array(5, -14, 31, -9, 3);

    for ($i = 0; $i < count($content); $i++) {
        if ($content[$i] === '10') {
            $decoded = $decoded . "10 ";
            continue;
        }
        $decoded = $decoded . ((int) $content[$i] - $key[0]) . " ";
        array_push($key, array_shift($key)); //rotálja a $key tömböt
    }
    return $decoded;
}

// Hexadecimális stringet decimális stringgé átalakító fv
function hex2dec($hexadecimal)
{
    $decimal = '';
    for ($i = 0; $i < strlen($hexadecimal); $i = $i + 3) {
        $a = intval(substr($hexadecimal, $i), 16);
        $decimal = $decimal . $a . " ";
    }
    return $decimal;
}

//Decimális stringet arrayé alakító,majd ascii stringet visszaadó függvény
function dec2ascii($content)
{
    $ascii = '';
    $temp = explode(" ", $content);
    for ($i = 0; $i < count($temp); $i++) {
        $valt = chr((int) $temp[$i]);
        $ascii = $ascii . $valt;
    }
    return $ascii;
}
//Függvényeknek vége

// Megnyitom a fájlt:
$filename = "pw/password.txt" or exit("Unable to open file!");
$readfile = fopen($filename, "r");
$contents = fread($readfile, filesize($filename));
fclose($readfile); // elengedem

// Átváltom az ascii karaktereket hexadecimálisba:
$hex = ascii2hex($contents);

// Átváltom decimálisba a hexadecimális karaktereket
$dec = hex2dec($hex);

// Eltolás
$dectoarray = explode(" ", $dec);
$shifted = decode($dectoarray);

// decimálisból asciiba:
$asciidecoded = dec2ascii($shifted);


?>
