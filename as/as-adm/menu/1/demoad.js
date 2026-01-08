var demoad = document.createElement('div');
demoad.id = 'cdawrap';
demoad.innerHTML = '<span id="cda-remove"></span>';
document.getElementsByTagName('body')[0].appendChild(demoad);

document.getElementById('cda-remove').addEventListener('click',function(e){
	demoad.style.display = 'none';
	e.preventDefault();
});

var bsa = document.createElement('script');
bsa.type = 'text/javascript';
bsa.async = true;
bsa.id = '';
bsa.src = '';
demoad.appendChild(bsa);

var adChecked = false;
var attempts = 5;
var cntAttempts = 0;
var adInterval;

function checkAd() {
	if (adChecked || cntAttempts >= attempts) {
		clearInterval(adInterval);
		return;
	}

	cntAttempts++;

	var carbonImg = document.querySelector('');

	if (!carbonImg) return;

	var adImgHeight = carbonImg.offsetHeight;

	if (adImgHeight >= 30) {
		_gaq.push(['']);
		
		adChecked = true;
	} 
}

if(window._gaq) {
	_gaq.push(['']);

	adInterval = setInterval(checkAd, 3000);
}