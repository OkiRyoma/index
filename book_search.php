<?php
require_once "FuncSelectSql.php";
require_once "FuncMakePulldown.php";
if(isset($_GET['re'])){
  $_GET['book_number'] = "";
  $_GET['book_name'] = "";
  $_GET['author'] = "";
  $_GET['category'] = "";
  $_GET['soto'] = "";
  $_GET['jun'] == "";
  $flg = 1;
}else{
  $flg = 0;
}
if(isset($_GET['book_number']) or isset($_GET['book_name']) or isset($_GET['author']) or isset($_GET['category'])){
  if($_GET['book_number'] == '' and $_GET['book_name'] == '' and $_GET['author'] == '' and $_GET['category'] == ''){
    $sql = "SELECT * FROM books"; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
  }
  elseif($_GET['book_number'] != '' and $_GET['book_name'] == '' and $_GET['author'] == '' and $_GET['category'] == ''){ //書籍番号のみ
    $num = (String)$_GET['book_number'];
    $num = $_GET['book_number']."%";
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' " ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['book_name'] != '' and $_GET['book_number'] == '' and $_GET['author'] == '' and $_GET['category'] == ''){ //書籍名のみ
    $book_name = "%".$_GET['book_name']."%";
    $sql = "SELECT * FROM books WHERE book_name like '$book_name'"; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['author'] != '' and $_GET['book_name'] == '' and $_GET['book_number'] == '' and $_GET['category'] == ''){ //著者のみ
    $author = "%".$_GET['author']."%";
    $sql = "SELECT * FROM books WHERE author like '$author'";
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
  }elseif($_GET['book_number'] != '' and $_GET['book_name'] != '' and $_GET['author'] == '' and $_GET['category'] == ''){ //書籍番号と書籍名
    $num = (String)$_GET['book_number']."%";
    $book_name = "%".$_GET['book_name']."%";
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and book_name like '$book_name'" ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['book_name'] != '' and $_GET['author'] != '' and $_GET['book_number'] == '' and $_GET['category'] == ''){ //書籍名と著者
    $author = "%".$_GET['author']."%";
    $book_name = "%".$_GET['book_name']."%";
    $sql = "SELECT * FROM books WHERE book_name like '$book_name' and author like '$author'" ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['book_number'] != '' and $_GET['book_name'] == '' and $_GET['author'] != '' and $_GET['category'] == ''){ //書籍番号と著者
    $num = (String)$_GET['book_number']."%";
    $author = "%".$_GET['author']."%";
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and author like '$author'" ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
  }elseif($_GET['book_number'] != '' and $_GET['book_name'] != '' and $_GET['author'] != '' and $_GET['category'] == ''){ //書籍番号と著者と書籍名
    $num = (String)$_GET['book_number']."%";
    $author = "%".$_GET['author']."%";
    $book_name = "%".$_GET['book_name']."%";
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and author like '$author' and book_name like '$book_name'" ;
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
    $sql2 = "SELECT * FROM books WHERE book_number LIKE '$num' and author like '$author' and book_name like '$book_name'";

  }elseif($_GET['category'] != '' and $_GET['book_name'] == '' and $_GET['author'] == '' and $_GET['book_number'] == ''){ //かてごりのみ
    $cat = $_GET['category'];
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE category = $cat" ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
  }elseif($_GET['category'] != '' and $_GET['author'] != '' and $_GET['book_name'] == '' and $_GET['book_number'] == ''){ //かてごりと著者
    $cat = $_GET['category'];
    $author = "%".$_GET['author']."%";
    $stmt = FuncSelectSql($sql3);
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE author like '$author' and category = $cat";
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['category'] != '' and $_GET['author'] == '' and $_GET['book_name'] != '' and $_GET['book_number'] == ''){ //かてごりとなまえ
    $cat = $_GET['category'];
    $book_name = "%".$_GET['book_name']."%";
    $stmt = FuncSelectSql($sql3);
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE book_name like '$book_name' and category = $cat";
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['category'] != '' and $_GET['author'] == '' and $_GET['book_name'] == '' and $_GET['book_number'] != ''){ //かてごりとばんごう
    $cat = $_GET['category'];
    $num = (String)$_GET['book_number']."%";
    $stmt = FuncSelectSql($sql3);
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and category = $cat";
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);

  }elseif($_GET['book_number'] != '' and $_GET['book_name'] != '' and $_GET['author'] == '' and $_GET['category'] != ''){ //書籍番号とカテゴリと書籍名
    $num = (String)$_GET['book_number']."%";
    $cat = $_GET['category'];
    $author = "%".$_GET['author']."%";
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and category = $cat and book_name like '$book_name'" ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
   // echo "書籍番号とカテゴリと書籍名";
  }elseif($_GET['book_number'] != '' and $_GET['book_name'] == '' and $_GET['author'] != '' and $_GET['category'] != ''){ //書籍番号とカテゴリと著者
    $num = (String)$_GET['book_number']."%";
    $cat = $_GET['category'];
    $author = "%".$_GET['author']."%";
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and category = $cat and author like '$author'" ; 
    $sql= soto($_GET['soto'],$_GET['jun'],$sql);
    $stmt = FuncSelectSql($sql);
   // echo "書籍番号とカテゴリと著者";
  }elseif($_GET['book_number'] == '' and $_GET['book_name'] != '' and $_GET['author'] != '' and $_GET['category'] != ''){ //書籍番号とカテゴリと著者
    $cat = $_GET['category'];
    $book_name = "%".$_GET['book_name']."%";
    $author = "%".$_GET['author']."%";
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE book_name like '$book_name' and category = $cat and author like '$author'" ;     
    $stmt = FuncSelectSql($sql);
   // echo "書籍名と著者とカテゴリ";
   $sql= soto($_GET['soto'],$_GET['jun'],$sql);
  }elseif($_GET['book_number'] != '' and $_GET['book_name'] != '' and $_GET['author'] != '' and $_GET['category'] != ''){ //書籍番号とカテゴリと著者
    $cat = $_GET['category'];
    $num = (String)$_GET['book_number']."%";
    $book_name = "%".$_GET['book_name']."%";
    $author = "%".$_GET['author']."%";
    $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
    $stmt4 = FuncSelectSql($sql4);//検索数
    $sql = "SELECT * FROM books WHERE book_number LIKE '$num' and book_name like '$book_name' and category = $cat and author like '$author'" ;     
    $stmt = FuncSelectSql($sql);
   // echo "番号と書籍名と著者とカテゴリ";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <title>書籍検索</title>
</head>
<body>
    <h1><div>検索</div></h1>
    <form action="" method="GET">
      <table>
        <tr>
          <td>
            <label>書籍番号</label>
          </td>
          <td>
            <input type="number" name="book_number" /><br>
          </td>
        </tr>
        <tr>
          <td>
            <label>書籍名</label>
          </td>
          <td>
            <input type="text" name="book_name" /><br>
          </td>
        </tr>
        <tr>
          <td>
            <label>著者名</label>
          </td>
          <td>
            <input type="text" name="author" /><br>
          </td>
        </tr>
        <tr>
          <td>
            <?php
              echo "カテゴリ";
            ?>
          </td>
          <td>
            <?php
              FuncMakePulldown("category",1);
            ?>
          </td>
        <tr>
          <td>
		        <label for="ソート">ソート</label>
          </td>
          <td>
          <select name="soto">
              <option value="">---</option>
              <option value="1">書籍番号</option>
              <option value="2">タイトル</option>
              <option value="3">著者</option>
              <option value="4">カテゴリ</option>
          </select>
              <select name="jun">
              <option value="">---</option>
              <option value="1">昇順</option>
              <option value="2">降順</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="検索" />
          </td>
          <td>
            <input type="submit"  name ="re" value="リセット" />
          </td>
        </tr>
      </table>
    </form>
    <br>
    <button type="button" onclick="location.href='ranking.php'">
    書籍・利用者ランキングへ
</button>
    <p>
      検索結果：
      <?php
        if(isset($_GET['book_number']) or isset($_GET['book_name']) or isset($_GET['author']) or isset($_GET['category'])){
          if($flg==0){
            echo count($stmt);
            $cnt = count($stmt);
          }
        }
      ?>
    </P>
    <br>
    <div style="height:500px; width:470px; overflow-y:scroll;">
    <table class="sticky" border="1">
      <thead class="fixed">
        <tr>
          <th>書籍番号</th>
          <th>タイトル</th>
          <th>著者名</th>
          <th>カテゴリ</th>
          <th>書籍詳細
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($_GET['book_number']) or isset($_GET['book_name']) or isset($_GET['author']) or isset($_GET['category'])){
            if($flg == 0){
              $stmt = FuncSelectSql($sql);
              if($_GET['category'] != ''){
                $stmt4 = FuncSelectSql($sql4);
              }
              foreach($stmt as $stmt){
                $id = $stmt["book_number"];
                //$stmt4 = FuncSelectSql($sql4);
                echo '<tr>
                        <td>'.
                          $stmt["book_number"].'
                        </td>
                        <td>'.
                          $stmt["book_name"].'
                        </td>
                        <td>'.
                          $stmt["author"].'
                        </td>
                        <td>';
                        if($_GET["category"] != ''){
                          foreach($stmt4 as $stmt4){
                            echo $stmt4['code_name'];
                            $stmt4 = FuncSelectSql($sql4);

                          }
                        }else{
                          $cat = $stmt["category"];
                          $stmt = FuncSelectSql($sql);
                          //echo $cat;
                          $sql4 = "SELECT * FROM code_types WHERE code_type = 1 and code = $cat" ; //検索数
                          $stmt4 = FuncSelectSql($sql4);//検索数
                          foreach($stmt4 as $stmt4){
                            echo $stmt4['code_name'];
                            $stmt4 = FuncSelectSql($sql4);
                          }
                        }
                        echo"
                        </td>
                        <td>
                          <a href='detail.php?id=".$id."'>書籍詳細</a>
                        </td>
                      </tr>";
                }
              }
            }
        ?>
      </tbody>
    </table>
  </div>      
</body>
</html>


<!-- 関数エリア -->
<?php
function soto($soto,$jun,$sql){
  if($soto != "" and $jun != ""){
    if($soto == 1){
      if($jun == 1){
        $sql = $sql." ORDER BY book_number ASC";
      }else{
        $sql = $sql." ORDER BY book_number DESC";
      }
    }if($soto == 2){
      if($jun == 1){
        $sql = $sql." ORDER BY book_name ASC";
      }else{
        $sql = $sql." ORDER BY book_name DESC";
      }
    }if($soto == 3){
      if($jun == 1){
        $sql = $sql." ORDER BY author ASC";
      }else{
        $sql = $sql." ORDER BY author DESC";
      }
    }if($soto == 4){
      if($jun == 1){
        $sql = $sql." ORDER BY category ASC";
      }else{
        $sql = $sql." ORDER BY category DESC";
      }
    }
  }
  return $sql;
  }
?>
<style>
th{
    position: sticky;
    top: 0;
    left: 0;
    background: #FFFF;
}
td,th{
  white-space:nowrap;
}
</style>