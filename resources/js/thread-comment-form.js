// resources/js/comment-form.js
document.addEventListener('DOMContentLoaded', function () {
    const commentInput = document.getElementById('comment');
    const submitButton2 = document.getElementById('submitButton2');

    function updateCommentButtonState() {
        if (commentInput.value.trim() !== '') {
            submitButton2.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitButton2.classList.add('bg-purple-500', 'hover:bg-purple-600');
            submitButton2.disabled = false;
        } else {
            submitButton2.classList.remove('bg-purple-500', 'hover:bg-purple-600');
            submitButton2.classList.add('bg-gray-400', 'cursor-not-allowed');
            submitButton2.disabled = true;
        }
    }

    if (commentInput && submitButton2) {
        commentInput.addEventListener('input', updateCommentButtonState);
    }
});