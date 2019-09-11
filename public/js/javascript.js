const form = document.querySelector('.comment-form');
const placeholder = document.querySelector('.comment-placeholder');
form.addEventListener('submit', ev => {
    ev.preventDefault();
    const formData = new FormData(form);
    fetch(form.getAttribute('action'), {
        method: 'POST',
        body: formData,
    })
        .then(response => response.text())
        .then(text => {
            placeholder.insertAdjacentHTML('beforeBegin', text);
        });
    // TODO: handle errors
});
