// for the qty
function decrease(el){
    var qtyText = el.parentNode.getElementsByClassName("quantity-text");
    if (Number(qtyText[0].value)-1>=1){
        qtyText[0].value = qtyText[0].value-1;
    }
}
function increase(el){
    var maxQty = el.dataset.maxqty;
    var qtyText = el.parentNode.getElementsByClassName("quantity-text");
    if (Number(qtyText[0].value)+1<=maxQty){
        qtyText[0].value = Number(qtyText[0].value)+1+"";
    }else{
        alert("You have reach the max stock!");
    }
}
