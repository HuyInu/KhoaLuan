<?php

namespace App\Helpers;

class Helper{
    public static function unserialize_Ajax_Data($req)
    {
        $data = [];
        parse_str($req,$data);
        return $data;
    }

    public static function check_Quyen($NguoiDung_Quyen, $Quyen_ID)
    {
 
        $Quyen = $NguoiDung_Quyen;

            foreach ($Quyen as $Quyen_item) {
                if($Quyen_item['MaQuyen'] == $Quyen_ID)
                {
                    return 1;
                }
            }
        return 0;
    }
}