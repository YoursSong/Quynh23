<?php
include('connect.php');

class contact_user
{

    //user
    public function select_user($user)
    {
        global $conn;
        $select="select * from user_room where user='$user'";
        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function register($user, $email,$pass)
    {
        global $conn;
        $insert="insert into user_room(user, email, pass) value('$user','$email', '$pass')";
        $run=mysqli_query($conn,$insert);
        return $run;
    }
    public function login($user, $pass)
    {
        global $conn;
        $select="select * from user_room where user='$user' and pass='$pass'";
        $run=mysqli_query($conn,$select);
        return $run;
    }

    // Contact

    public function Insert_Contact($name, $email, $tel, $address, $title, $comment)
    {
        global $conn;
        $insert="insert into contact_user(name, email, tel, address, title, comment) value('$name', '$email', '$tel', '$address', '$title', '$comment')";
        $run=mysqli_query($conn,$insert);
        return $run;
    }


    // room
    public function select_room() {
        global $conn;
        $select = "select * from room";
        $run=mysqli_query($conn,$select);
        return $run;
    }


    //email

    public function select_register_email($email)
    {
        global $conn;
        $select="select * from user_room where email='$email'";
        $run=mysqli_query($conn,$select);
        return $run;
    }


    // book room
        public function insert_book_user($id_room, $username, $tenphong, $soluong, $total) {
        global $conn;
        $sql = "insert into book_room(id_room, username,tenphong, soluong, total) values ('$id_room', '$username','$tenphong','$soluong', '$total')";
        $run=mysqli_query($conn,$sql);
        return $run;
        }
}
class search{
public function searchRoom($query)
{
    global $conn;
    $query = mysqli_real_escape_string($conn, $query);
    $search = "SELECT * FROM room WHERE name_room LIKE '%$query%' OR CategoryRoom LIKE '%$query%'
    OR price_room LIKE '%$query%' OR picture LIKE '%$query%'"; // Giả sử có cột room_type
    $result = mysqli_query($conn, $search);
    return $result;
}
}
?>