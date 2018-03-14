<?php 
function cat_parent($data, $paren = 0, $str='', $select= 0) {// $objpreduct->cate_id
    foreach ($data as $key => $value) {
        $id = $value['id'];
        $name = $value['name'];
        if ($value['parent_id'] == $paren) {

            if ($select != 0 && $id == $select ) {
                echo "<option selected value='$id'>$str $name</option>";
            } else {
                echo "<option value='$id'>$str $name</option>";
            }
            cat_parent($data, $id, $str.'|-- ');
        }
    }
}
?>