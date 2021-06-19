<?php
 

if(!empty($_FILES)){
 

$filename = $_FILES['upload_image']['name'];
 

$uploaded_path = 'images_after/'.$filename;

 
$result = move_uploaded_file($_FILES['upload_image']['tmp_name'],$uploaded_path);
 
if($result){
  $MSG = '変換をするファイル名：'.$filename;
  $img_path = $uploaded_path;
}else{
  $MSG = 'アップロード失敗。エラーコード：'.$_FILES['upload_image']['error'];
}
 
}else{
  $MSG = '画像を選択してください';
}
?>
 
 
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="image.css">
  <title>画像をテキストに変換</title>
</head>
<body>
<header>
  <h1 class="headline">
    <a>画像からテキスト変換</a>
  </h1>
</header>
<main>
 
<section class="form-container">
 
<!--  メッセージを表示している箇所-->
<p><?php if(!empty($MSG)) echo $MSG;?></p>
 
  <!-- 画像を表示している箇所 -->
  <?php if(!empty($img_path)){;?>
 
   <img src="<?php echo $img_path;?>" alt="">
 
  <?php } ;?>
 
 
  <!-- （1）form タグからpost送信する -->

  <form action="" method="post" enctype="multipart/form-data">
 
    <!-- input 属性はtype="file" と指定-->
    
      <input type="file" name="upload_image">
    
    
    <!-- 送信ボタン -->
   
    <input type="submit" class="btn_submit" value="アップロード">

  </form>

  <form action="gazou.php" method="post">
    <input type="submit" class="btn_change" value="変換">
  </form>
</section>
 
<section class="img-area">
 
<?php
if(!empty($img_path)){  ?>
<!-- （5）ローカルフォルダに移動した画像を画面に表示する -->
 <img src="echo <?php $img_path;?>" alt="">
<?php
}
?>
</section>
 
</main>
 
 
</body>
</html>