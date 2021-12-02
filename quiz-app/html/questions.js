// 解答の選択肢一覧を取得
const answersList = document.querySelectorAll('ol.answers li');
// クリックされたときの処理を仕込む
answersList.forEach(li => li.addEventListener('click', checkClickedAnswer));

// 正しい答え(固定値なのでconstで定義)
const correctAnswers = {
    1: 'B',
    2: 'A',
    3: 'B',
    4: 'C',
    5: 'D',
    6: 'B',
};

function checkClickedAnswer(event) {
    // addEventListenerによって反応した要素(この実装ではli要素)
    const clickedAnswerElement = event.currentTarget;
    // 選択した答え(A,B,C,D)
    const selectedAnswer = clickedAnswerElement.dataset.answer;

    // 親要素のolから、data-idの値を取得
    const questionId = clickedAnswerElement.closest('ol.answers').dataset.id;
    // 正しい答え(A,B,C,D)
    const correctAnswer = correctAnswers[questionId];

    const formData = new FormData();

    formData.append('id', questionId);
    formData.append('selectedAnswer', selectedAnswer)

    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'answer.php');
    xhr.send(formData);

    xhr.addEventListener('loadend', function(event) {
        const xhr = event.currentTarget;
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.response);
            const result = response.result;
            const correctAnswer = response.correctAnswer;
            const correctAnswerValue = response.correntAnswerValue;
            const explanation = response.explanation;
            displayResult(result, correctAnswer, correctAnswerValue, explanation);
        } else {
            alert('Error: 回答データの所得に失敗しました')
        }

    });

}

function displayResult(result, correctAnswer, correctAnswerValue, explanation) {
    
        // メッセージを入れる変数を用意
        let message;
        // カラーコードを入れる変数を用意
        let answerColorCode;
    
        // 答えが正しいか判定
        if (result) {
            // 正しい答えだったとき
            message = '正解です！おめでとう！';
            answerColorCode = '';
        } else {
            // 間違えた答えだったとき
            message = 'ざんねん！不正解です！';
            answerColorCode = '#f05959';
        }
    
        // アラートで正解・不正解を出力
        alert(message);

        document.querySelector('span#correct-answer').innerHTML = correctAnswer + '. ' + correctAnswerValue;
        document.querySelector('span#explanation').innerHTML = explanation;

    
        // 色を変更(間違っていたときだけ色が変わる)
        document.querySelector('span#correct-answer').style.color = answerColorCode;
        // 答え全体を表示
        document.querySelector('div#section-correct-answer').style.display = 'block';

}