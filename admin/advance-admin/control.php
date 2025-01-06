<?php
include('connect.php');

class data_user
{
    // room

    public function select_room()
    {
        global $conn;
        $select="select * from room";
        $run=mysqli_query($conn,$select);
        return $run;
    }

    public function select_room_id($id){
        global $conn;
        $sql="select * from room where id_room='$id'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }

    public function delete_room($id) 
    {
        global $conn;
        $del = "delete from room where id_room='$id'";
        $run = mysqli_query($conn,$del);
        return $run; 
    }

    public function update_room($NameRoom, $PriceRoom, $Picture, $CategoryRoom, $DesRoom, $soluong,$id)
    {
        global $conn;
        $up="update room set name_room='$NameRoom', price_room='$PriceRoom', Picture='$Picture', CategoryRoom='$CategoryRoom', Des_room='$DesRoom', soluong='$soluong' where id_room='$id'";
        $run=mysqli_query($conn,$up);
        return $run;
    }

    public function Insert_Room($NameRoom, $PriceRoom, $Picture, $CategoryRoom, $DesRoom, $soluong)
    {
        global $conn;
        $insert="insert into room(name_room, price_room, Picture, CategoryRoom, Des_room, soluong) value('$NameRoom', '$PriceRoom', '$Picture', '$CategoryRoom', '$DesRoom', '$soluong')";
        $run=mysqli_query($conn,$insert);
        return $run;
    }


    //contact

    public function select_contact()
    {
        global $conn;
        $select="select * from contact_user";
        $run=mysqli_query($conn,$select);
        return $run;
    }

    public function delete_contact($id) 
    {
        global $conn;
        $del = "delete from contact_user where id_contact='$id'";
        $run = mysqli_query($conn,$del);
        return $run; 
    }

    // order

        public function select_order()
        {
            global $conn;
            $select="select * from book_room";
            $run=mysqli_query($conn,$select);
            return $run;
        }

        public function delete_order($id) 
        {
            global $conn;
            $del = "delete from book_room where id_order='$id'";
            $run = mysqli_query($conn,$del);
            return $run; 
        }

        public function select_order_id($id){
            global $conn;
            $sql="select * from book_room where id_order='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }

        public function update_order($status,$id)
    {
        global $conn;
        $up="update book_room set status='$status' where id_order='$id'";
        $run=mysqli_query($conn,$up);
        return $run;
    }

    // login admin
    public function select_user($user)
    {
        global $conn;
        $select="select * from admin where username='$user'";
        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function login($user, $pass)
    {
        global $conn;
        $select="select * from admin where username='$user' and password='$pass'";
        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function register($user, $pass)
    {
        global $conn;
        $insert="insert into admin(username, password) value('$user', '$pass')";
        $run=mysqli_query($conn,$insert);
        return $run;
    }

    // category
    public function select_category()
    {
        global $conn;
        $select="select * from category";

        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function insert_category($name, $description)
    {
        global $conn;
        $insert="insert into category(Category, Description) value('$name', '$description')";
        $run=mysqli_query($conn,$insert);
        return $run;
    }
    public function delete_cate($id)
    {
        global $conn;
        $select="delete from category where id_cate='$id'";
 
        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function se_up_cate($id)
    {
        global $conn;
        $select="select * from category where id_cate='$id'";

        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function update_cate($name,$description,$id)
    {
        global $conn;
        $update="update category set Category='$name', 
                                    Description	='$description' 
                                    where id_cate='$id'";

        $run=mysqli_query($conn,$update);
        return $run;
    }

    // report

    public function select_room_quantity()
    {
        global $conn;
        $select="select * from room where soluong = 0";
        $run=mysqli_query($conn,$select);
        return $run;
    }

    // status

   
}


?>