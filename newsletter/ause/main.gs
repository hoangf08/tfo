// Google Apps Script 
// Hoangf 16/02/2025

// Hàm lấy các hàng cần thiết để gửi email
function getRowsToSendRakutenEmail(sheet) {
  // Tìm cột 設定(R) trong hàng 1
  const setteiColumnTitle = getColumnTitle(sheet, 1, '設定（R）');

  // lấy số các cột có chứa giá trị true
  const columnValues = sheet.getRange(setteiColumnTitle + ':' + setteiColumnTitle).getValues();
  console.log(columnValues);
  // lấy vị trí các dòng có chứa giá trị true
  const trueRows = columnValues.reduce((acc, curr, index) => {
    if (curr[0] === true) {
      acc.push(index + 1); // cộng thêm 1 vì bắt đầu từ dòng 1
    }
    return acc;
  }, []);
  console.log(trueRows);
  return trueRows;
}

// Hàm tìm tên cột từ title. ví dụ title = '設定（R）' thì trả về 'R'
function getColumnTitle(sheet, titleRow, titleName) {
  const cell = sheet.getRange(titleRow + ':' + titleRow).createTextFinder(titleName).findNext();
  const columnIndex = cell ? cell.getColumn() : null;
  if (columnIndex) {
    console.log(columnIndex);
  } else {
    console.log('Không tìm thấy cột ' + titleName);
  }
  //chuyển đổi số cột thành chữ
  const columnLetter = String.fromCharCode(64 + columnIndex);
  console.log(columnLetter);

  return columnLetter;
}

// Google Apps Script
function completeSourceCode() {
  // Tạo giao diện HTML để chọn Sheet
  const sheetNames = SpreadsheetApp.getActiveSpreadsheet().getSheets().map(sheet => sheet.getName());

  const html = `
<!DOCTYPE html>
<html lang="en">
<head>
    <base target="_top">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
    <div class="container">
        <h3>Chọn Sheet</h3>
        <select id="sheetSelect" name="sheets">
            ${sheetNames.map(name => `
                <option value="${name}">${name}</option>
            `).join('')}
        </select>
        <button onclick="submitForm()">Xác nhận</button>
    </div>
    <script type="text/javascript">
    function submitForm() {
        const select = document.getElementById('sheetSelect');
        const selectedSheet = select.value;

        if (!selectedSheet) {
            alert('Vui lòng chọn một sheet');
            return;
        }

        google.script.run
            .withSuccessHandler(function() {
                google.script.host.close();
            })
            .processSheetSelection([selectedSheet]);
}</script>
</body>
</html>
  `

  const htmlOutput = HtmlService
    .createHtmlOutput(html)
    .setTitle('Chọn Sheet')
    .setWidth(300);

  SpreadsheetApp.getUi().showModalDialog(htmlOutput, 'Chọn Sheet');
}

// Hàm xử lý khi người dùng chọn sheet
function processSheetSelection(sheetNames) {
  for (const sheetName of sheetNames) {
    const sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName(sheetName);

    // Xử lý rakuten

    // Lấy tên các cột dữ liệu
    const rakutenColumnTitle = {
      '施設番号（R）': getColumnTitle(sheet, 1, '施設番号（R）'),
      '都道府県（R）': getColumnTitle(sheet, 1, '都道府県（R）'),
      '所属エリア（R）': getColumnTitle(sheet, 1, '所属エリア（R）'),
      'プラン番号（R）': getColumnTitle(sheet, 1, 'プラン番号（R）'),
      'プラン名称（R）': getColumnTitle(sheet, 1, 'プラン名称（R）'),
      '備考（R）': getColumnTitle(sheet, 1, '備考（R）'),
      'クーポン（R）': getColumnTitle(sheet, 1, 'クーポン（R）'),
      'バナー画像（R）': getColumnTitle(sheet, 1, 'バナー画像（R）'),
      'クーポン画像（R）': getColumnTitle(sheet, 1, 'クーポン画像（R）'),
      '画像名（R）': getColumnTitle(sheet, 1, '画像名（R）'),
      'TOP画像URL（R）': getColumnTitle(sheet, 1, 'TOP画像URL（R）'),
    }
    console.log(rakutenColumnTitle);

    const trueRows = getRowsToSendRakutenEmail(sheet);

  }

  // Hiện thông báo
}


