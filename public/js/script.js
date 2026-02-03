$(function () {

  /* 投稿編集モーダルを開く */
  $(document).on('click', '.edit-btn', function () {

    $('.js-modal').fadeIn();

    let post = $(this).data('post');
    let post_id = $(this).data('id');

    $('.modal_post').val(post);
    $('.modal_post_id').val(post_id);

    return false;

  });


  /* モーダルを閉じる */
  $(document).on('click', '.js-modal-close', function () {

    $('.js-modal').fadeOut();

    return false;

  });


  /* ヘッダーアコーディオン開閉 */
  $('#accordion-btn').on('click', function () {

    $('#accordion-menu').slideToggle();

    $(this).toggleClass('rotate');

  });

});
