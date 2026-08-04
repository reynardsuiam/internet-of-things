const screen=document.getElementById("screen");
const mode=document.getElementById("mode");

function insert(value){
screen.value+=value;
}

function clearScreen(){
screen.value="";
}

function backspace(){
screen.value=screen.value.slice(0,-1);
}

function factorial(){

let n=parseFloat(screen.value);

if(isNaN(n)||n<0){

screen.value="Error";
return;

}

let result=1;

for(let i=2;i<=n;i++){

result*=i;

}

screen.value=result;

}

function func(type){

let value=parseFloat(screen.value);

if(isNaN(value)) return;

let rad=mode.checked?value:value*Math.PI/180;

switch(type){

case "sin":
screen.value=Math.sin(rad);
break;

case "cos":
screen.value=Math.cos(rad);
break;

case "tan":
screen.value=Math.tan(rad);
break;

case "sqrt":
screen.value=Math.sqrt(value);
break;

case "log":
screen.value=Math.log10(value);
break;

case "ln":
screen.value=Math.log(value);
break;

}

}

function calculate(){

try{

screen.value=eval(screen.value);

}
catch{

screen.value="Error";

}

}

document.addEventListener("keydown",function(e){

const key=e.key;

if((key>="0"&&key<="9")||

[".","+","-","*","/","(",")"].includes(key)){

screen.value+=key;

}

if(key==="Enter"){

calculate();

}

if(key==="Backspace"){

backspace();

}

if(key==="Escape"){

clearScreen();

}

});