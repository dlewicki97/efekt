const callNoButton = document.querySelector('.fixed-call-no-button');
const callBox = document.querySelector('.fixed-call-box');

callNoButton.addEventListener('click', (e) => {
  callBox.classList.add('d-none');
});
