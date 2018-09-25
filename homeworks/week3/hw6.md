## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
- b：使內容變粗體。
- button：創造一個可以點擊的按鈕。
- table：創造表格，< tr > 創造表格的行 (row)，一行以一組 < tr >< tr/ > 包圍、< th > 填入表頭、< td > 填入內容。

## 請問什麼是盒模型（box modal）
- 網頁設計中的每個元素 element 都可視為一個盒子 box，可針對元素的四周設定元素的寬 width 、高 height、元素與邊框的距離 padding、邊框 border，乃至於元素與元素之間的間距 margin，以及元素在網頁中的定位。但若元素的屬性是 inline，則預設無法設定寬高及上下 margin。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
- inline：屬於 inline 的元素稱為「行內元素」，在空間上僅佔有字元的部分，例如< span > 即屬於行內元素之一。一行內可以有多個行內 inline 元素，但無法設定元素的寬 width、高 height，以及上、下的 margin。

- block：屬於 block 的元素會佔滿整行，一行裡只能存在一個 block 。若對行內 inline 元素作 display: block 的設定，就可以使行內元素轉為區塊元素，並進一步設定完整的上下 margin 以及元素寬、高，但原本位在同一行的行內元素，就會被排擠到下一行去。

- inline-block：若對行內 inline 元素作 display: inline-block 的設定，行內元素即可做 block 的 margin 及寬、高設定，同時亦可允許其他的行內元素並列在於同一行裡。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
- static：static 是預設值，套用 position: static 的元素屬於「不會被特別定位」的元素，會照著瀏覽器預設的配置自動排版在頁面上。套用 static 以外的屬性值都算是「可以被定位」的元素。

- relative：套用 position: relative; 的元素，可以設定 top 、 right 、 bottom 和 left 等屬性，使該元素位置以相對於原始 static 的位置做出調整。同時不管這些「相對定位」過的元素如何在頁面上移動位置或增加了多少空間，都不會影響或排擠其他元素所佔有的位置。

- absolute：套用 position: absolute; 的元素會向父層尋找最近的 position 的設定，並以其盒模型最左上角（不包含 margin 及 border 的寬度）為參考點做該元素定位的調整。如果其父層中並沒有「可以被定位」的元素的話，那麼這個元素的定位就是相對於該網頁 < body > 元素中，最左上角的絕對位置，看起來就是這張網頁的絕對位置一樣，當網頁頁面捲動時，該元素也會隨著頁面捲動。

- fixed：套用 position: fixed; 的元素，會固定顯示於瀏覽器畫面上的特定位置，完全不受瀏覽時頁面捲動的影響，無論頁面如何捲動，該元素仍會固定顯示於相對瀏覽器左上角的固定定位。和 relative 一樣，fixed 可以使用 top 、 right 、 bottom 和 left 等屬性來定位。



