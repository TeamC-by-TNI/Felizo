document.addEventListener('DOMContentLoaded', function() {
    const threads = document.querySelectorAll('[data-expires-at]');

    function updateExpirationTime() {
        threads.forEach(thread => {
            const expiresAt = new Date(thread.dataset.expiresAt).getTime();
            const now = new Date().getTime();
            const timeLeft = expiresAt - now;

            const timeDisplay = thread.querySelector('.expiration-time');
            if (timeDisplay) {
                if (timeLeft <= 0) {
                    thread.style.transition = 'opacity 0.5s ease-out';
                    thread.style.opacity = '0';
                    setTimeout(() => {
                        thread.remove();
                        // スレッドが全て消えた場合の処理
                        const remainingThreads = document.querySelectorAll('[data-expires-at]');
                        if (remainingThreads.length === 0) {
                            const emptyMessage = document.createElement('div');
                            emptyMessage.className = 'col-span-1 md:col-span-2 lg:col-span-3 text-center py-8 text-gray-500';
                            emptyMessage.textContent = 'スレッドがまだありません。新しいスレッドを作成してみましょう！';
                            document.querySelector('.grid').appendChild(emptyMessage);
                        }
                    }, 500);
                } else {
                    // 残り時間を分と秒で計算
                    const minutes = Math.floor(timeLeft / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    timeDisplay.textContent = `残り時間: ${minutes}分${seconds}秒`;
                }
            }
        });
    }

    // 1秒ごとに更新
    if (threads.length > 0) {
        setInterval(updateExpirationTime, 1000);
        updateExpirationTime(); // 初回実行
    }
}); 