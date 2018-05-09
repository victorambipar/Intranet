<?php
class Actions {
    function see($json)
    {
        $see = "javascript:seeMenu( '".$json["dish1_menu"]."',
                                    '".$json["dish2_menu"]."',
                                    '".$json["dish3_menu"]."',
                                    '".$json["garrison1_menu"]."',
                                    '".$json["garrison2_menu"]."',
                                    '".$json["option_menu"]."',
                                    '".$json["salad_menu"]."',
                                    '".$json["dessert_menu"]."');";
    
        return $see;
    }
    function remover($json)
    {
        $see = "javascript:remover('".$json["cod"]."');";
        return $see;
    }
}
?>