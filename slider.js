let position = 0;
const slidesToShow = 2;
const slidesToScroll = 1;
const container = document.querySelector('.slider-container');
const track = document.querySelector('.container-scroll');
const item = document.querySelector('.slider-item');
const bttnPrev = document.querySelector('.bttn-prv');
const bttnNext = document.querySelector('.bttn-nxt');
const items = document.querySelectorAll('.slider-item');

const itemCount = items.length;
const itemWidth = container.clientWidth / slidesToShow;
const movePosition = slidesToScroll * itemWidth;

items.forEach((item)=> {
	item.style.minWidth = `${itemWidth}px`;
	});

bttnNext.addEventListener('click', () => {
	const itemLeft = itemCount - (Math.abs(position) + slidesToShow * itemWidth) / itemWidth;

	position -= itemLeft >= slidesToScroll ? movePosition : itemsLeft * itemWidth;

	setPosition();
	checkBtns();
} );

bttnPrev.addEventListener('click', () => {
	const itemLeft = Math.abs(position) / itemWidth;

	position += itemLeft >= slidesToScroll ? movePosition : itemLeft * itemWidth;
	setPosition();
	checkBtns();
});

const setPosition = () =>{
	track.style.transform = `translateX(${position}px)`;
};

const checkBtns = () => {
	btnPrev.disabled = position === 0;
	btnNext.disabled = position <= -(itemCount - slidesToShow) * itemWidth;
};
