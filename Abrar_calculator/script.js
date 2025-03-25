let display = document.getElementById('inp');
let currNum = '';
let prevNum = null;
let operator = null;

function showOnInp(value) {
    currNum += value;
    display.value = currNum;
}

function Operator(op) {
   /*if (currNum == '' && prevNum==null){
        console.log('current box empty executes')
        return;
    }*/
    if(prevNum ==null){
        //
    prevNum = parseFloat(currNum);
    currNum = '';
    operator = op;
    display.value=''
    }
    else if(prevNum !=null){
        //console.log('prev!=null block executes')
        currNum = '';
        operator = op;
        display.value='';
        }

}

function Calculation() {
    /*if (prevNum == null || currNum == '') {
        return;
    }*/
    //else{
        //console.log(`Second prevNum val:${prevNum}`);
    display.value=''
    currNum= parseFloat(currNum);
    let result;
    switch (operator) {
        
        case '+': result = prevNum + currNum; break;
        case '-': result = prevNum -  currNum; break;
        case '*': result = prevNum * currNum; break;
        case '/': 
            if (currNum === 0) {
                result = 'Error';
            } else {
                result = prevNum / currNum;
            }
            break;
        default: return;
    }
    prevNum= parseFloat(result);
    console.log(` prevNum val:${prevNum}`);
    currNum = '';
    operator = null;
    display.value = result;
//}
}

function ClearDisplay() {
    currNum = '';
    prevNum = null;
    operator = null;
    display.value = '';
}
function InverseSign(){
    if(prevNum !=null){
    if(display.value>0){
        display.value='-'+display.value
        prevNum=parseFloat(display.value)
    }
    else if(display.value<0){
        display.value=display.value.slice(1)
        prevNum=parseFloat(display.value)
    }
}else{
    return
}
}