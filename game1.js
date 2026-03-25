const game = document.getElementById('game');
let money = document.getElementById('money');
let sost = document.getElementById('sost');
let selll = document.getElementById('selll');
let moneyy = 300;
let sell = 50;
let sost1 = 'Средний класс';
let text = '';
money.textContent = moneyy;
selll.textContent = sell;
sost.textContent = sost1;

function update() {
	money.textContent = moneyy;
	game.textContent = text;
	selll.textContent = sell;
	sost.textContent = sost1;
}

function sellAction() {
	moneyy -= sell;
	randomCen();
}

function randomCen() {
	let plus = 0;
	let randomNumber = Math.floor(Math.random() * (3 - 1) + 1);
	if (randomNumber === 1) {
		plus = sell * 2;
		moneyy += plus;
		text = `+${plus}$`;
	}
	else if (randomNumber === 3) {
		moneyy -= moneyy;
		text = `+${money}$`;
	}
	else {
		plus = sell / 2;
		moneyy -= plus;
		text = `-${plus}$`;
	}
	update();
}

function gameLoop() {
	end();

	if (tf) {
		text = `Game Over! Вы банкроты`;
		return;
	} else {
		let ran = Math.floor(Math.random() * (1000 - 1) + 1);
	    if (ran > 500) {
		    text = `+${ran}$`;
		    moneyy += ran;
	    } else {
	    	text = `-${ran}$`;
	    	moneyy -= ran;
	    }
	}
x
	update();
}

function end() {
	let tf = false;
	if (moneyy <= 0) {
		tf = true;
	}
}

setInterval(gameLoop, 5000);
