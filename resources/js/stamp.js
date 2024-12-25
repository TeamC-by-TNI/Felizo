// スタンプ機能の実装
let activeStampPicker = null;

export function toggleStampPicker(button) {
    const picker = button.nextElementSibling;
    
    // 既に開いているピッカーがあれば閉じる
    if (activeStampPicker && activeStampPicker !== picker) {
        activeStampPicker.classList.add('hidden');
    }
    
    picker.classList.toggle('hidden');
    activeStampPicker = picker.classList.contains('hidden') ? null : picker;
}

export function submitStamp(form, event) {
    event.preventDefault();
    
    const formData = new FormData(form);
    const url = form.action;
    
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // スタンプのアニメーション
            const stampImg = form.querySelector('img');
            animateStamp(stampImg);
            
            // スタンプ数の更新（絵文字の横の数字）
            const countSpan = form.closest('.relative').querySelector('.text-xs');
            if (countSpan) {
                countSpan.textContent = `(${data.totalCount})`;
            }
            
            // スタンプ一覧の更新
            const stampContainer = form.closest('.stamp-picker').parentElement.nextElementSibling;
            if (stampContainer) {
                let newHtml = '';
                Object.entries(data.stamps).forEach(([typeId, stampData]) => {
                    newHtml += `
                        <span class="bg-gray-100 rounded px-2 py-1 text-sm flex items-center gap-1">
                            <img src="/images/stamps/${stampData.icon_path}" 
                                alt="${stampData.name}" 
                                class="w-4 h-4 object-contain">
                            ${stampData.count}
                        </span>
                    `;
                });
                stampContainer.innerHTML = newHtml;
            }
            
            // ピッカーを閉じる
            if (activeStampPicker) {
                activeStampPicker.classList.add('hidden');
                activeStampPicker = null;
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

function animateStamp(stampImg) {
    const stamp = stampImg.cloneNode(true);
    const rect = stampImg.getBoundingClientRect();
    
    stamp.style.position = 'fixed';
    stamp.style.left = rect.left + 'px';
    stamp.style.top = rect.top + 'px';
    stamp.style.width = '48px';
    stamp.style.height = '48px';
    stamp.style.zIndex = '9999';
    stamp.style.transition = 'all 0.5s ease-out';
    stamp.style.opacity = '1';
    
    document.body.appendChild(stamp);
    
    // ランダムな終点位置を計算
    const randomX = Math.random() * 100 - 50;
    const randomY = -100 - (Math.random() * 50);
    
    // アニメーション
    requestAnimationFrame(() => {
        stamp.style.transform = `translate(${randomX}px, ${randomY}px) rotate(${Math.random() * 360}deg)`;
        stamp.style.opacity = '0';
    });
    
    // 要素の削除
    setTimeout(() => {
        stamp.remove();
    }, 500);
}

// クリックイベントをドキュメントに追加してピッカーの外側をクリックした時に閉じる
document.addEventListener('click', function(event) {
    if (!event.target.closest('.stamp-picker') && !event.target.closest('button')) {
        if (activeStampPicker) {
            activeStampPicker.classList.add('hidden');
            activeStampPicker = null;
        }
    }
});