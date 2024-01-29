<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php



$connect = mysqli_connect("localhost", "root", "", "DeFire");

class Cart {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public  function insertIntoCart($params = null, $table = "cart"){
    if ($this->db->con != null){
        if ($params != null){
            // "Insert into cart(user_id) values (0)"
            // get table columns
            $columns = implode(',', array_keys($params));

            $values = implode(',' , array_values($params));

            // create sql query
            $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

            // execute query
            $result = $this->db->con->query($query_string);
            return $result;
        }
    }
}

// to get user_id and item_id and insert into cart table
public function addToCart($userid, $itemid) {
    // Prepare the parameters for the insertIntoCart method
    $params = array(
        "user_id" => $userid,
        "item_id" => $itemid
    );
    // Call the insertIntoCart method to add the item to the cart
    $result = $this->insertIntoCart($params);

    // Return the result of the insert operation
    return $result;
}

// delete cart item using cart item id
public function deleteCart($item_id = null, $table = 'cart'){
    if($item_id != null){
        $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
    }
}

// calculate sub total
public function getSum($arr){
    if(isset($arr)){
        $sum = 0;
        foreach ($arr as $item){
            $sum += floatval($item[0]);
        }
        return sprintf('%.2f' , $sum);
    }
}

// get item_it of shopping cart list
public function getCartId($cartArray = null, $key = "item_id"){
    if ($cartArray != null){
        $cart_id = array_map(function ($value) use($key){
            return $value[$key];
        }, $cartArray);
        return $cart_id;
    }
}

// Save for later
public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
    if ($item_id != null){
        $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
        $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

        // execute multiple query
        $result = $this->db->con->multi_query($query);

        if($result){
            header("Location :" . $_SERVER['PHP_SELF']);
        }
        return $result;
    }
}
}

