## 請解釋後端與前端的差異。

### 前端：
由client端執行的操作，包括瀏覽網頁資料、對server提出request、對server輸入資訊、對client輸入的資料格式做初步驗證（例如輸入字元數目是否正確等）。
### 後段：
由server端執行的操作，根據client端提出的request提供回應，例如密碼驗證、搜尋資料庫、資料庫更新、金流交易等等。

## 假設我今天去 Google 首頁搜尋框打上：JavaScrit 並且按下 Enter，請說出從這一刻開始到我看到搜尋結果為止發生在背後的事情。

1.  client端：對google送出關鍵字「JavaScript」
2.  server端：google搜尋引擎從google資料庫中篩選出符合「JavaScript」的網頁
3.  server端：將符合條件的篩選結果回傳給client端
4.  client端：看到google回傳的所有結果


## 請列舉出 5 個 command line 指令並且說明功用

1.  cd change directory，選擇資料夾
2.  mkdir 建立新的資料夾
3.  touch 建立新的檔案或更新既有檔案的修改時間
4.  ls 查詢目的資料夾下的目錄
5.  pwd  print working directory，查詢目前所在的資料夾詳細位址
