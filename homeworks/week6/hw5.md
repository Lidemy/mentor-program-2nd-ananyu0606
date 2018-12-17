## 請說明 SQL Injection 的攻擊原理以及防範方法
- 攻擊原理：
  - 由於 SQL query 命令可直接對資料庫做查詢、插入、更新、刪除等動作，在 local 與 server 端互動的過程中，server 端難免需要直接取用 local 端輸入的資料作為 query 的依據（例如開放予使用者自行填入的帳號、密碼或留言等欄位），故如未對 local 端輸入的內容加以防範，便容易被注入惡意程式碼，直接對資料庫造成影響。
  - 在命令串 SQL query 中傳入的每個字串參數都是用引號字元所包起來，query 裡的各項條件以分號字元作區別，且 query 中可以可以插入註解。因此如果在組合 SQL query 時，未針對引號字元作跳脫處理的話，攻擊者便在可輸入的欄位中，透過插入單、雙引號、分號或註解符號的方式來改變、結束或增加 SQL query 的條件式內容，從而影響資料庫的讀寫或存取。

- 防範方法：
使用 prepare statement 來將所有輸入的內容「參數化」，亦即輸入的內容即使包括引號或分號，也只會被視為是一串參數，而非可解析並執行的程式碼，以此來可阻絕惡意程式碼的攻擊。

- 例子：（Reference: https://zh.wikipedia.org/wiki/SQL%E8%B3%87%E6%96%99%E9%9A%B1%E7%A2%BC%E6%94%BB%E6%93%8A ）

    某個網站的登入驗證的SQL查詢程式碼為
`strSQL = "SELECT * FROM users WHERE (name = '" + userName + "') and (pw = '"+ passWord +"');"`

    惡意填入
`userName = "1' OR '1'='1";` 以及 `passWord = "1' OR '1'='1";`

    導致原本的SQL字串被填為
`strSQL = "SELECT * FROM users WHERE (name = '1' OR '1'='1') and (pw = '1' OR '1'='1');"`

    實際上執行的SQL命令變成：
`strSQL = "SELECT * FROM users;"`

    因此達到無帳號密碼，亦可登入網站。故SQL隱碼攻擊被俗稱為駭客的填空遊戲。

## 請說明 XSS 的攻擊原理以及防範方法
- XSS(Cross-site Scripting)
- 攻擊原理：
  - 最常見的漏洞因為網站中的輸入欄位（例如搜尋或留言等區塊）可以被插入惡意字元，像是 `< > / " ' ;` ， XSS 攻擊者便可進一步立用惡意程式碼（最常見是Javascript），將惡意的程式碼輸入到網頁，例如 "`<script>alert('XSS')</script>`"。由於此類攻擊是屬於前端的範疇，程式碼是在使用者開啟網站的同時才執行或渲染，無防備的使用者在開啟網頁的瞬間，就會被惡意程式碼導向特定網站，甚至在無意間被竊取 cookie 等登入資訊。
  - 常見的攻擊流程是「惡意人士修改網頁內容，誘使使用者點擊後，在使用者不知情的情況下回傳資料至惡意人士的電腦」。惡意人士會在第三方網站，如 pchome、google 進行XSS攻擊，再利用社交工程誘使受害者點擊 URL 連線到已受到 XSS 攻擊的網頁，惡意人士便可以利用` <script>alert(document.cookie)</script>` 等方式讀取受害者的 cookies，或進一步將使用者資料傳回惡意人士電腦，再以得到的 cookies 偽造使用者的身份。

- 常用的XSS攻擊手段和目的：
  - 盜用 cookie，取得敏感資訊。
  - 利用植入Flash，通過 crossdomain 權限設定進一步取得更高權限；或者利用 Java 等得到類似的操作。
  - 利用 iframe、 frame、 XMLHttpRequest 或上述 Flash 等方式，以（被攻擊）用戶的身分執行一些管理動作，或執行一些一般的如發微博、加好友、發私信等操作。
  - 利用可被攻擊的域受到其他域信任的特點，以受信任來源的身分請求一些平時不允許的操作，如進行不當的投票活動。
  - 在瀏覽量極大的一些頁面上的 XSS 可以攻擊一些小型網站，實現 DDoS 攻擊的效果。

- 防範方法：
  - 在 local 端應定期更新瀏覽器，確保瀏覽器可以有效阻絕惡意程式碼的執行。
  - 在 server 端，如為 php，可以 `htmlspecialchars()` 的功能來跳脫特殊字元，讓惡意輸入的程式碼被判讀為純粹的字串後再輸出到瀏覽器上，而非可執行的程式碼或可引發攻擊的 html。

- References：
  - https://blog.davidh83110.com/%E8%B3%87%E8%A8%8A%E5%AE%89%E5%85%A8/%E9%A7%AD%E5%AE%A2%E6%8A%80%E8%A1%93/owasp%20top10/2016/10/10/xss.html XSS (Cross-Site Scripting) 跨站腳本攻擊簡介和實作
  - https://zh.wikipedia.org/wiki/%E8%B7%A8%E7%B6%B2%E7%AB%99%E6%8C%87%E4%BB%A4%E7%A2%BC wiki 跨網站指令碼
  - https://mp.weixin.qq.com/s/kWxnYcCTLAQp5CGFrw30mQ 前端安全系列之一：如何防止XSS攻擊
  - https://hkitblog.com/%E7%94%9A%E9%BA%BC%E6%98%AF-xss%EF%BC%9F%E7%B0%A1%E4%BB%8B%E9%BB%91%E5%AE%A2%E5%B8%B8%E7%94%A8%E6%94%BB%E6%93%8A%E6%8A%80%E5%80%86/ 甚麼是 XSS？簡介黑客常用攻擊技倆

## 請說明 CSRF 的攻擊原理以及防範方法
- CSRF (Cross Site Request Forgery，跨站請求偽造)
- 在不同的 domain 底下，卻偽造出「使用者本人發出的 request」。其攻擊原理是利用瀏覽器儲存 cookie 的機制，當使用者發送 request 給某個網域，就會把與該網域關聯的 cookie 一起帶上去，如果使用者是登入狀態，那這個 request 就理所當然包含了他的資訊（例如說 session id），使得 request 看起來就像是使用者本人發出的。當攻擊者提供一個表面上與該網域無關的按鈕（例如「心理測驗」），實際上卻埋設能夠觸發該網域的程式碼，例如從某惡意網站，假裝是心理測驗誘導使用者點擊，讓點擊者透過 `get` 方式送出的 request：
- 以下兩種方式都會讓點擊者雖然是在測驗的網站中瀏覽，但在點擊「開始測驗」的同時，向 `vulnerablesite.com` 送出 `delete?id=3` 的 request，此時若點擊者尚未從 `vulnerablesite.com` 登出，送出的 request 自然仍帶有原始的登入資訊，如果 `vulnerablesite.com` 未設有防禦機制，點擊者便在點擊「開始測驗」的瞬間執行了 `delete?id=3`。
     - `<a href='https://vulnerablesite.com/delete?id=3'>開始測驗</a>`
     - `<img src='https://vulnerablesite.com/delete?id=3' width='0' height='0' />`
`<a href='/test'>開始測驗</a>`

- 防範方法
   1. 檢查 header 的 Referer：檢查發出 request 的 domain 是否與被攻擊的網站相同。
   2. 加上圖形驗證碼或簡訊驗證碼：驗證碼是發給登入者而非攻擊者，攻擊者無法取得驗證碼就無法發動攻擊。
   3. 用 token 來辨識發出 request 的 domain 是否與被攻擊的網站相同，當攻擊發生的時候只要比對這組 token 就可以判定 request 是從哪個 domain 發出來的。
      - 由 server 產生 token 並存在 server 上：在原始網站上 submit 的 from 中加入 hidden 欄位，填入由 server 隨機產生的 CSRF token 並將這組 token 存入 sever 中。
      - 由 server 產生 token 並存在 cookie 上 (Double Submit Cookie)：在原始網站上 submit 的 from 中加入 hidden 欄位，填入由 server 隨機產生的 CSRF token 並將這組 token 存入 cookie 中。
      - 由 client 端產生 token 並存在 request header 上 (client side 的 Double Submit Cookie)：由 client 端自行產生 token 並存在 request header 中。
   4. browser 本身的防禦： Chrome 的 SameSite cookie 功能。
- Reference：https://blog.techbridge.cc/2017/02/25/csrf-introduction/ 讓我們來談談 CSRF

## 請舉出三種不同的雜湊函數
- 雜湊演算法的基礎原理：將資料（如一段文字）運算變為另一固定長度值（雜湊值），且無法從雜湊值逆向推導出原輸入的值，只能透過雜湊表查表的方式來查詢雜湊值對應的輸入值。
  1. MD5：可以產生出一個 128 位元的雜湊值，但已被證實存在弱點，可以被加以破解且無法防止碰撞（collision），因此不適用於安全性認證。目前較廣泛使用在檢驗檔案內容是否一致，例如，伺服器預先提供一個 MD5 校驗和，用戶下載完檔案以後，用 MD5 演算法計算下載檔案的MD5校驗和，經由檢查這兩個校驗和是否一致，就能判斷下載的檔案是否出錯。
  2. SHA-2：可以產生出一個 256 位元的雜湊值，是最廣泛使用的密碼雜湊函式之一。
  3. HAVAL：可以依據使用者需求產生 128、160、192、224、256 等位元組合的雜湊值，但該函式已於 2004 年被破解。

- References：
  - https://zh.wikipedia.org/wiki/%E6%95%A3%E5%88%97%E5%87%BD%E6%95%B8
  - https://en.wikipedia.org/wiki/HAVAL
  - https://zh-yue.wikipedia.org/wiki/%E5%AF%86%E7%A2%BC%E9%9B%9C%E6%B9%8A%E5%87%BD%E6%95%B8

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
  - session：由 server 生成的一組 token，可用來辨識使用者的登入身分，生成的 session token 可以存在 server 或 cookie 中，並在每次使用者都入的時候帶入網站。
  - cookie：暫存於 client 端瀏覽器中的使用者資訊，儲存的內容可包含前述的 session token 或使用者的瀏覽偏好（如語言或幣值）。

## `include`、`require`、`include_once`、`require_once` 的差別
  - include：引不到檔案會出現錯誤息，但程式不會停止。
  - require：引不到檔案會出現錯誤息，且程式會停止執行。
  - include_once、require_once(xxx.php)：如果某段程式碼中已經同一份檔案中被引入過一次，就不再重複引入，可避免資源的浪費。