function handler(id) {
    var element = document.getElementById(id);
    if (id == 'byRange') {

        document.getElementById('PriceFrom').disabled = false;
        document.getElementById('PriceTo').disabled = false;
        document.getElementById('Name').disabled = true;
        document.getElementById('PriceFrom').required = true;
        document.getElementById('PriceTo').required = true;
        document.getElementById('Name').required = false;





    } else {
        document.getElementById('PriceFrom').disabled = true;
        document.getElementById('PriceTo').disabled = true;
        document.getElementById('Name').disabled = false;
        document.getElementById('PriceFrom').required = false;
        document.getElementById('PriceTo').required = false;
        document.getElementById('Name').required = true;



    }

}
