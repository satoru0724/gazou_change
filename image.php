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
  <script>
　　function change_question() {
    　var select = confirm("テキストを読み取りますか？");
    　return select;
　　}
　</script>
</head>
<body>
<header>
  <h1 class="headline">
    <a>画像からテキスト変換</a>
  </h1>
</header>
<!--背景用クラス-->
<div class="bg_pattern Paper_v2"></div>

<main>


<section class="form-container">

<!--メッセージ部分 -->
<p><?php if(!empty($MSG)) echo $MSG;?></p>
 
  
  <!--画像部分 -->
<?php if(!empty($img_path)){;?>
  <img src="<?php echo $img_path;?>" alt="">
<?php } ;?>
 
 <!--アップロードボタン -->
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload_image">
  <input type="submit" class="btn_submit" value="アップロード">
</form>

  <!--変換ボタン -->
<form name="change" method="post" onclick="change_question()" >
  <input type="submit"  name="change" class="btn_change" value="変換">
</form>

<!--python起動コード -->
<?php
  if(isset($_POST["change"])){
    #$command= 'C:\Users\satoru\AppData\Local\Programs\Python C:\Users\satoru\awesome\image.py';
    exec("export LANG=ja_JP.UTF-8");
    #exec('python C:\\Users\satoru\awesome\image.py > /dev/null', $output, $result);
    exec('python '  . _DIR_ . '/image.py > /dev/null &', $output, $result);
    var_dump ($output);
    echo $result;
  }
?>

<!--手順 -->
  <p>ファイルを選択⇒アップロード⇒変換</p>

</section>
 <!--画像表示エリア -->
<section class="img-area">
 
<?php
if(!empty($img_path)){  ?>

 <img src="echo <?php $img_path;?>" alt="">
<?php
}
?>
</section>
 
</main>
 
 
</body>
</html>