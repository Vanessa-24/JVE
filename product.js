// for the qty
function decrease(el){
    var qtyText = el.parentNode.getElementsByClassName("quantity-text");
    if (Number(qtyText[0].value)-1>=1){
        qtyText[0].value = qtyText[0].value-1;
    }
}
function increase(el){
    var qtyText = el.parentNode.getElementsByClassName("quantity-text");
    var maxQty = 5;
    if (Number(qtyText[0].value)+1<=maxQty){
        qtyText[0].value = Number(qtyText[0].value)+1+"";
    }
}
