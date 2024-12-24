// resources/js/thread-form.js
document.addEventListener('DOMContentLoaded', function () {
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const submitButton = document.getElementById('submitButton');

    function updateButtonState() {
        //初期状態はグレーアウト、クリック不可
        //入力されると押下可能になる
        if (titleInput.value.trim() !== '' && descriptionInput.value.trim() !== '') {
            submitButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitButton.classList.add('bg-purple-500', 'hover:bg-purple-600');
            submitButton.disabled = false;
        } else {
            submitButton.classList.remove('bg-purple-500', 'hover:bg-purple-600');
            submitButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            submitButton.disabled = true;
        }
    }

    titleInput.addEventListener('input', updateButtonState);
    descriptionInput.addEventListener('input', updateButtonState);
});