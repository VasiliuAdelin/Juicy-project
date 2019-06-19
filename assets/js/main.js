const loadNumberOfItems = _ => {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("numberOfItems").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getNumberOfItems.php?total=true", true);
    xmlhttp.send();
}
