$(function () {

  //  アコーディオンメニュー

  $('#accordion-btn').on('click', function () {
    $('#accordion-menu').stop(true, true).slideToggle(200);
    $(this).toggleClass('active');
  });


  //  編集モーダル表示

  $(document).on('click', '.js-edit-open', function () {

    let post = $(this).data('post');
    let id = $(this).data('id');

    // textareaに投稿内容をセット
    $('#edit-post').val(post);

    // action設定
    $('#edit-form').attr('action', '/posts/' + id);

    // モーダル表示
    $('#edit-modal').addClass('active');

  });


  //  削除モーダル表示

  $(document).on('click', '.js-delete-open', function () {

    let id = $(this).data('id');

    // action設定
    $('#delete-form').attr('action', '/posts/' + id);

    // モーダル表示
    $('#delete-modal').addClass('active');

  });


  //  モーダル閉じる

  $('.js-modal-close, .modal-overlay').on('click', function (e) {

    if ($(e.target).hasClass('modal-overlay') || $(e.target).hasClass('js-modal-close')) {

      // モーダル非表示
      $('.modal-overlay').removeClass('active');

    }

  });

});
