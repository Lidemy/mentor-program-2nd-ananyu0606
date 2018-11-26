資料庫名稱：comments

Table 名稱：users
| 欄位名稱 | 欄位型態 | 說明 |
|---------|---------|------|
|  id        |  integer    | 使用者註冊序號 |
| username   | VARCHAR(16) | 使用者帳號  |
| password   | VARCHAR(16) | 使用者密碼  |
| nickname   | VARCHAR(64) | 使用者暱稱  |

Table 名稱：comments
| 欄位名稱 | 欄位型態 | 說明 |
|---------|---------|------|
|  id  |  integer  |  留言序號  |
|  parent_id  |  integer  |  id 為 0 代表為主留言，其餘則為子留言所對應之主留言 id  |
|  username  |  integer  |  留言者帳號  |
|  content  |  text  |  留言內容  |
|  created_at  |  datetime  |  留言時間  |
