/* // Henter den lagrede handlekurven fra lokal lagring
let cart = localStorage.getItem("lagretHandlekurv")

// Definerer variabler for ulike skoprodukter
let shoes = "Nike Jordan 1 kr 1299" 
let shoes1 ="Nike Airforce 1 kr 1199"
let shoes2 =  "Nike Vapormax Plus kr 1999"
let shoes3 = "Nike Air Jordan 4 kr 2499"
let shoes4 = "Adidas Yeezy Boost 350 kr 2199"
let shoes5 = "Adidas Yeezy Foam kr 1499"
let shoes6 = "Adidas Yeezy Slides kr 1399"
let shoes7 = "Adidas Originals Nmd kr 1299"

// Funksjoner for å legge til sko i handlekurven
function buyShoes() {
    cart += shoes + "|"
    localStorage.setItem("lagretHandlekurv", cart)
}

function buyshoes1() {
    cart += shoes1 + "|"
    localStorage.setItem("lagretHandlekurv", cart)
}

function buyshoes2() {
    cart += shoes2 + "|"
    localStorage.setItem("lagretHandlekurv" , cart)
}

function buyshoes3() {
    cart += shoes3 + "|"
    localStorage.setItem("lagretHandlekurv" , cart)
}
function buyshoes4() {
    cart += shoes4 + "|"
    localStorage.setItem("lagretHandlekurv" , cart)
}
function buyshoes5() {
    cart += shoes5 + "|"
    localStorage.setItem("lagretHandlekurv" , cart)
}
function buyshoes6() {
    cart += shoes6 + "|"
    localStorage.setItem("lagretHandlekurv" , cart)
}
function buyshoes7() {
    cart += shoes7 + "|"
    localStorage.setItem("lagretHandlekurv" , cart)
}


// Funksjon for å vise innholdet i handlekurven på nettsiden
function showCart () {
     // Henter HTML-elementet med id "cart" og oppdaterer innholdet
    document.getElementById("cart").innerHTML = localStorage.lagretHandlekurv.split("|").join("<br>");
}

// Funksjon for å tømme handlekurven
function emptyCart() {
    // Nullstiller handlekurvvariabelen og oppdaterer lokal lagring og visning på nettsiden
    cart = "";
    localStorage.setItem("lagretHandlekurv", cart)
    showCart()
}


// Henter HTML-elementet med id "subtotal"
let subtotal = document.getElementById("subtotal")
// Variabel for å holde totalprisen for elementene i handlekurven
var totalprice = 


// Beregner totalprisen ved å iterere over hvert element i handlekurven
localStorage.lagretHandlekurv.split("|").slice(0, -1).forEach(item => {
      totalprice += parseInt(item.split("kr ")[1])
});
// Setter innerHTML til subtotal-elementet for å vise totalprisen
subtotal.innerHTML =  totalprice + " kr" 
 */