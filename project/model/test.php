<?
include 'importModelEntity.php';
$user = User::loadFromDB();
//$usr = $user->loadFromDB();
    foreach($user as $item) 
        $item->showInfo();
        
        
        $user = Mark::loadFromDB();
//$usr = $user->loadFromDB();
    foreach($user as $item) 
        $item->showInfo();
        
        
        $user = Friend::loadFromDB();
//$usr = $user->loadFromDB();
    foreach($user as $item) 
        $item->showInfo();
        
        
        
        $user = Currency::loadFromDB();
//$usr = $user->loadFromDB();
    foreach($user as $item) 
        $item->showInfo();

?>