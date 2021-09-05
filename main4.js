const CONSTgoo = 2;
const CONSTchoki = 1;
const CONSTpaa = 0;
const CONSTwin = 1;
const CONSTloss = -1;
const CONSTdrow = 0;

var intervalid;
var pcstop = true;
var elmguu = document.getElementById("guu");
var elmchoki = document.getElementById("choki");
var elmpaa = document.getElementById("paa");

elmguu.addEventListener("click",goo,false);
elmchoki.addEventListener("click",choki,false);
elmpaa.addEventListener("click",paa,false);

elmguu.addEventListener("mouseover",gooover,false);
elmchoki.addEventListener("mouseover",chokiover,false);
elmpaa.addEventListener("mouseover",paaover,false);

function gooover(){
    msout();
    setbdr(elmguu.style);
}
function chokiover(){
    msout();
    setbdr(elmchoki.style);
}
function paaover(){
    msout();
    setbdr(elmpaa.style);
}
function msout(){
    elmguu.style.borderStyle = "none";
    elmchoki.style.borderStyle = "none";
    elmpaa.style.borderStyle = "none";
}
function setbdr(elmstyle){
    elmstyle.borderStyle = "solid";
    elmstyle.borderWidth = "2px";
    elmstyle.borderColor = "red";
}

function goo(){
    janstr(CONSTgoo);
}
function choki(){
    janstr(CONSTchoki);
}
function paa(){
    janstr(CONSTpaa);
}
function janstr(hand){
    var v0;
    message("");
    if (pcstop == true){
        intval();
        message("もう一度、手を選択すると停止します。");
        pcstop = false;
        return;
    }
    clearInterval(intervalid);
    pcstop = true;
    v0 = rand();    
    dsphand(v0);
    v0 = judge(v0,hand);
    dspjudge(v0);
}

function intval(){
    var i = 0;
    intervalid = setInterval(function(){
        dsphand(i);
        i++;
        if(i > 2){
            i = 0;
        }
    },100);
}

function rand(){
    var randnum;
    randnum = Math.floor(Math.random() * 3);
    return(randnum);
}

function dsphand(hand){
    var elm = document.getElementById("pc");
    switch(hand){
        case CONSTgoo:
            elm.src = "png/goo.png";
            break;
        case CONSTchoki:
            elm.src = "png/choki.png";
            break;
        case CONSTpaa:
            elm.src = "png/paa.png";
            break;
    }
}

function judge(you,pc){
    if((pc == CONSTgoo) && you == CONSTgoo)
        return(CONSTdrow);
    if((pc == CONSTgoo) && you == CONSTchoki)
        return(CONSTwin);
    if((pc == CONSTgoo) && you == CONSTpaa)
        return(CONSTloss);

    if((pc == CONSTchoki) && you == CONSTgoo)
        return(CONSTloss);
    if((pc == CONSTchoki) && you == CONSTchoki)
        return(CONSTdrow);
    if((pc == CONSTchoki) && you == CONSTpaa)
        return(CONSTwin);

    if((pc == CONSTpaa) && you == CONSTgoo)
        return(CONSTwin);
    if((pc == CONSTpaa) && you == CONSTchoki)
        return(CONSTloss);
    if((pc == CONSTpaa) && you == CONSTpaa)
        return(CONSTdrow);
}
function dspjudge(jge){
    if(jge == CONSTdrow){
        message("あいこです。もう一度、手を選択すると開始します。");
        return;
    }
    if(jge == CONSTwin){
        message("君の勝ちです。もう一度、手を選択すると開始します。");
        return;
    }
    if(jge == CONSTloss){
        message("君の負けです。もう一度、手を選択すると開始します。");
        return;
    }
}

function message(text){
    var elm;
    elm = document.getElementById("msg");
    elm.innerHTML = text;
}