<?php



$connect = mysqli_connect("localhost", "root", "", "DeFire");

class Cart {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

// to get user_id and item_id and insert into cart table
public function addToCart(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $itemId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
        // Validate itemId and quantity here
    
        $query = "INSERT INTO cart (item_id, quantity) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $itemId, $quantity);
    
        if ($stmt->execute()) {
            echo "Item added to cart successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
}

// delete cart item using cart item id
public function deleteCart($item_id = null, $table = 'cart'){
    if($item_id != null){
        $result = $this->db->query("DELETE FROM {$table} WHERE item_id={$item_id}");
        if($result){
            header("Location :" . $_SERVER['PHP_SELF']);
        }
        return $result;
    }
}


// calculate sub total
public function getSum($arr){
    if(isset($arr)){
        $sum = 0;
        foreach($arr as $item){
            $sum += floatval($item[0]);
        }
        return sprintf('%.2f', $sum);
    }
}

// get item_id of shopping cart list
public function getCartId($cartArray = null, $key = "item_id"){
    if($cartArray != null){
        $cart_id = array_map(function($value) use($key){
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

