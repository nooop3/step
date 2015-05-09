var xmlHttp

function show_notes() {
    var url 
    url = document.getElementById("notes_url").value
    url = escape(url)
    if (url.length == 0) {
        document.getElementById("posted_table").innerHTML = "地址为空"
        return
    }
    xmlHttp = GetXmlHttpObject() 
    if (xmlHttp == null) {
        alert("浏览器不支持请求！！！") 
        return
    }
    var post_url = "../applications/notes/add.php"
    var post_data = "url=" + url 
    post_data = post_data + "&sid=" + Math.random()
    xmlHttp.open("POST", post_url, true) 

    // 下面这两句 比较重要，缺少会导致提交的数据为空  
    xmlHttp.setRequestHeader("content-length",post_data.length);  //post提交设置项  
    xmlHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");  //post提交设置项  
      
    xmlHttp.onreadystatechange = stateChanged;  
    xmlHttp.send(post_data); // 参数在这里传进来   
}

function stateChanged() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        document.getElementById("posted_notes").innerHTML = xmlHttp.responseText
    }
}

function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch(e) {
        //Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}