<?php

use App\Libraries\MyClass;
use App\Models\Product;
$id=$_REQUEST['id'];
$product=Product::find($id);
if($product==null)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=product&cat=trash");
}
$product->delete();//xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa CSDL thành công','type'=>'success']);
header("location:index.php?option=product&cat=trash");