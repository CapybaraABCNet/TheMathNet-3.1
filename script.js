function NOD(perch, perch0) {
    while (perch != 0 && perch0 != 0) {
        if (perch > perch0) {
            perch = perch % perch0;
        } else {
            perch0 = perch0 % perch;
        }
        
    }
    return perch + perch0;
}

function NOK1(a, b) {
    return a * b / NOD(a, b);
}

function pos(op) {
    const chislo1 = Number(document.getElementById("chislo1").value);
    const chislo2 = Number(document.getElementById("chislo2").value);
    var otvet;

    switch (op) {
        case "+":
            otvet = chislo1 + chislo2;
            break;
        case "-":
            otvet = chislo1 - chislo2;
            break;
        case "*":
            otvet = chislo1 * chislo2;
            break;
        case "/":
            if (chislo2 === 0) {
                otvet = "На ноль делить нельзя!";
            } else {
                otvet = chislo1 / chislo2;
            }
            break;
        default:
            otvet = "Неверный оператор";
    }

    document.getElementById("otvet").innerHTML = otvet;
}

function pos1(op) {
    var cel1 = Number(document.getElementById("cel1").value);
    var cel2 = Number(document.getElementById("cel2").value);
    var chisl1 = Number(document.getElementById("chisl1").value);
    var znam1 = Number(document.getElementById("znam1").value);
    var chisl2 = Number(document.getElementById("chisl2").value);
    var znam2 = Number(document.getElementById("znam2").value);
    var newq = 0;
    var newq1 = 0;
    var dro1 = 0;
    var dro2 = 0;
    var sccc = 0;

    var result;
    
    switch (op) {
        case "+":
            if (znam1 === znam2) {
                result = `${chisl1 + chisl2}/${znam1}`;
            } else {
                var new1 = chisl1 * znam2;
                var new2 = chisl2 * znam1;
                var new3 = znam1 * znam2;
                result = `${cel1 + cel2} ${new1 + new2}/${new3}`;
            }
            break;
        case '*':
            if (cel1 === 0 && cel2 === 0) {
                newq = NOD(chisl1, znam2);
                newq1 = NOD(chisl2, znam1);
                dro1 = (chisl1 / newq) * (chisl2 / newq1);
                dro2 = (znam1 / newq1) * (znam2 / newq);
                sccc = NOD(dro1, dro2);
                result = `${dro1 / sccc}/${dro2/sccc}`;
            } else {
                if (cel1 > 0 && cel2 > 0) {
                    chisl1 = cel1 * znam1 + chisl1;
                    chisl2 = cel2 * znam2 + chisl2;
                    newq = NOD(chisl1, znam2);
                    newq1 = NOD(chisl2, znam1);
                    dro1 = (chisl1 / newq) * (chisl2 / newq1);
                    dro2 = (znam1 / newq1) * (znam2 / newq);
                    sccc = NOD(dro1, dro2);
                    result = `${dro1 / sccc}/${dro2/sccc}`;
                }
                else {
                    if (cel1 > 0) {
                        chisl1 = cel1 * znam1 + chisl1;
                        newq = NOD(chisl1, znam2);
                        newq1 = NOD(chisl2, znam1);
                        dro1 = (chisl1 / newq) * (chisl2 / newq1);
                        dro2 = (znam1 / newq1) * (znam2 / newq);
                        sccc = NOD(dro1, dro2);
                        result = `${dro1 / sccc}/${dro2/sccc}`;
                    }
                    else if (cel2 > 0) {
                        chisl2 = cel2 * znam2 + chisl2;
                        newq = NOD(chisl1, znam2);
                        newq1 = NOD(chisl2, znam1);
                        dro1 = (chisl1 / newq) * (chisl2 / newq1);
                        dro2 = (znam1 / newq1) * (znam2 / newq);
                        sccc = NOD(dro1, dro2);
                        result = `${dro1 / sccc}/${dro2/sccc}`;
                    }
                }
            }
            
    }
    document.getElementById("result").innerHTML = result;
}

function sravn() {
    var cel11 = Number(document.getElementById("cel11").value);
    var cel22 = Number(document.getElementById("cel22").value);
    var chisl11 = Number(document.getElementById("chisl11").value);
    var znam11 = Number(document.getElementById("znam11").value);
    var chisl22 = Number(document.getElementById("chisl22").value);
    var znam22 = Number(document.getElementById("znam22").value);
    var result1;
    var chisl3 = cel11 * znam11 + chisl11;
    var chisl4 = cel22 * znam22 + chisl22;
    if (znam11 === znam22) {
        if (chisl3 > chisl4) {
            result1 = `${cel11} ${chisl11}/${znam11} > ${cel22} ${chisl22}/${znam22}`;
    }
    else if (chisl4 > chisl3) {
        result1 = `${cel11} ${chisl11}/${znam11} < ${cel22} ${chisl22}/${znam22}`;
    }
    else {
        result1 = `${cel11} ${chisl11}/${znam11} = ${cel22} ${chisl22}/${znam22}`;
    }
    document.getElementById("result1").innerHTML = result1;
}
else {
    if (chisl3 === chisl4) {
        if (znam11 > znam22) {
            result1 = `${cel11} ${chisl11}/${znam11} > ${cel22} ${chisl22}/${znam22}`;
        }
        else if (znam1 < znam2) {
            result1 = `${cel11} ${chisl11}/${znam11} < ${cel22} ${chisl22}/${znam22}`;
        }
        else {
            result1 = `${cel11} ${chisl11}/${znam11} = ${cel22} ${chisl22}/${znam22}`;
        }
    }
    else {
        var new11 = chisl3 * znam22;
        var new3 = chisl4 * znam11;
        if (new11 > new3) {
            result1 = `${cel11} ${chisl11}/${znam11} > ${cel22} ${chisl22}/${znam22}`;
        }
        else if (new3 > new1) {
            result1 = `${cel11} ${chisl11}/${znam11} < ${cel22} ${chisl22}/${znam22}`;
        }
        else {
            result1 = `${cel11} ${chisl11}/${znam11} = ${cel22} ${chisl22}/${znam22}`;
        }
    }
}
document.getElementById("result1").innerHTML = result1;
}

function stepen() {
    var chisslo = Number(document.getElementById("chisslo").value);
    var chisslo1 = Number(document.getElementById("chisslo1").value);
    let otvet1;

    otvet1 = Math.pow(chisslo, chisslo1);
    document.getElementById("otvet1").innerHTML = otvet1;
}

function resh() {
    var nepr = Number(document.getElementById("nepr").value);
    var nepr1 = Number(document.getElementById("nepr1").value);
    var nepr2;

    var nepr3 = nepr / nepr1;
    nepr3 = Math.round(nepr3)
    nepr = nepr % nepr1;
    if (nepr === 0) {
        nepr2 = `${nepr3}`;
    } else {
        nepr2 = `${nepr3} ${nepr}/${nepr1}`;
    }
    document.getElementById("nepr2").innerHTML = nepr2;
}

function resh1() {
    var celll = Number(document.getElementById("celll").value);
    var chisl10 = Number(document.getElementById("chisl10").value);
    var znam10 = Number(document.getElementById("znam10").value);
    var ot;

    chisl10 = celll * znam10 + chisl10;
    ot = `${chisl10}/${znam10}`;
    document.getElementById("ot").innerHTML = ot;
}


function pposs() {
    var perch = Number(document.getElementById("perch").value);
    var perch0 = Number(document.getElementById("perch0").value);
    var rre;
    rre = `${NOD(perch, perch0)}`;

    document.getElementById("rre").innerHTML = rre;
}

function NOK() {
    let nok1 = document.getElementById("nok1").value;
    let nok2 = document.getElementById("nok2").value;
    var otvetnok;
    otvetnok = `${NOK1(nok1, nok2)}`;

    document.getElementById("otvetnok").innerHTML = otvetnok;
}

function fibonache(a) {
    if (a <= 1) {
        return a;
    } else {
        return fibonache(a - 1) + fibonache(a - 2);
    }
}
function fib() {
    var ff = Number(document.getElementById("ff").value);
    var otfi;
    otfi = fibonache(ff);
    document.getElementById("otfi").innerHTML = otfi.toString();
}

function fac(a) {
    if (a === 1) return a;
    return a * fac(a - 1);
}
function factor() {
    var factorial = Number(document.getElementById("factorial").value);
    var posp = fac(factorial);
    document.getElementById("posp").innerHTML = posp.toString();
}

function gb(x, y) {
    return Math.log(y) / Math.log(x);
}
function log() {
    var aa = Number(document.getElementById("aa").value);
    var bb = Number(document.getElementById("bb").value);
    var otvetaa;

    otvetaa = `${gb(aa, bb)}`;
    document.getElementById("otvetaa").innerHTML = otvetaa;
}

function coren() {
    let core = Number(document.getElementById("core").value); 

    if (!isNaN(core)) { 
        if (core >= 0) {
            var cor = Math.sqrt(core);
            document.getElementById('cor').innerHTML = 'Корень равен: ' + cor.toFixed(2); 
        } else {
            document.getElementById('cor').innerHTML = 'Ошибка: введено отрицательное число.';
        }
    } else {
        document.getElementById('cor').innerHTML = 'Ошибка: введённые данные не являются числом.';
    }
}

function shirina() {
    const dlina1 = Number(document.getElementById("dlina1").value);
    const shirina1 = Number(document.getElementById("shirina1").value);
    let sh1 = (dlina1 + shirina1) * 2;
    document.getElementById("sh1").innerHTML = sh1;
}

function shirin() {
    const storona = Number(document.getElementById("storona").value);
    const storona1 = Number(document.getElementById("storona1").value);
    const os = Number(document.getElementById("os").value);

    let sh = storona + storona1 + os;
    document.getElementById("sh").innerHTML = sh;
}

function shirina1() {
    const dlina2 = Number(document.getElementById("dlina2").value);
    const shirina2 = Number(document.getElementById("shirina2").value);
    let dds = dlina2 * shirina2;

    document.getElementById("dds").innerHTML = dds;
}

function plosh() {
    const radius = Number(document.getElementById("radius").value);
    let dds1 = Math.PI * radius * radius;

    document.getElementById("dds1").innerHTML = dds1;
}

function pl() {
    const storona0 = Number(document.getElementById("storona0").value);
    const os1 = Number(document.getElementById("os1").value);

    let dds2 = (storona0 * os1) / 2;
    document.getElementById("dds2").innerHTML = dds2;
}

