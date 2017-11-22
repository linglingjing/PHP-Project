<?php 
namespace Home\Model;
use Think\Model;

class CartModel extends Model
{
	//当前购物车名
	public $sessionName;
	//购物车总价格
	public $totalPrice;
	public function __construct($sessionName){
		$this->sessionName=$sessionName;
		if(!isset($_SESSION[$this->sessionName]))
		{
			$_SESSION[$this->sessionName]="";
		}
	 }
	 //获取购物车的信息
	public function getCart(){
	    $cur_cart_array=$_SESSION[$this->sessionName];
	    return $cur_cart_array;
	}
	//获取购物车商品清单
	public function getCartList()
	{
	$cur_cart_array=$_SESSION[$this->sessionName];
	if($cur_cart_array!="")
	 {
	  $mode_goods_data=M("dish");
	  $len=count($cur_cart_array);
	  for($i=0;$i<$len;$i++)
	  {
		  $goodsid=$cur_cart_array[$i]["id"];
		  $num=$cur_cart_array[$i]["num"];
		   $query="select (select sfilename from goods_pic where goodsid=a.goodsid order by sno desc limit 0,1) as sfilename,b.clsname as clsname,a.goodsid as goodsid,a.goodsname as goodsname,a.Price as Price,a.Storageqty as Storageqty from goods_data a left join goods_cls b on a.Clsid=b.clsid where a.goodsid=$goodsid";
		    $list=$mode_goods_data->query($query);
		    $list[0]["qty"]=$num;
		    $list[0]["amount"]=$num*$list[0]["Price"];
		    $cartList[$i]=$list[0];
		    $totalPrice+=$list[0]["amount"];
	  }
	  //返回商品总价格
	  $this->totalPrice=$totalPrice;
	    return $cartList;
	 }
	}
//加入购物车,购物车的商品id和购物车的商品数量
public function addcart($goods_id,$goods_num){
      $cur_cart_array=$_SESSION[$this->sessionName];
      if($cur_cart_array=="")
       {
          $cart_info[0]["id"]=$goods_id;//商品id保存到二维数组中
      $cart_info[0]["num"]=$goods_num;//商品数量保存到二维数组中
      $_SESSION[$this->sessionName]=$cart_info;
        }
        else
        {   
          //返回数组键名倒序取最大
      $ar_keys=array_keys($cur_cart_array);
           $len=count($ar_keys);
           $max_array_keyid=$ar_keys[$len-1]+1;
          //遍历当前的购物车数组
     //遍历每个商品信息数组的0值，如果键值为0且货号相同则购物车该商品已经添加
     $is_exist=$this->isexist($goods_id,$goods_num,$cur_cart_array);
         if($is_exist==false)
         {
             $cur_cart_array[$max_array_keyid]["id"] = $goods_id;
             $cur_cart_array[$max_array_keyid]["num"] = $goods_num;
             $_SESSION[$this->sessionName]=$cur_cart_array;
         }
         else
         {
          $arr_exist=explode("/",$is_exist);
          $id=$arr_exist[0];
          $num=$arr_exist[1];
          $cur_cart_array[$id]["num"]=$num;
          $_SESSION[$this->sessionName]=$cur_cart_array;
         } 
       }
}
//判断购物车是否存在相同商品
public function isexist($id,$num,$array)
{
 $isexist=false;
 foreach($array as $key1=>$value)
 {
  foreach($value as $key=>$arrayid)
  {
    if($key=="id" && $arrayid==$id)
    {
     $num=$value["num"]+$num;
     $isexist=$key1."/".$num;
    }
  }
 }
 return $isexist;
}
thinkphp开发使得我们比较容易的去进行了
//从购物车删除
public function delcart($goods_array_id){
         //回复序列化的数组
     $cur_goods_array=$_SESSION[$this->sessionName];
        //删除该商品在数组中的位置
     unset($cur_goods_array[$goods_array_id]);
         $_SESSION[$this->sessionName]=$cur_cart_array;
         //使数组序列化完整的保存到cookie中
}
//清空购物车
public function emptycart(){
$_SESSION[$this->sessionName]="";
}
//修改购物车货品数量   
public function update_cart($up_id,$up_num){
 //回复序列化的数组
 $cur_goods_array=$_SESSION[$this->sessionName];  
  $cur_goods_array[$up_id]["num"]=$up_num;
  $_SESSION[$this->sessionName]=$cur_cart_array;
}
	
}


?>