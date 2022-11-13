<?php

namespace App\Helpers;

class Helper{
    public static function unserialize_Ajax_Data($req)
    {
        $data = [];
        parse_str($req,$data);
        return $data;
    }

    public static function check_Quyen($NguoiDung_NhomQuyen, $Quyen_ID)
    {
        $NhomQuyen = $NguoiDung_NhomQuyen[0]['nhom_quyen'];
        if(count($NhomQuyen) > 0)
        {
            foreach ($NhomQuyen as $NhomQuyen_item) {
                $Quyen = $NhomQuyen_item['quyen'];
                if(count($Quyen) > 0)
                {
                    foreach ($Quyen as $Quyen_item) {
                        if($Quyen_item['MaQuyen'] == $Quyen_ID)
                        {
                            return 1;
                        }
                    }
                }
            }
        } 

        return 0;
    }
}