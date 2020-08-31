<?php
session_start();
include 'C:\OpenServer\OpenServer\domains\lab2.ua\users.php';
include 'C:\OpenServer\OpenServer\domains\lab2.ua\lang.php';

if($_GET["exit"]){
    session_destroy();
    header("Location: ..\login\index.html");
}

if (isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

if (!(isset($_SESSION['login'])) && !(isset($_SESSION['password']))){
    session_destroy();
    header('Location: ..\login\index.html');
}
if (!(($_SESSION['role']) == 'admin')) {
    session_destroy();
    header("Location: ..\login\index.html");
}
class User{
    public $login;
    public $password;
    public $name;
    public $surname;
    public $role;
    public $langhi;
    public $langinfo;

    function __construct($login,$password,$name,$surname,$role,$langhi,$langinfo)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->langhi = $langhi;
        $this->langinfo = $langinfo;
    }
}

class admin extends User {

    public function introduce (){
        echo $this ->langhi . $this->name. "  " . $this->surname. "  ". $this ->langinfo;
    }
}

for (k = 0; k < count($users); k++){
    if (($users[k]['login'] == $users[k]['login']) && !(isset($_GET['lang']))){
        switch ($users[k]['lang']){
            case 'ru';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['ru'], $lang[1]['ru']);
                break;
            case 'en';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['en'], $lang[1]['en']);
                break;
            case 'ua';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['ua'], $lang[1]['ua']);
                break;
            case 'it';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['it'], $lang[1]['it']);
                break;
        }
        $admin ->introduce();
    }
    if (($_SESSION['login'] == $users[k]['login']) && (isset($_GET['lang']))){
        switch ($_GET['lang']){
            case 'ru';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['ru'], $lang[1]['ru']);
                break;
            case 'en';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['en'], $lang[1]['en']);
                break;
            case 'ua';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['ua'], $lang[1]['ua']);
                break;
            case 'it';
                $admin = new admin($users[k]['login'], $users[k]['password'], $users[k]['name'], $users[k]['surname'], $users[k]['role'], $lang[0]['it'], $lang[1]['it']);
                break;
        }
        $admin ->introduce();
    }
}

?>

<head>
    <title>Страница Андминистратора</title>
</head>
<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit" value="Save">
</form>

<form method="GET">
        <input type="submit" name="exit"  value="Exit">
    </form>

    <form name = "test" action = "manager.php" method = "post">
        <button><font color ="black">Менеджер</font></button>
    </form>
    <form name = "test" action = "client.php" method = "post">
        <button><font color ="black">Клиент</font></button>
    </form>

