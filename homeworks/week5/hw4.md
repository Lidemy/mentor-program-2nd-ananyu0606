## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
- CHAR 與 VARCHAR 的差異：由於使用 CHAR 型態儲存資料時，MySQL 會以空白字元填補至最大儲存長度，所以無論存入的內容為何，所需的儲存空間都是固定的。固當資料內容少於最大儲存長度時，VARCHAR 將可以有效地節省空間，這是它最大的優點；但 CHAR 在檢索時擁有較佳的效率。
- VARCHAR 與 TEXT 的差別：根據查到的資料，TEXT 的特性跟 VARCHAR 一樣，都是用來儲存大量的文字資料，且兩者可儲存的最大資料長度相同。但 VARCHAR 可以控制儲存字串的最大值，TEXT 則不行，如果使用 TEXT 的 code 有漏洞，資料庫容易被寫入過大的資訊而造成風險。

- 參考資料來源：
1. https://dotblogs.com.tw/jeff-yeh/2010/11/14/19440 (認識Char/NChar/VarChar/NVarChar/Text/NText)
2. https://blog.xuite.net/javax/programmer/11946942-MySQL+%E6%89%80%E6%94%AF%E6%8F%B4%E7%9A%84%E5%90%84%E7%A8%AE%E6%AC%84%E4%BD%8D%E5%9E%8B%E6%85%8B (MySQL 所支援的各種欄位型態)
3. https://www.cnblogs.com/billyxp/p/3548540.html (MySQL之char、varchar和text的设计)


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
1. cookie 是可以透過指令產生、且存在 client 端的暫存資料。
2. cookie 在 php 的實作中可以透過 `setcookie("cookie_name", cookie_value, time() + (秒數)` 的方式來產生，並可以設定 cookie 存續的時間（以秒數為單位）。
3. 在 server 端可以 `$_COOKIE['cookiename']` 此一指令來存取存在 Client 端的 cookie 資訊，使之成為 php 可用的變數，便可存入或作為提取 Server 資料的使用變數。


## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
1. 若未對特殊標點符號做過濾，在任何輸入框中鍵入單引號或雙引號都可能會造成 sql 語法的錯誤。
2. 未對資料輸入做防護的情況下，使用者可以透過任何輸入框對資料庫輸入一些惡意的程式碼。
3. 若 cookie 的內容是一些可以輕易猜到的形式（如使用者帳戶或暱稱），且若這些簡易 cookie 是用來讀取資料庫的變數，則用戶可以輕易的在瀏覽器修改 cookie 的內容，並竄改資料的編輯身分。


