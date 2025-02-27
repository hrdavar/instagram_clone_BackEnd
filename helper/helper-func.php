
<?php
const BASE_URL='http://localhost/instagram/';
const BASE_TITLE='INSTAGRAM';

function asset($file)
    {return trim(BASE_URL,'/ ') .'/' .trim($file,'/ ');}

function redirect($url)
    {
        header("Location:" .trim(BASE_URL,'/ ') .'/'. trim($url,'/ '));
        exit();
    }
function url($url)
    {
        return trim(BASE_URL,'/ ').'/'.trim($url,'/ ');
    }
function page_url()
{return urldecode(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));}

function dd($var)

{echo "<pre>";
var_dump($var);
exit();}
function icon()
{
return('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">');
}
function msg($text){
    return '<div class="alert alert-success zindex" role="alert">'.$text.'</div>';
}
function err($text){
    return '<div class="alert alert-fill-danger" role="alert">'.$text.'</div>';
}
function get_user_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
function update_visitors($id = null, $table_name = null, $ip = null)
{
    global $connection;
    if ($id !== null && $table_name !== null) {
        $query = "UPDATE `$table_name` SET visitor = visitor + 1 WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    } elseif ($ip !== null)
    {
        $query = "SELECT * FROM `home` WHERE ip = ?";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(1, $ip);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row)
        {
            $query = "UPDATE `home` SET visitor = visitor + 1 WHERE ip = ?";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(1, $ip);
            $stmt->execute();
        } else {
            $query = "INSERT INTO `home` (ip, visitor) VALUES (?, 1)";
            $stmt = $connection->prepare($query);
            $stmt->bindValue(1, $ip);
            $stmt->execute();
        }
    }
}
function count_sql_row($sql2){
    global $connection;
    //$sql='SELECT * FROM ';
    //$sql .=$sql2;
    $result = $connection->prepare("SELECT * FROM $sql2 ");
    $result->execute();
    $count = $result->rowCount();
    return $count;}

function sum_visitor_content()
{   global $connection;
    $result = $connection->prepare("SELECT SUM(visitor) AS sum FROM content;");
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['sum'];}
function select_all_sql($table_name,$condition)
{   global $connection;
    if (empty($condition)){$condition=1;}
    $result = $connection->prepare("SELECT * FROM $table_name WHERE $condition");
    $result->execute();
    $row = $result->fetchAll(PDO:: FETCH_ASSOC);
    return $row;}
function select_all_article($condition){
    global $connection;
    $result = $connection->prepare("SELECT * FROM content WHERE link='$condition'");
    $result->execute();
    $row = $result->fetchAll(PDO:: FETCH_ASSOC);
    return $row;
}
function sql_count($table_name)
{   global $connection;
    $result = $connection->prepare("SELECT * FROM $table_name");
    $result->execute();
    $count = $result->rowCount();
    return $count;}
function count_all_visitors() {
    global $connection;

    $query = "SELECT SUM(visitor) AS total_visitors FROM home";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total_visitors'];}
function user_found($username)
{
    global $connection;
    $query = "SELECT user_name FROM member WHERE user_name='$username'";
    $result= $connection->prepare($query);
    $result->execute();
    $count = $result->rowCount();
    if ($count > 0) return true;
}
?>