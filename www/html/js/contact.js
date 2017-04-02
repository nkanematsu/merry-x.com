$(function () {
    $('form').validate({
        rules : {
            '担当者名(名前)': {
                required: true
            },
            '法人名': {
                required: true
            },
            'email': {
                required: true,
                email: true
            },
            'お問い合わせ内容': {
                required: true
            }
        },
        messages: {
            '担当者名(名前)': {
                required: '担当者名(名前)を入力してください'
            },
            '法人名': {
                required: '法人名を入力してください'
            },
            'email': {
                required: 'メールアドレスを入力してください',
                email: 'メールアドレスを正しく入力してください'
            },
            'お問い合わせ内容': {
                required: 'お問い合わせ内容を入力してください'
            }
        },
        errorElement: 'div'
    });
});
