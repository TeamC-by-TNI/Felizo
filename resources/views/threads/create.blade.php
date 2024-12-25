<!-- resources/views/threads/create.blade.php -->
@extends('layouts.app')


@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-xl md:text-2xl font-bold mb-6">新規スレッド作成</h1>

        <div class="bg-white shadow rounded-lg p-4 md:p-6">
            <form action="{{ route('threads.store') }}" method="POST">
            @csrf
                <!-- タイトル入力 -->
                <div class="mb-4 md:mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        タイトル
                    </label>
                    <input type="text" id="title" name="title" 
                           class="w-full border-gray-300 rounded-md shadow-sm px-3 md:px-4 py-2 text-sm md:text-base" 
                           placeholder="スレッドのタイトル"
                           value="{{ old('title') }}">
                    @error('title')
                       <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 内容入力 -->
                <div class="mb-4 md:mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        内容
                    </label>
                    <textarea id="description" name="description" rows="5" 
                              class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2"
                              placeholder="スレッドの内容">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 有害度チェック結果表示用 -->
                <div id="toxicity-result" class="text-sm text-red-500 mb-4">有害な内容は投稿できません。</div>

                <!-- 投稿ボタン -->
                <div class="flex justify-end">
                    <button type="submit" id="submitButton" 
                            class="font-bold py-2 px-6 rounded text-sm md:text-base transition-colors 
                            duration-200 bg-gray-400 text-white cursor-not-allowed" 
                            disabled>
                        投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- PerspectiveAPI用のスクリプト -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const apiKey = '{{ config("services.perspective.api_key") }}';
    let titleValid = false;
    let descriptionValid = false;
    let toxicityValid = true;

    function checkToxicity(text) {
        console.log('checkToxicity関数が呼び出されました');
        console.log('入力テキスト:', text);
        
        if (!text.trim()) {
            console.log('テキストが空のため、チェックをスキップします');
            return;
        }

        const url = `https://commentanalyzer.googleapis.com/v1alpha1/comments:analyze?key=${apiKey}`;
        const data = {
            comment: { text: text },
            requestedAttributes: { TOXICITY: {} }
        };
        
        console.log('APIリクエスト先URL:', url);
        console.log('送信データ:', data);

        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                console.log('API応答:', response);
                const toxicity = response.attributeScores.TOXICITY.summaryScore.value;
                const toxicityPercentage = (toxicity * 100).toFixed(2);

                if (toxicity > 0.04) {
                    $('#toxicity-result').text(`有害な内容を ${toxicityPercentage}% 含んでいるため投稿できません。`);
                    toxicityValid = false;
                } else {
                    $('#toxicity-result').text('');
                    toxicityValid = true;
                }
                updateButtonState();
            },
            error: function(xhr, status, error) {
                console.error('APIエラー:', error);
                console.error('エラーの詳細:', xhr.responseText);
                $('#toxicity-result').text('有害度チェックでエラーが発生しました。');
                toxicityValid = false;
                updateButtonState();
            }
        });
    }

    function updateButtonState() {
        const submitButton = $('#submitButton');
        if (titleValid && descriptionValid && toxicityValid) {
            submitButton.removeClass('bg-gray-400 cursor-not-allowed')
                       .addClass('bg-purple-500 hover:bg-purple-600')
                       .prop('disabled', false);
        } else {
            submitButton.removeClass('bg-purple-500 hover:bg-purple-600')
                       .addClass('bg-gray-400 cursor-not-allowed')
                       .prop('disabled', true);
        }
    }

    $('#title').on('input', function() {
        titleValid = $(this).val().trim() !== '';
        updateButtonState();
    });

    $('#description').on('input', function() {
        const text = $(this).val().trim();
        descriptionValid = text !== '';
        checkToxicity(text);
    });
</script>
@endpush
@endsection