let xml = new XMLHttpRequest();
let url = "http://localhost/social_network/index.php";

xml.open("GET", url)

xml.onreadystatechange = function () {
    if (xml.readyState === 4 && xml.status === 200) {
        console.log(JSON.parse(xml.responseText))
    }
}

xml.send()