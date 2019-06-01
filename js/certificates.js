window.onload = function () {
	let imgArr = document.getElementsByClassName('modal_image');

	let modalWindow = document.getElementById('my__modal');
	let modalImg = document.getElementById('modal__content');
	let caption =document.getElementById('caption');
	let span = document.getElementById('close');
	let modalBlock = document.getElementById('modal__block');

	for(i=0;i<imgArr.length;i++){
		let picture = imgArr[i];
		picture.onclick = function(){
			openImg(this);
		}
	}
	function openImg(pic){
		modalWindow.style.display='block';
		modalBlock.style.transform = 'translateY(0%)';
		modalImg.src = pic.src;
		modalImg.alt = pic.alt;
	  caption.innerHTML = modalImg.alt;
	}

	function close(){
		modalWindow.style.display ='none';
	}
	span.onclick = function(){
		modalBlock.style.transform = 'translateY(-500%)';
		setTimeout(	close, 500);
	}
}