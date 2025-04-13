let dnamePara=document.getElementById('DnameP')
let dnameTB=document.getElementById('DnameID')
let demailPara=document.getElementById('DemailP')
let demailTB=document.getElementById('Demail')
let dDobPara=document.getElementById('DoBP')
let dDob=document.getElementById('Ddob')
let dCityPara=document.getElementById('DCityP')
let dCity=document.getElementById('DCity')
let dPassP=document.getElementById('DpassP')
let dPass=document.getElementById('Dpass')
let dconpassPara=document.getElementById('DConpassP')
let dconPass=document.getElementById('Dconpass')
let dIDfilePara=document.getElementById('IDfileP')
let dIDfile=document.getElementById('IDfile')
let dAddInfoPara=document.getElementById('AddInfoP')
let dAddInfo=document.getElementById('AddInfoTA')
let dmnoPara=document.getElementById('DmnoP')
let dmno=document.getElementById('Dmno')
let tos=document.getElementById('tos')
let tosSpan=document.getElementById('tosSpan')
let donType=document.getElementsByName('Dontype')
let donTypeP=document.getElementById('DonTypeP')
let recper=document.getElementById('Recper')
let recperP=document.getElementById('recperP')
let payMethod=document.getElementsByName('Paymethod')
let payMethodP=document.getElementById('PaymethodP')
let payMethodSelected = false;
let donTypeSelected = false;


//funcs



dnameTB.addEventListener('input', () => {
    if (dnameTB.value === '') {
        dnamePara.innerHTML = '<i> *field cannot be empty</i>';
    } else if (/\d/.test(dnameTB.value)) {
        dnameTB.value = dnameTB.value.replace(/\d/g,''); 
        dnamePara.innerHTML = '<i>Numbers are not allowed</i>';
    } else {
        dnamePara.innerHTML = '';
    }
});


demailTB.addEventListener('input',()=>{
    if (demailTB.value===''){
        demailPara.style.color='red'
        demailPara.innerHTML='<i> *field cannot be empty</i>'
    }
    else if((/\w+@gmail.com/).test(demailTB.value)){
        demailPara.innerHTML='email format correct'
        demailPara.style.color='green'

    }else if(!(/\w+@gmail.com/).test(demailTB.value)){
        demailPara.innerHTML='email format not correct'
        demailPara.style.color='red'
    }
    else{
        demailPara.innerHTML=''
    }
})
dDob.addEventListener('input',()=>{
    let dateLimit=new Date('2015-01-01')
    if (dDob.value===''){
        dDobPara.innerHTML='<i> *field cannot be empty</i>'
    }
    else if(new Date(dDob.value)>dateLimit){
        dDobPara.innerHTML='<i>Please enter a valid date before 2015</i>'
        dDob.value=''
    }
    else{
        dDobPara.innerHTML=''
    }
})
dCity.addEventListener('input',()=>{
    if(dCity.value===''){
        dCityPara.innerHTML="<i> *field cannot be empty</i>"
    }else{
        dCityPara.innerHTML=''
    }
})
dPass.addEventListener('input',()=>{
    if(dPass.value===''){
        dPassP.innerHTML="<i> *field cannot be empty</i>"
    }
    else if(!dPass.value.length>=8 || !(/[^A-Za-z0-9]+/g).test(dPass.value) || !(/\d+/).test(dPass.value)){
        dPass.style.border=''
        dconPass.style.border=''
        dPassP.innerHTML='<i>must be minimum 8 chars long,at least one special char and number</i>'
    }
    else{
        dPassP.innerHTML=''
    }
})
dconPass.addEventListener('input',()=>{
    if(dconPass.value===''){
        dconpassPara.innerHTML="<i> *field cannot be empty</i>"
    }
    else if(dconPass.value !== dPass.value || !dPass.value.length>=8 || !(/[^A-Za-z0-9]+/g).test(dPass.value) || !(/\d+/).test(dPass.value)){
        dconpassPara.style.color='red'
        dPass.style.border='2px solid red'
        dconPass.style.border='2px solid red'
        dconpassPara.innerHTML='<i>passwords dont match</i>'
        
    }
    else{
        dconPass.blur()
        dconpassPara.innerHTML='&#x2713'
        dconpassPara.style.color='green'
        dPass.style.border='2px solid green'
        dconPass.style.border='2px solid green'
    }
})
dIDfile.addEventListener('input',()=>{
    if(dIDfile.value===''){
        dIDfilePara.innerHTML='<i>*field cannot be empty</i>'
    }
    else if(!(dIDfile.value.endsWith('.jpg') || dIDfile.value.endsWith('.png'))){
            dIDfile.value='';
            dIDfilePara.innerHTML='<i>can only select .jpg or .png file</i>'
    }
    else{
        dIDfilePara.innerHTML=''
    }
})
dAddInfo.addEventListener('input',()=>{
    if(dAddInfo.value===''){
        dAddInfoPara.innerHTML='<i>*field cannot be empty</i>'
    }else{
        dAddInfoPara.innerHTML=''
    }
})
dmno.addEventListener('input',()=>{
    if(dmno.value===''){
        dmnoPara.style.color='red'
        dmnoPara.innerHTML='<i>field cannot be empty</i>'
    }else if(!(dmno.value.startsWith('+880') && dmno.value.length===14)){
        dmnoPara.style.color='red'
        dmnoPara.innerHTML='<i>number format must be matched</i>'
    }else{
        dmnoPara.style.color='green'
        dmnoPara.innerHTML='valid number'
        
    }
})

tos.addEventListener('change',()=>{
    if(!tos.checked){
        tosSpan.style.display='inline'
    }else{
        tosSpan.style.display='none'
    }
})

for (let i = 0; i < donType.length; i++) {
    donType[i].addEventListener('input', () => {
        
        for (let j = 0; j < donType.length; j++) {
            if (donType[j].checked) {
                donTypeSelected = true;
                break;
            }
        }
        if (!donTypeSelected) {
            donTypeP.innerHTML = '<i>* please select an option</i>';
        } else {
            donTypeP.innerHTML = '';
        }
    });
}

recper.addEventListener('input',()=>{
    if(recper.value===''){
        recperP.innerHTML='<i>*please select an option</i>'
    }else{
        recperP.innerHTML=''
    }
})

for (let i = 0; i < payMethod.length; i++) {
    payMethod[i].addEventListener('input', () => {
        //let payMethodSelected = false;
        for (let j = 0; j < payMethod.length; j++) {
            if (payMethod[j].checked) {
                payMethodSelected = true;
                break;
            }
        }
        if (!payMethodSelected) {
         payMethodP.innerHTML = '<i>* please select an option</i>';
        } else {
            payMethodP.innerHTML = '';
        }
    });
}

function ValidateForm(){
    if(dnameTB.value===''||demailTB.value===''|| !(/\w+@gmail.com/).test(demailTB.value) || new Date(dDob.value)>dateLimit ||
    dDob.value===''|| dCity.value==='' || !dPass.value.length>=8 || !(/[^A-Za-z0-9]+/g).test(dPass.value) || !(/\d+/).test(dPass.value)
    || dPass.value===''|| dconPass.value !== dPass.value || !dPass.value.length>=8 || !(/[^A-Za-z0-9]+/g).test(dPass.value) || !(/\d+/).test(dPass.value)
    || dconPass.value==='' || !(dIDfile.value.endsWith('.jpg') || dIDfile.value.endsWith('.png')) || dIDfile.value===''||
    dAddInfo.value===''|| !(dmno.value.startsWith('+880') && dmno.value.length===14) || dmno.value===''|| !tos.checked|| payMethodSelected===false||donTypeSelected===false
    || recper.value==='')
{
    alert('Please fulfill all information criteria before submitting.')
    return false
    }else{
        return true
    }
}



/*//name will contain no numbers
dnameTB.addEventListener('input',()=>{
    dnameTB.value = dnameTB.value.replace(/\d/g, '');
})*/
//correct email format
/*
demailTB.addEventListener('input',()=>{
    if(demailTB.value.endsWith('@gmail.com')){
        demailPara.innerHTML='email format correct'
        demailPara.style.color='green'

    }else if(!demailTB.value.includes('@gmail.com')){
        demailPara.innerHTML='email format not correct'
        demailPara.style.color='red'
    }
})*/
