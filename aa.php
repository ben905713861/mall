<?php
//try {
//  $db = new PDO('mysql:host=127.0.0.1;dbname=mogela_cn', 'mogela_cn', 'mogela1988');
//} catch (PDOException $e) {
//  print "Error!: " . $e->getMessage() . "<br/>";
//  die;
//}
$db = new PDO('mysql:host=127.0.0.1;dbname=mogela_cn', 'mogela_cn', 'mogela1988',array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names UTF8"));


//$res = $db->exec('DELETE FROM ims_mc_member_addcredit1');
//
//$res = $db->query('SELECT * FROM ims_mc_member_addcredit1')->fetchAll(PDO::FETCH_ASSOC);

//$uid = 159;
//$credit1 = 50;
//$time = time();
//$res = $db->exec("INSERT INTO ims_mc_credits_record (uid,uniacid,credittype,num,operator,module,clerk_id,store_id,clerk_type,createtime,remark,real_uniacid) 
//VALUES ($uid,2,'credit1',$credit1,0,'ewei_shopv2',0,0,0,$time,'分享商品得积分',0)");
//
$res = $db->query('SELECT * FROM ims_mc_credits_record ORDER BY id DESC LIMIT 5')->fetchAll(PDO::FETCH_ASSOC);

//$res = $db->exec('DELETE FROM ims_mc_credits_record WHERE id IN (82,83,84) LIMIT 3');
print_r($res);
