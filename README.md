**## Author:DLUSEC**

## 开赛前期准备

### 登录服务器SSH

修改密码：passwd

改数据库密码（要把配置先改了再来改数据库，不然有可能网站直接down）：

```sql
#方法一
show databases;
use mysql
set password for root@localhost = password('dlusecdlusec');
#方法二
update user set password = PASSWORD('0000ff') where user='root';
flush privileges;
show tables;

update user set plugin=‘mysql_native_password’ where user=‘root’;
update user set authentication_string=PASSWORD('0000ff') where user='root';


```

### 备份源码并下载

```sh
cd /var/www/html

（压缩）tar -czvf web.tar.gz .

下载文件 本地解压并查杀木马，之后把备份文件中比赛方预留木马删除,再把修改后的备份文件上传回服务器（防止之后把木马上传回去）上传到 /tmp

恢复：
cd /tmp 

（解压）tar -xzvf web.tar.gz 

（复制，恢复环境）cp -R /tmp/var/www/html/ /var/www/html/ 

（备份数据库）mysqldump -u root -p test(数据库名) > test.sql

（还原数据库）mysql -u root -p test(数据库名) < test.sql 
```

### 快速查找命令

上WAF或日志记录（若waf在web目录下需要删除掉waf文件的include）

```sh
find /var/www/html -name "*.php"|xargs sed -i "s#<?php#<?php\ninclude('/var/www/html/php_log.php');\n#g"
```

快速查一下shell

```sh
find /var/www/html -name "*.php" |xargs egrep 'assert|eval|phpinfo\(\)|\(base64_decoolcode|shell_exec|passthru|file_put_contents\(\.\*\$|base64_decode\('
```

### 查找预留后门

用D盾扫描(d_safe)

使用 seay进行代码审计

### 端口扫描(基本用不上)

```
nmap -sS 127.0.0.1            #扫描主机常用端口
netstat -anp
```

### 抓流量

```sh
tcpdump tcp -t -s 0 and port 80 -w /tmp/target.cap
```

-t : 不显示时间戳

-s 0 : 抓取数据包时默认抓取长度为68字节。加上-s 0 后可以抓到完整的数据包

## 攻击思路

### 各种不死马

不死马														(nodie.php)

纯粹的php不死马								(nodieMF.php)

自动提交flag不死马					(autoflagNodie.php)

不死马自动提交flag的py脚本(MF版本) （autoMF.py）

不死马自动提交flag的py脚本	(autoflag2Nodie.py)

批量种马脚本										 	 (plshell.py)

## 后续防御与攻击思路 

### 文件监控

py3版(112.py  使用前记得删注释)

sh版(fileMonitor.sh)

### 分析流量

修复漏洞，或者直接通过其他队伍的攻击流量进行批量反打。

### 杀不死马

kill.sh

