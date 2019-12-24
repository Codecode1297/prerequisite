var exp='', equal,number, decimal, operator, allowSR = true;
        
function insertNum(num) {
     var textview=document.getElementById("textview"); 
     if(equal){
         exp=num;
         textview.value=exp;
         number=true;
         equal=false;
     }
     else{
         exp=textview.value +num;
         textview.value = exp;
                number=true;
            }
            if(operator) decimal = false;
        //SR('a') 
}

function insertOp(op){
    var textview=document.getElementById("textview");  
    textview.value = exp+op;
    operator=true;
    equal=false;
    allowSR=false;
}

function insertDec(){
    var textview=document.getElementById("textview");  
    if(number && !decimal){
        textview.value = exp + '.';
        decimal=false;
        operator=false;
    }
}

function equalTo(){
    var textview=document.getElementById("textview");  
    if(exp){
        exp = eval(exp);
        textview.value = exp;
        equal = true;
        decimal = false ;
        number = false;
        allowSR = true;
        //SR('a');
    }
}

function clean() {
    exp = ' ';
    var textview=document.getElementById("textview");  
    textview.value=exp;
}
    
        