<?php

$company = $_POST['company'];
$branch = $_POST['branch'];
$IOED = $_POST['id'];
$role = $_POST['role'];

if($company=="TM_System")
{
    if($branch=="A")
    {
        $position = "TSM/A/". $role;
    }
    else
    {
        $position = "TSM/B/". $role;

    }
}
else
{
    if($branch=="C")
    {
        $position = "TSL/C/". $role;
    }
    else
    {
        $position = "TSL/D/". $role;

    }
}



// $position = $company."-".$branch."-".$role;
// $IOED = 2;

$existdata = file_get_contents("table.json");
$data_decoded = json_decode($existdata);
$lastIndex = count($data_decoded);
$i=0;
for ($i=0; $i < $lastIndex ; $i++) { 
    if($data_decoded[$i]->id==$IOED)
    {
        print_r($data_decoded[$i]->First_name);
        $data_decoded[$i]->position =  $position;
        
        
    }

}
$after_appended_data = json_encode($data_decoded);
// echo $after_appended_data ;
file_put_contents('table.json', $after_appended_data);
//


?>