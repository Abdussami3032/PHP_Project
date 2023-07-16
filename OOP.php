<?php
class Database
{
    var $conn;
    public $result;
    function __construct()
    {
        $this->conn=mysqli_connect('localhost','root','','movie_tickets');
    }
    public function insert($table,$column=array())
    {
        $table_columns = implode(',',array_keys($column));
        $table_value = implode("','",$column);
        $query="Insert into $table ($table_columns) values('$table_value')";
        $this->result=mysqli_query($this->conn,$query);
    }
    public function update($table,$column=array(),$where,$id)
    {
        $args=array();
        foreach($column as $key => $value)
        {
            $args[] = "$key ='$value'";
        }
        $table_value=implode(',',$args);
        $Uquery="Update $table set $table_value where $where=$id";
        $this->result=mysqli_query($this->conn,$Uquery);
    }
    public function delete($table,$where,$id)
    {
        $Dquery="Delete from $table where $where=$id";
        $this->result=mysqli_query($this->conn,$Dquery);
    }
    public function select($table,$column='*',$where)
    {
        $Squery="Select $column from $table";
        if($where!="")
        {
            $Squery.="where $where";
        }
        $Squery
        $this->result=mysqli_query(this->conn,$Squery)
    }
}
?>