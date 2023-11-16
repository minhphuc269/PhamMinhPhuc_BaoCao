<?php
use App\Models\Topic;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $topic = new Topic();
    //Lấy từ form
    $topic->name= $_POST['name'];
    $topic->slug = (strlen($_POST['slug']) >0) ? $_POST['slug'] : MyClass ::str_slug($_POST['name']);
    $topic->parent_id=0;
    $topic->sort_order=0;
    $topic->metakey= 1;
    $topic->metadesc= 1;
    $topic->status= $_POST['status'];
    //Xử lý upload file
    // if (strlen($_FILES['image']['name']) > 0) {
    //     $target_dir = "../public/images/topic/";
    //     $target_file = $target_dir . basename($_FILES["image"]["name"]);
    //     $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     if (in_array($extension,['jpg','jpeg','png','gif','webp'])) {
    //         $filename = $topic->slug . '.' . $extension;
    //         move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
    //         $topic->image = $filename;
    //     }
    // }
    //Tự sinh ra
    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($topic);
    //Lưu vào CSDL
    //INSERT INTO topic 
    $topic->save();
    //Chuyển hướng về index
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=topic");
}

if (isset($_POST['CAPNHAT'])) {
    $id=$_POST['id'];
    $topic = Topic::find($id);
    if($topic==null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
        header("location:index.php?option=topic");
    }
    //Lấy từ form
    $topic->name= $_POST['name'];
    $topic->slug = (strlen($_POST['slug']) >0) ? $_POST['slug'] : MyClass ::str_slug($_POST['name']);
    $topic->parent_id=0;
    $topic->sort_order=0;
    $topic->metakey= 1;
    $topic->metadesc= 1;
    $topic->status= $_POST['status'];
    //Xử lý upload file
    // if (strlen($_FILES['image']['name']) > 0) {
    //     //xóa hình cũ

    //     //Thêm hình mới
    //     $target_dir = "../public/images/topic/";
    //     $target_file = $target_dir . basename($_FILES["image"]["name"]);
    //     $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     if (in_array($extension,['jpg','jpeg','png','gif','webp'])) {
    //         $filename = $topic->slug . '.' . $extension;
    //         move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
    //         $topic->image = $filename;
    //     }
    // }
    //Tự sinh ra
    $topic->updated_at = date('Y-m-d H:i:s');
    $topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($topic);
    //Lưu vào CSDL
    //INSERT INTO topic 
    $topic->save();
    //Chuyển hướng về index
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=topic");
}