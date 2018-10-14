# hw5：簡答題

## 1. 什麼是 DOM？
- DOM 的全名是 document object model ，是由瀏覽器提供、讓程式語言可以操控 html 或 xmll 的 API，也就是說雖然程式以 JavaScript 寫成，但實際是使用 DOM 來存取頁面及其元素，再用 JavaScript 來操縱 DOM
  - 例如 "`var name = document.getElementById("name");`"：
     - "`var name = document`" 的部分是 JavaScript 
     - "`.getElementById("name");`" 的部分則是 DOM

- 如果把 html 中的每個元素 tag 都看成一個節點 node，所有的節點集合起來就形成一個 DOM TREE，開發者便可透過標準化的 DOM API 對 DOM TREE 上的任意節點做結構性的存取。

## 2. 什麼是 Ajax？
- Ajax 的全名是 Asynchronous JavaScript and XML，是一種跟伺服器溝通、交換資料的技術。
- 不論是以 `GET` 或 `POST` 的方式跟 server 溝通，每送出一次 request，頁面就必須跟著換頁以刷新資料，若採用 Ajax、透過 javascript 使用 browser API 取得資料，就可以以達到不換頁方式跟 server 交換資料。

## 3. HTTP method 有哪幾個？有什麼不一樣？
- 僅向伺服器請求讀取資料，而不對儲存在特定資源 (specific resource) 的內容產生改變
  - GET：向特定資源取得資料。
  - HEAD：跟 GET 一樣，向特定資源取得資料，但只取回 HTTP header 而不包含 body 的部分。

- 不僅只向特定資源 (specific resource)請求讀取資料，同時也會改變目標資源 (target resource) 的內容或對其產生其他的影響
  - POST：向目標資源遞送資料並更新目標資源，但不會覆蓋既有的資料。
  - PUT：向目標資源遞送資料，並以遞送的 request payload 覆蓋掉目標資源中既有的資料。
  - DELETE：刪除目標資源中的資料。
  - PATCH：修改目標資源中部分資料。

- 其他
  - CONNECT：在客戶端及請求的資源 (requested resource) 之間建立雙向的通訊通道 (tunnel)。對有些代理伺服器 (proxy servers) 必須先取得授權，才能獲得權限建立通訊通道。
  - OPTIONS：client 端可以用此 method 來得知伺服器端支援的通訊工具。
  - TRACE：透過 loop-back test 來確認 client 端與 server 端之間的路徑可以正確連接，該 method 可以用來作為 debug 的工具。

- References:
  - https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods
  - https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Methods/OPTIONS
  - http://mikuweb.blogspot.com/2015/10/http-methodgetpost4method.html


## 4. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？
| method | 區別 | 例子 |
| ------ | --- | ---- | 
| `GET` | GET 送出之後，會將客戶端透過表單輸入的資訊自動做 URL encoded重新編碼，編碼完成的成串參數會以?接在原網址後面，每項資訊之間以&區隔。 | 因為以 GET 回傳的網址會是固定的，適合用來加入書籤；此外因為回傳的是整串網址，可回傳的資訊長度會受到網址長度限制，故比較不適合用來作為傳送留言板留言的方式。
| `POST` | 以 POST 送出表單之後，把送出的資訊參數放在 request body 裡面。 | 因為所有的內容都會被放在 request body 裡面，不僅提高隱私性，可傳送的資料長度也較多，故 POST 適合用來發送較為敏感的密碼，或需要較長資訊長度的留言板留言。

## 5. 什麼是 RESTful API？
  - Representational State Transfer (REST)，是一種軟體設計架構，這個架構具有明確的定義、標準化的操作方式以及格式，可使開發更有效率、更可靠，而採用 REST 架構的系統就稱為 RESTful system，以 REST 風格來開發的的 API 就稱為 RESTful API。
  - 未採用 REST 的 API 介面可能如下：（由開發者自行定義）
    - 獲取使用者資料 /getAllUsers
    - 獲取使用者資料 /getUser/1
    - 新增使用者資料 /createUser
    - 更新使用者資料 /updateUser/1
    - 刪除使用者資料 /deleteUser/1
  - 採用 REST 的 API ，充分地使用 HTTP protocol (GET/POST/PUT/DELETE)，遵循一致的規則，介面如下：
    - 獲取使用者資料 /GET /users
    - 獲取使用者資料 /GET /user/1
    - 新增使用者資料 /POST /user
    - 更新使用者資料 /PUT /user/1
    - 刪除使用者資料 /DELETE /user/1
  - 相較於未採用 REST 的 API，RESTful API 具有以下優點
    - 善用 HTTP Ver達到對資源的操作b，直觀簡潔 
    - 使用 Web 所接受的資料類型: JSON, XML, YAML 等，最常見的是 JSON
  - References:
    - https://developer.mozilla.org/en-US/docs/Glossary/REST
    - https://ithelp.ithome.com.tw/articles/10157431 

## 6. JSON 是什麼？
 - JSON 全名叫 JavaScript Object Notation，是 JavaScript 中表示物件的一種格式。
 - JSON 用於描述資料結構，有兩種結構存在：
   - 物件（object）：一個物件包含一系列非排序的 name-value pair，一個物件以 { 開始，並以 } 結束。每對 name、value 之間使用 : 分割。
   - 陣列 (array)：一個陣列是一個值 (value) 的集合，一個陣列以 [ 開始，並以 ] 結束。陣列成員之間使用 , 分割。
   - 具體的格式如下：{name:value}
     - name 的型態必須是字串 (string)。
     - value 可以是字串 (string)、數值 (number)、物件 (object)、布林值 (bool)、陣列 (array)，或一個null值。
 - References:
   - http://j796160836.pixnet.net/blog/post/30530326-%E7%9E%AD%E8%A7%A3json%E6%A0%BC%E5%BC%8F
   - https://zh.wikipedia.org/wiki/JSON
   - https://developer.mozilla.org/zh-TW/docs/Learn/JavaScript/Objects/JSON
 

## 7. JSONP 是什麼？
 - 由於受到瀏覽器「同源策略 same origin policy」的限制，不允許網頁之間跨域溝通（位於server1.example.com的網頁無法與 server2.example.com的伺服器溝通）。但 HTML 中，具有 src 屬性的元素卻是例外（例如 `<script>`、 `<img>`、 `<iframe>`）。
 - 開發者可以動態建立`<script>`標籤，透過指定其 src 屬性的方式，將 `<script>` 標籤 附加至 DOM tree 上，如此瀏覽器就會自動下載 src 所指定的指令稿。簡而言之，就是透過 Server 回傳資料與 Callback 方法名之後，Client 再去呼叫 Callback 方法接收其值。 這個繞過 same origin policy、使瀏覽器可以執行跨域抓取資料的技術就叫做 JSONP。
 - References:
   - https://zh.wikipedia.org/wiki/JSONP
   - https://openhome.cc/Gossip/JavaScript/JSONP.html
   - https://www.cnblogs.com/dowinning/archive/2012/04/19/json-jsonp-jquery.html

## 8. 要如何存取跨網域的 API？
 - 透過使用 CORS 或 JSONP 方式存取。
 - CORS (Cross-origin resource sharing) 跨來源資源共享，是針對如用戶端透過 Ajax 從 A 網域呼叫 B 網域服務的互動而定義的標準，也屬於 W3C 中推廣的標準之一。如要使用 CORS 的方法主要是透過在 HTTP Header 中加入 Access-Control-Allow-Origin 此回應標頭來讓 client 端檢查，當回應標頭含有 Access-Control-Allow-Origin 時資料將正常顯示，如未包含時，雖然呼叫成功但是資料不會顯示出來。
 - 相較於 CORS 來說，JSONP 只提供 HTTP GET 動詞可以使用，而 CORS 提供了所有 HTTP 動詞且安全性比較高。
 - Reference：https://dotblogs.com.tw/joysdw12/2013/05/25/web-api-cors
