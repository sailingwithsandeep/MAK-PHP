;
/*
* author: william ning
* date: 2018.12.21
* */
$.extend({
    // Export csv file  Parameters: array
    exportCSV: function (arrayTable) {
        if (!Array.isArray(arrayTable)) {
            console.error('Error: The argument must be an array !');
            return;
        }
        var selector = arrayTable[0];
        var selectTable = arrayTable[1];
        var columns = arrayTable[2];
        var columnsArray = arrayTable[3];
        if (!Array.isArray(columnsArray)) {
            console.error('Error: The fourth argument is not an array !');
            return;
        }
        if(columns !== (columnsArray.length)){
            console.error("Error: Number of columns do not match number of columns' names !");
            return;
        }
        var columnNamesStr = '';
        for (var i = 0; i < columnsArray.length; i++){
            columnNamesStr += ',' + columnsArray[i];
        }
        columnNamesStr = columnNamesStr.substr(1) + '\n';
        var name = arrayTable[4] ? arrayTable[4] : 'download';
        // Add the delimiters  Default : seperator : '_', seperator_1 : '-'
        var seperator = arrayTable[5] ? arrayTable[5] : "-";;
        var seperator_1 = arrayTable[5] ? arrayTable[5] : "_";
        // The number of random digits
        var numberLength = arrayTable[7];
        // Get selected table data string.
        var strTotalData = getStr(selectTable, columns);
        var nowDateTime = getDateTime(seperator, seperator_1, numberLength);
        var str = encodeURIComponent(strTotalData);
        selector.href = "data:text/csv;charset=utf-8,\ufeff" + columnNamesStr + str;
        selector.download = name + seperator + nowDateTime + '.csv';

        //get all data string
        function getStr(selectTable, columns){
            var strData = '';
            var tdList = $(selectTable).find("td");
            for (var i = 0; i < tdList.length; i++) {
                var tmp = tdList.eq(i).text().replace(/(^\s*)|(\s*$)/g, "");
                var pattern = /\s\s+/g;
                if (pattern.test(tmp)) {
                    tmp = '"' + tmp.replace(pattern, "\n") + '"';
                }
                if ((i + 1) % columns == 0) {
                    strData = strData + tmp + '\n';
                } else {
                    strData = strData + tmp + ',';
                }

            }
            return strData;
        }

        //set the time format string. like: 2018_12_20-10-18-48-337619
        function getDateTime(seperator, seperator_1, numberLength) {
            var date = new Date();
            var nowMonth = date.getMonth() + 1;
            var strDate = date.getDate();
            var nowHours = date.getHours();
            var nowMinutes = date.getMinutes();
            var nowSeconds = date.getSeconds();
            var seperator = seperator ? seperator : "_";
            var seperator_1 = seperator_1 ? seperator_1 : "-";
            var numberLength = numberLength ? numberLength : 6;
            var numberString = '';
            for (var i = 1; i <= numberLength; i++) {
                numberString += '9';
            }
            var number = parseInt(numberString);
            var randomNumber = Math.floor(Math.random() * number);
            if (nowMonth >= 1 && nowMonth <= 9) {
                nowMonth = "0" + nowMonth;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var nowDateTime = date.getFullYear() + seperator + nowMonth + seperator + strDate + seperator_1 + nowHours + seperator_1 + nowMinutes + seperator_1 + nowSeconds + seperator_1 + randomNumber;
            return nowDateTime;
        }
    },
})
