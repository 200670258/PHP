<?php
    // 關閉錯誤訊息 + 啟動 Session
    error_reporting(0);
    session_start();
    // 檢查登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 連結資料庫   
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 更新使用者密碼(POST傳入 id + pwd)
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
            // 回到使用者列表
            echo "修改成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>