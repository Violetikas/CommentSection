const form = document.querySelector('.comment-form');
const placeholder = document.querySelector('.comment-list > .comment-placeholder');
form.addEventListener('submit', ev => {
    ev.preventDefault();
    const formData = new FormData(form);
    fetch(form.getAttribute('action'), {
        method: 'POST',
        body: formData,
    })
        .then(response => response.text())
        .then(text => {
            // Insert new comment into document
            placeholder.insertAdjacentHTML('beforeBegin', text);
            // Activate comment reply button.
            activateCommentInlineForm(placeholder.previousElementSibling);
            // Clear form fields.
            form.reset();
        });
    // TODO: handle errors
});

function activateCommentInlineForm(comment) {
    const button = comment.querySelector('button.button-reply');
    const commentPlaceholder = comment.querySelector('.comment-placeholder');
    const formPlaceholder = comment.querySelector('.form-placeholder');
    button.addEventListener('click', evt => {
        evt.preventDefault();
        const formCloned = form.cloneNode(true);
        formCloned.addEventListener('submit', evt1 => {
            evt1.preventDefault();
            const formData = new FormData(formCloned);
            formData.set('parent_comment_id', comment.dataset.commentId);
            fetch(form.getAttribute('action'), {
                method: 'POST',
                body: formData,
            })
                .then(response => response.text())
                .then(text => {
                    // Insert comment into document.
                    commentPlaceholder.insertAdjacentHTML('beforeBegin', text);
                    // Remove inline form.
                    while (formPlaceholder.firstChild) {
                        formPlaceholder.removeChild(formPlaceholder.firstChild);
                    }
                });
            // TODO: handle errors
        });
        formPlaceholder.appendChild(formCloned);
    });
}

Array.prototype.forEach.call(
    document.querySelectorAll('[data-comment-id]'),
    activateCommentInlineForm
);

