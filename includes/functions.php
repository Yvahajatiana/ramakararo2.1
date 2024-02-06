<?php
if(!function_exists('get_friends')){
    function get_friends(){
        global $db;
        $q = $db->prepare("SELECT pseudo, id FROM `users` ORDER BY pseudo");
        $q->execute();
        $data = $q->fetchAll();
        $q->closeCursor();
        return $data;
    }
}
if(!function_exists('red_msg')){
    function red_msg(){
        global $db;
        $q = $db->prepare("select contenue,id1,id2,date from msg where id1=? or id2=? ORDER BY  date DESC");
        $q->execute([$_SESSION['user_id'],$_SESSION['user_id']]);
        $data = $q->fetchAll();
        $q->closeCursor();
        return $data;
    }
}
// Echappement au caractere
if(!function_exists('e')){
    function e($string){
        if($string){
            return strip_tags($string);
        }
    }
}

if(!function_exists('get_session')){
    function get_session($key){
        if($key){
            return !empty($_SESSION[$key])
                ?e($_SESSION[$key])
                : null;
        }
    }
}
// Récuperer l'image avatar
if(!function_exists('get_avatar_url')){
    function get_avatar_url($email){
        return "http://gravatar.com/avatar/".md5(strtolower(trim(e($email))));
    }
}
/*/ Récherché l'utilisateur par name
if(!function_exists('get_user_by_name')){
    function get_user_by_name($valeur,$key){
        global $db;
        $q = $db->prepare("SELECT id, name, pseudo, email FROM users WHERE name = 'Faida' ");
        $q->execute();
        $data = $q->fetchAll();
        var_dump($data);
        $q->closeCursor();
        return $data[$key];
    }
}
*/// Récherché l'utilisateur par id
if(!function_exists('get_user_by_id')){
    function get_user_by_id($valeur,$key){
        global $db;
        $q = $db->prepare("SELECT id, name, pseudo, email FROM users WHERE id = ?");
        $q->execute([$valeur]);
        $data = $q->fetchAll();
        $q->closeCursor();
        return $data[0][$key];
    }
}
if(!function_exists('find_user_by_id')){
    function find_user_by_id($id){
        global $db;
        $q = $db->prepare("SELECT name, pseudo, email FROM users WHERE id = ?");
        $q->execute([$id]);
        $data = current($q->fetchAll(PDO::FETCH_OBJ));
        $q->closeCursor();
        return $data;
    }
}
// Verification pas vide
if(!function_exists('not_empty')){
    function not_empty($fields = []){
        if(count($fields)!=0){
            foreach($fields as $field){
                if(empty($_POST[$field] )||trim($_POST[$field]) == ""){
                    return false;
                }
            }
            return true;
        }
    }
}
// si deja utilisé
if(!function_exists('is_already_in_use')){
    function is_already_in_use($field, $value, $table){
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field=?");
        $q->execute([$value]);
        $count = $q->rowCount();
        $q->closeCursor();
        return $count;
    }
}
// boite flash
if(!function_exists('set_flash')){
    function set_flash($message, $type = 'info'){
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}
// rédirectionné
if(!function_exists('redirect')){
    function redirect($page){
        header('Location: '.$page);
        exit();
    }
}
//Enregistrer valeur du input
if(!function_exists('save_input_data')){
    function save_input_data(){
       foreach($_POST as $key => $value){
           if(strpos($key, 'password')=== false){
               $_SESSION['input'][$key] = $value;
           }
       }
    }
}
// Récuperer le donnee du input
if(!function_exists('get_input')){
    function get_input($key){
        return !empty($_SESSION['input'][$key])
            ?e($_SESSION['input'][$key])
            : null;
    }
}
// Vider l'input box
if(!function_exists('clear_input_data')){
    function clear_input_data(){
        if(isset($_SESSION['input'])){
            $_SESSION['input'] = [];
        }
    }
}

//Gere l'action de different liens
 if(!function_exists('set_active')){
     function set_active($file){
         $page = array_pop(explode('/',$_SERVER['SCRIPT_NAME']));
         if($page == $file.'.php'){
             return "active";
         }else{
             return "";
         }
     }
 }