// Google Apps Script
function completeSourceCode() {
    // Tạo giao diện HTML để chọn Sheet
    const sheetNames = SpreadsheetApp.getActiveSpreadsheet().getSheets().map(sheet => sheet.getName());
    
    const html = `
        <style>
            .container {
                padding: 20px;
                font-family: Arial, sans-serif;
            }
            select {
                width: 100%;
                padding: 8px;
                margin: 10px 0;
            }
            button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover {
                background-color: #45a049;
            }
        </style>
        <div class="container">
            <h3>Chọn Sheet</h3>
            <select id="sheetSelect">
                ${sheetNames.map(name => `<option value="${name}">${name}</option>`).join('')}
            </select>
            <button onclick="submitForm()">Xác nhận</button>
        </div>
        <script>
            function submitForm() {
                const select = document.getElementById('sheetSelect');
                google.script.run
                    .withSuccessHandler(function() {
                        google.script.host.close();
                    })
                    .processSheetSelection(select.value);
            }
        </script>
    `;

    const htmlOutput = HtmlService
        .createHtmlOutput(html)
        .setTitle('Chọn Sheet')
        .setWidth(300);
    
    SpreadsheetApp.getUi().showModalDialog(htmlOutput, 'Chọn Sheet');
}

// Hàm xử lý khi người dùng chọn sheet
function processSheetSelection(sheetName) {
    const sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName(sheetName);
    
    // Xử lý rakuten

    // Tìm cột 設定(R) trong hàng 1
    const setteiCell = sheet.getRange('1:1').createTextFinder('設定（R）').findNext();
    const setteiColumnIndex = setteiCell ? setteiCell.getColumn() : null;
    if (setteiColumnIndex) {
      console.log(setteiColumnIndex);
    } else {
      console.log('Không tìm thấy cột 設定(R)');
      return;
    }

    // Tìm cột ソースコード（R） trong hàng 1
    const sourceCell = sheet.getRange('1:1').createTextFinder('ソースコード（R）').findNext();
    const sourceColumnIndex = sourceCell ? sourceCell.getColumn() : null;
    // Tìm cột テキスト（R） trong hàng 1
    const textCell = sheet.getRange('1:1').createTextFinder('テキスト（R）').findNext();
    const textColumnIndex = textCell ? textCell.getColumn() : null;
    // Tìm cột タイトル（R） trong hàng 1
    const titleCell = sheet.getRange('1:1').createTextFinder('タイトル（R）').findNext();
    const titleColumnIndex = titleCell ? titleCell.getColumn() : null;

    //chuyển đổi số cột thành chữ
    const columnLetterSettei = String.fromCharCode(64 + setteiColumnIndex);
    const columnLetterSource = String.fromCharCode(64 + sourceColumnIndex);
    const columnLetterText = String.fromCharCode(64 + textColumnIndex);
    const columnLetterTitle = String.fromCharCode(64 + titleColumnIndex);
    console.log(columnLetterSettei);
    console.log(columnLetterSource);
    console.log(columnLetterText);
    console.log(columnLetterTitle);

    // lấy số các cột có chứa giá trị true
    const columnValues = sheet.getRange(columnLetterSettei + '3:' + columnLetterSettei + sheet.getLastRow()).getValues();
    console.log(columnValues);
    // lấy vị trí các dòng có chứa giá trị true
    const trueRows = columnValues.reduce((acc, curr, index) => {
      if (curr[0] === true) {
        acc.push(index + 3); // cộng thêm 3 vì bắt đầu từ dòng 3
      }
      return acc;
    }, []);
    console.log(trueRows);

}