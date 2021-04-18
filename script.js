

function display(siteID){

    switch (siteID.toString()) {
        case "addProd":
            document.getElementById("display").src = 'addProduct.php';
            break;
        case "handleOrder":
            document.getElementById("display").src= 'handleOrders.php';
            break;
        case "login":
            document.getElementById("display").src= 'login.php';
            break;
        case "reg":
            document.getElementById("display").src= 'register.php';
            break;
        case "resetPass":
            document.getElementById("display").src= '';
            break;
        case "search":
            document.getElementById("display").src= 'search.php';
            break;
        case "dayMeal":
            document.getElementById("display").src= '';
            break;
        case "updateProd":
            document.getElementById("display").src= '';
            break;
        case "aboutUs":
            document.getElementById("display").src= 'AboutUs.php';
            break;
        case "contactUs":
            document.getElementById("display").src= 'contactUs.php';
            break;
        case "cart":
            document.getElementById("display").src= 'viewCart.php';
            break;
        case "logout":
            document.getElementById("display").src= 'logout.php';
            break;
    }

}

function myFunction(myDiv) {
    var x = document.getElementById(myDiv.toString());
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
