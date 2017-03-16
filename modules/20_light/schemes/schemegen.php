<?php
    function fGetRGB($iH, $iS, $iV) {
        if($iH < 0)   $iH = 0;   // Hue:
        if($iH > 360) $iH = 360; //   0-360
        if($iS < 0)   $iS = 0;   // Saturation:
        if($iS > 100) $iS = 100; //   0-100
        if($iV < 0)   $iV = 0;   // Lightness:
        if($iV > 100) $iV = 100; //   0-100
        $dS = $iS/100.0; // Saturation: 0.0-1.0
        $dV = $iV/100.0; // Lightness:  0.0-1.0
        $dC = $dV*$dS;   // Chroma:     0.0-1.0
        $dH = $iH/60.0;  // H-Prime:    0.0-6.0
        $dT = $dH;       // Temp variable
        while($dT >= 2.0) $dT -= 2.0; // php modulus does not work with float
        $dX = $dC*(1-abs($dT-1));     // as used in the Wikipedia link
        switch(floor($dH)) {
            case 0:
                $dR = $dC; $dG = $dX; $dB = 0.0; break;
            case 1:
                $dR = $dX; $dG = $dC; $dB = 0.0; break;
            case 2:
                $dR = 0.0; $dG = $dC; $dB = $dX; break;
            case 3:
                $dR = 0.0; $dG = $dX; $dB = $dC; break;
            case 4:
                $dR = $dX; $dG = 0.0; $dB = $dC; break;
            case 5:
                $dR = $dC; $dG = 0.0; $dB = $dX; break;
            default:
                $dR = 0.0; $dG = 0.0; $dB = 0.0; break;
        }
        $dM  = $dV - $dC;
        $dR += $dM; $dG += $dM; $dB += $dM;
        $dR *= 255; $dG *= 255; $dB *= 255;
        return round($dR).",".round($dG).",".round($dB);
    }
?>{
  "de": "Regenbogen",
  "en": "Rainbow",
  "icon": "sun-o",
  "prominent": true,
  "dmx": {
    "projector": {
    "id": 2,
    "value": 0
    },
    "table": {
    "id": 3,
    "value": 255
    },
    "lab": {
    "id": 4,
    "value": 0
    },
    "laser Muster": {
    "id": 13,
    "value": 0
    }<?php
    for ($i=14;$i<=18;$i++) {
        echo ",
    \"laser" . ($i-14) . "\": {
        \"id\": $i,
        \"value\": 0
    }";
    } ?>
    <?php
    $unicolor[0]=255;
    $unicolor[1]=160;
    $unicolor[2]=90;
    $ledstripcount = 12;
    $startdmxid = 20;
    for ($i=0; $i < $ledstripcount; $i++) {
        $rainbow=explode(",", fGetRGB(360-$i*30,100,100));
        for ($j=0; $j < 3; $j++) {
        echo ",
    \"segment $i col $j\": {
        \"id\": " . ($i*3+$j+$startdmxid) . ",
        \"value\": " . $unicolor[$j] . "
    }";
        }
    }


        
     ?>
    
  }
}
