<?php
    function genRectangle (int $abs, int $ord, int $wdt, int $hgt, string $col, float $opc)
    {
        $rectangle = ['x="'.$abs.'"', 'y="'.$ord.'"', 'width="'.$wdt.'"','height="'.$hgt.'"', 'fill="'.$col.'"', 'opacity="'.$opc.'"'];
        return genTag('rect', $rectangle);
    }

    Function genEllipse (int $abs, int $ord, int $xray, int $yray, string $col, float $opc):string
    {
        $ellipse = ['cx="'.$abs.'"', 'cy="'.$ord.'"', 'rx="'.$xray.'"', 'ry="'.$yray.'"', 'fill="'.$col.'"', 'opacity="'.$opc.'"'];
        return genTag('ellipse', $ellipse);
    }

    Function genTriangle (int $pt1x, int $pt1y, int $pt2x, int $pt2y, int $pt3x, int $pt3y, string $col, float $opc):string
    {
        $triangle = ['points="'.$pt1x.' '.$pt1y.' '.$pt2x.' '.$pt2y.' '.$pt3x.' '.$pt3y.'"', 'fill="'.$col.'"', 'opacity="'.$opc.'"'];
        return genTag('polygon', $triangle);
    }

    Function genCircle (int $abs, int $ord, int $ray, string $col, float $opc):string
    {
        $circle = ['cx="'.$abs.'"', 'cy="'.$ord.'"', 'r="'.$ray.'"', 'fill="'.$col.'"', 'opacity="'.$opc.'"'];
        return genTag('circle', $circle);
    }

    function genSquare (int $abs, int $ord, int $siz, string $col, float $opc):string
    {
        $square = ['x="'.$abs.'"', 'y="'.$ord.'"', 'width="'.$siz.'"', 'height="'.$siz.'"', 'fill="'.$col.'"', 'opacity="'.$opc.'"'];
        return genTag('rect', $square);
    }

    function genTag (string $name, array $table)
    {
        $result = '<'.$name.' ';
        foreach ($table as $item) {
            $result .= $item.' ';
        }
        $result .= '/>';
        return $result;
    }
