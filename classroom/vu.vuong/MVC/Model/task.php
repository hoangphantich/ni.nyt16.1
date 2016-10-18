<?php
class Task{
 
    // database connection and table name
    private $conn;
    private $table_name = "task";
 
    // object properties
    public $id;
    public $name;
    public $category_id;
    
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create task
    function create(){
 
        // to get time-stamp for 'created' field
         
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?, category_id = ?";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
 
        // bind values
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->category_id);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readAll($page, $from_record_num, $records_per_page){
 
    $query = "SELECT
                id, name, category_id
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }
// used for paging tasks
        public function countAll(){
         
            $query = "SELECT id FROM " . $this->table_name . "";
         
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
         
            $num = $stmt->rowCount();
         
            return $num;
        }
       
       function delete(){
         
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
             
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
         
           if($result = $stmt->execute()){
                return true;
            }else{
                return false;
            }

        }
        function readOne(){
 
            $query = "SELECT
                        name,category_id
                    FROM
                        " . $this->table_name . "
                    WHERE
                        id = ?
                    LIMIT
                        0,1";
         
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
         
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
            $this->name = $row['name'];
            $this->category_id = $row['category_id'];
        }
        function update(){
         
            $query = "UPDATE
                        " . $this->table_name . "
                    SET
                        name = :name,
                        category_id  = :category_id
                    WHERE
                        id = :id";
         
            $stmt = $this->conn->prepare($query);
         
            // posted values
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->category_id=htmlspecialchars(strip_tags($this->category_id));
            $this->id=htmlspecialchars(strip_tags($this->id));
         
            // bind parameters
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':id', $this->id);
         
            // execute the query
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
}
?>