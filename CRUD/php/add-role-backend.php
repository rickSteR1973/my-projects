<?php


$branch = $_POST['branch'];
$role = $_POST['role'];


$existdata = file_get_contents("role.json");
$data_decoded = json_decode($existdata);


switch ($branch) {
    case "A": {
        $a = $data_decoded->TM_System->$branch;
        $max = count($a);
        $data_decoded->TM_System->A[$max] = $role;
            break;
        }

    case "B": {
        $a = $data_decoded->TM_System->$branch;
        $max = count($a);
        $data_decoded->TM_System->B[$max] = $role;
            break;
        }

    case "C": {
        $a = $data_decoded->TM_Solutech->C;
        $max = count($a);
        $data_decoded->TM_Solutech->C[$max] = $role;
        break;
        }

    case "D": {

        $a = $data_decoded->TM_Solutech->D;
        $max = count($a);
        $data_decoded->TM_Solutech->D[$max] = $role;
            break;
        }
}





$after_appended_data = json_encode($data_decoded);
file_put_contents('role.json', $after_appended_data);

// if($branch=="A")
// {

// }
