//php 語法紀錄

<?php
echo ;
"表示輸出"
類似 return;
?>

<?php
date();
"輸出時間，後面加ymdhis就可抓取現在的時間"
ymdhis : 年月日時分秒
?>
<?php
rand(起始值；結束值);
"建立隨機整數"
?>

<?php
$_GET['東西'];
"讀取網址中'?'之後變數的值"
?>

<?php
if(){}
"條件語法"
?>

<?php
isset();
"如果有資料，有值"
?>

<?php
"在php裡面，單引號和雙引號是不一樣的，雙引號裡面是可以加入變數的"
Ex:

?>

<?php
for(起始值;結束值;設定);
"迴圈使用"
?>

<?php
$_Post[];
"讀取透過post傳輸的資料"
?>

<?php
fopen(filename, mode);
"開啟檔案"
"檔案名稱、開啟模式"
"模式分為awr:'寫入原檔'、'覆蓋'、'唯獨' "
?>

<?php
fwrite(handle, string)
"寫入檔案"
"檔案名稱，寫入內容"
?>

<?php
fclose(handle);
"關閉檔案"
"檔案名稱"
?>

<?php
fgets(handle)fg;
"檔案名稱"
"取得檔案的內容資料"
"抓了就會關閉"
?>

<?php
strlen(string);
"判斷字串長度"
?>

<?php
substr(string, start);
"取得部分字串"
?>

<?php
$_FILES["filefield"]['type'];
"表示檔案類型"
?>

<?php
$_FILES['filefield']['size'];
"表示檔案大小(以byte為單位)"
?>

<?php
$_FILES['filefield']['name'];
"表示檔案名稱"
?>

<?php
$_FILES['filefield']['tmp_name'];
"檔案站存名稱"
?>

<?php
round(val,位數)
"四捨五入"
?>

<?php
move_uploaded_file(filename, destination)
"檔案站存名稱、搬移後的路徑與檔名"
"用來上傳檔案至伺服器"
?>

<?php
file_exists(filename);
"判斷檔案是否存在"
?>

<?php
explode(delimiter, string)
"字元、目標"
"將檔案名稱根據目標將以拆開"
?>

<?php
iconv(in_charset, out_charset, str)
"原來的編碼，轉換後的編碼，要轉換的字串"
"編碼轉譯用"
"網頁讀取中文用UTF-8"
"電腦讀取中文用BIG-5"
?>

<?php
session_start(oid);
"使用session前一定要有，而且前面不能包含html"
?>

<?php
$_SESSION[];
"建立session"
?>

<?php
setcookie(檔案名稱，寫入內容，儲存時間);
"建立cookie"
?>

<?php
$_COOKIE[];
"呼叫cookie"
?>

<?php
header("location:____路徑___");
"重新導向頁面"
?>

<?php
"Session和Cookie是用來暫時儲存網友資料用的變數，其不同點如下：

Session的時效有兩個：
1.在一段時間（須看伺服器設定）與伺服器無連線的狀況之下會失效。
2.一次瀏覽時間（瀏覽器關閉後失效）

Cookie的時效：
可自行由程式設定，若無設定則為一次瀏覽時間（瀏覽器關閉後失效）

SESSION：儲存於伺服器端的個人變數（用戶無法自行清除）
COOKIE：儲存於用戶端的個人變數（用戶可以自行清除）"

?>

<?php
mysql_connect("主機名稱","帳號","密碼");
"連接主機"
?>

<?php
mysql_select_db(database_name);
"選取玉讀取的資料庫名稱"
?>

<?php
mysql_query("set names utf8");
"將資料設為utf8格式(才能讀取中文)"
?>

<?php
mysql_query("select*from資料庫名稱");
"從某資料庫中讀取所有的(*)資料表"
?>

<?php
mysql_num_rows(result);
"回傳我們的資料以幾個列"
?>

<?php
mysql_fetch_row(result);
"讀取資料表中列的資料，回傳的是一列的資料"
"很多列就有很多陣列"
?>

<?php
mysql_query("select*from資料表名稱 where 欄位名稱 = '篩選條件' ");
"篩選出'等同於'篩選條件的篩選條"
?>

<?php
mysql_query("select*from 資料表名稱 where 欄位名稱 like % '篩選條件' ")
"篩選'具有(不用全部都一樣)'篩選條件的資料"
?>

<?php
require('檔案名稱');
"引入資料"
?>

<?php
mysql_query("select*from資料表名稱 order by 欄位名稱 desc");
"依據欄位名稱排序，預設是asc(遞增排序)，若想改成地檢則在最後加上desc(遞減排序)"
?>

<?php
mysql_query("select*from資料表名稱 limit 資料索引,顯示筆數")
"資料所引的意思是從第幾筆開始，如果是limit 0 ,10 ，即表示從第一筆資料開始顯示10筆資料(也就是顯示1~10);如果是limit 10,10 ,表示從第11筆資料開始顯示10筆資料(也就是11~20)"
?>

<?php
ceil(value);
"無條件進位"
?>

<?php
mysql_query("insert into 資料表(欄位1,欄位2,.....) value ('欄位1值','欄位2值',.....)")
"將資料輸入到MySQL資料表中，資料表中有幾個欄位變項，就需要有幾組相對應的單引號"
?>

<?php
mysql_fetch_assoc(result);
"擷取某一列的資料,且根據'欄位名稱'加以擷取"
?>

<?php
mail(to, subject, message,附加訊息(寄件者));
"收件者,主旨,內容,附加訊息(寄件者)"
"php自動發信功能"
?>

<?php
fgets(handle);
"讀取檔案內容"
?>

<?php
feof(handle);
"當文字檔讀到最後的時候"
?>

<?php
while ( <= 10) {
	# code...
}
"當...則跑..."

?>
