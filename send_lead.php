<?php 

// Get the posted data.
// $postdata = file_REQUEST_contents("php://input");

// $request = json_decode($postdata);

// @$name = $request->name;
// @$email = $request->email;
// @$phone = $request->phone;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$result = array();

$result['Status'] = "0";
$result['Message']= "You are not allowed";

if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['phone'])){

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $utm_source = $_REQUEST['utm_source'];
    $utm_medium = $_REQUEST['utm_medium'];

    $response = insertEntryLS($name, $email, $phone, $utm_source, $utm_medium);

    $result['Status'] = "1";
    $result['Message']= "Successfully Submitted";
    $result['Response'] = $response;

}

else{

    $result['Status'] = "-1";
    $result['Message']= "Please fill complete details";

}

echo json_encode($result);



function insertEntryLS($name, $email, $phone, $utm_source, $utm_medium){

    $data_string = '[{"Attribute":"FirstName","Value":"'.$name.'"},{"Attribute":"LastName","Value":""},{"Attribute":"EmailAddress","Value":"'.$email.'"},{"Attribute":"Phone","Value":"'.$phone.'"},{"Attribute":"ProspectID","Value":"xxxxxxxx-d168-xxxx-9f8b-xxxx97xxxxxx"},{"Attribute":"mx_UTM_Medium","Value":"'.$utm_medium.'"}, {"Attribute":"mx_UTM_Source","Value":"'.$utm_source.'"}, {"Attribute":"SearchBy","Value":"Phone"}]';
    
    print_r($data_string);
    
    try
        {
        $curl = curl_init('https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$r028c62e4a7d5624b5e1ef8cfd97bbdf8&secretKey=dd2143a1a71c14a49346dddfa6f6a3123fe46d54');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Content-Type:application/json",
                "Content-Length:".strlen($data_string)
                ));
        $json_response = curl_exec($curl);
        echo $json_response;
            curl_close($curl);
        } catch (Exception $ex) {
            curl_close($curl);
        }

        return $json_response;
}
?>
