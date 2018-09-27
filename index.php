<?php
require "/opt/app-root/src/predis/autoload.php";
Predis\Autoloader::register();

<?php
    if (!isset($_COOKIE['visits']))
        $_COOKIE['visits'] = 0;
    $visits = $_COOKIE['visits'] + 1;
    setcookie('visits', $visits, time()+3600*24*365);
?>

<?php
    if ($visits > 1) {
        echo("This is visit number $visits.");
    } else { // First visit
        echo('Welcome to my Website! Click here for a tour!');
    }
?>


echo "\n\n";
// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.
try {
//    $redis = new Predis\Client();

    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "172.30.150.190",
        "port" => 6379));

    echo "Successfully connected to Redis";

$redis->set("hello_world", "Hi from Swati!");                                     
$value = $redis->get("hello_world");                                            
var_dump($value);                                                               
                                                                                
echo ($redis->exists("Santa Claus")) ? "true" : "false";

}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}
