 <?php 

 include_once("../../config.php");
    
     
    echo $_REQUEST['action']();
    
    function getSubcategory() {
        
        global $mysql;
        $categoryID = $_REQUEST['categoryID'];
        
        $html = '<select  name="subcategory" id="subcategory" style="width:365px;padding:5px;">';
            foreach(JPostads::getSubcategories($categoryID) as $r) {
                $html .= '<option value="'.$r['subcateid'].'">'.$r['subcatename'].'</option>';
            }
        $html .='</select>';
            return $html;
    }
     function getAdtype() {
        
        global $mysql;
        $categoryID = $_REQUEST['categoryID'];
        
        $html = '<select  name="adtype" id="adtype" style="width:365px;padding:5px;">';
            foreach(JPostads::getAdtypes($categoryID) as $r) {
                $html .= '<option value="'.$r['typeid'].'">'.$r['typename'].'</option>';
            }
        $html .='</select>';
            return $html;
    }
    
    function getDistrict() {
            
            global $mysql;
            $stateID = $_REQUEST['stateID'];
            
            $html = '<select name="district" id="district" style="width:180px;"padding:5px;">';
                foreach(JPostads::getDistricts($stateID) as $r) {
                    $html .= '<option value="'.$r['distcid'].'">'.$r['districtname'].'</option>';
                }
            $html .='</select>';
                return $html;
    }
    

?>
