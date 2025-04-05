/*
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
    }
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
    }
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
}*/
let addBtn=document.getElementById('addBtn')
let subBtn=document.getElementById('subBtn')
let mulBtn=document.getElementById('mulBtn')
let divBtn=document.getElementById('divBtn')
let modBtn=document.getElementById('modBtn')

let display=document.getElementById('inp')
display.value=''

let currNum='';
let prevNum=9;
let Operator=null;

function ShowOnDisplay(val){
    currNum+=val
    display.value=currNum
}

function OperatorSel(op){
    if(prevNum===null){
        prevNum=parseFloat(currNum);
        Operator=op;
        currNum='';
        display.value='';
    }
    else if(prevNum!==null){
        Operator=op;
        currNum='';
        display.value='';
    }
}
function Calculation(){
    if(prevNum===null || currNum===''){
        return
    }
    else{
    currNum=parseFloat(currNum);
    //display.value='';
    let result;
    switch(Operator){
        case '+':result=prevNum+currNum; break;
        case '-':result=prevNum-currNum; break;
        case '*':result=prevNum*currNum; break;
        case '/':result=prevNum/currNum; break;
        case '%':result=prevNum%currNum; break;
        default: break;
    }
    display.value=result;
    prevNum=parseFloat(result);
    currNum='';Operator='';
}
}

//display result
document.getElementById('equal').addEventListener('click',()=>{Calculation()})
//display input number
document.getElementById('num1').addEventListener('click',()=>ShowOnDisplay(1))
document.getElementById('num2').addEventListener('click',()=>ShowOnDisplay(2))
document.getElementById('num3').addEventListener('click',()=>ShowOnDisplay(3))
document.getElementById('num4').addEventListener('click',()=>ShowOnDisplay(4))
document.getElementById('num5').addEventListener('click',()=>ShowOnDisplay(5))
document.getElementById('num6').addEventListener('click',()=>ShowOnDisplay(6))
document.getElementById('num7').addEventListener('click',()=>ShowOnDisplay(7))
document.getElementById('num8').addEventListener('click',()=>ShowOnDisplay(8))
document.getElementById('num9').addEventListener('click',()=>ShowOnDisplay(9))
document.getElementById('num0').addEventListener('click',()=>ShowOnDisplay(0))
//add operators
addBtn.addEventListener('click',()=>{OperatorSel('+')})
subBtn.addEventListener('click',()=>{OperatorSel('-')})
mulBtn.addEventListener('click',()=>{OperatorSel('*')})
divBtn.addEventListener('click',()=>{OperatorSel('/')})
modBtn.addEventListener('click',()=>{OperatorSel('%')})
//Clear everything
document.getElementById('C').addEventListener('click',()=>{
    currNum='';
    Operator=null;
    prevNum=null;
    display.value='';
})
//delete element
document.getElementById('delBtn').addEventListener('click',()=>{
    display.value=display.value = display.value.slice(0, -1);
    prevNum=display.value;
})
//clear entry
document.getElementById('CE').addEventListener('click',()=>{
    display.value='';
    currNum='';
})
//1/x
document.getElementById('inverse').addEventListener('click',()=>{
    if(prevNum!== null){
        prevNum=(1/prevNum);
        display.value=prevNum; 
    }
    else{
        currNum=1/currNum;
        display.value=currNum;
    }
    
})
//x^2
document.getElementById('sq').addEventListener('click',()=>{
    if(prevNum!== null){
    prevNum=prevNum*prevNum;
    display.value=prevNum;
    }
    else{
        currNum=currNum*currNum;
        display.value=currNum;
    }
})
//cuberoot
document.getElementById('cbrt').addEventListener('click',()=>{
    if(prevNum!== null){
        prevNum=Math.cbrt(prevNum);
        display.value=prevNum;
        }
        else{
            currNum=Math.cbrt(currNum);
            display.value=currNum;
        }
})
//adding dec point
document.getElementById('dot').addEventListener('click', () => {
    if (currNum === '') {
        currNum = '0.';
        display.value = currNum;
    } else if (!currNum.includes('.')) {
        currNum += '.';
        display.value = currNum;
    }
});
//reverse sign
document.getElementById('revSign').addEventListener('click',()=>{
    if(prevNum!== null){
        prevNum=0-prevNum;
        display.value=prevNum;
        }
        else{
            currNum=0-currNum
            display.value=currNum;
        }
})


