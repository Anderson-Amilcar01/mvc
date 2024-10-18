const buttons = document.querySelectorAll('.xd');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        alert(`You clicked on answer ${button.textContent}`);
    });
});
