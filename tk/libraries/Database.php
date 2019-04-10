<?php
    class Database{
      public $host = DB_Host;
      public $username = DB_USER;
      public $password = DB_PASS;
      public $name = DB_NAME;
      public $link;
      public $error;

      /*
      * Class Constructor
      */

      public function __construct(){
        //Call connect function
        $this->connect();

	  }

      private function connect(){
        $this->link = new mysqli($this->host, $this->username, $this->password, $this->name);
		mysqli_set_charset($this->link,'utf8');
        if(!$this->link)
        {
          $this->error= "Connection Falied: ".$this->link->connect_error;
          return false;
        }
      }
      /*
      * Select
      */
      public function select($query){
        $result = $this->link->query($query) or die($this->link->error.'__link__');
        if($result->num_rows > 0){
          return $result;
          }
          else {
            return false;
          }
        }
        /*
        * Insert
        */
        public function insert($query){
          $insert_row = $this->link->query($query) or die($this->link->error.'__link__');
          //validate insert
          if($insert_row){
            header("location: index.php?msg".urlencode('Record Added'));
            exit();
          }else {
            die('Error : ('. $this->link->errno.') '. $this->link->error);
          }
    }
    /*
    * Update
    */
    public function update($query){
      $update_row = $this->link->query($query) or die($this->link->error.'__link__');
      //validate insert
      if($update_row){
        header("location: index.php?msg=".urlencode('Record Updated'));
        exit();
      }else {
        die('Error : ('. $this->link->errno.') '. $this->link->error);
      }
    }
      /*
      * Delete
      */
      public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.'__link__');
        //validate insert
        if($delete_row){
          header("location: index.php?msg=".urlencode('Record Deleted'));
          exit();
        }else {
          die('Error : ('. $this->link->errno.') '. $this->link->error);
        }
    }
}
?>
