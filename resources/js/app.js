import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* アコーディオン */

const btn = document.getElementById('accordion-btn');
const menu = document.getElementById('accordion-menu');

if (btn && menu) {
  btn.addEventListener('click', function () {

    btn.classList.toggle('rotate');

    if (menu.style.display === 'block') {
      menu.style.display = 'none';
    } else {
      menu.style.display = 'block';
    }

  });
}

/* 投稿編集モーダル */

// $(function () {

//   $('.edit-btn').on('click', function () {

//     $('.js-modal').fadeIn();

//     let post = $(this).data('post');
//     let post_id = $(this).data('id');

//     $('.modal_post').val(post);
//     $('.modal_post_id').val(post_id);

//     return false;
//   });

//   $('.js-modal-close').on('click', function () {
//     $('.js-modal').fadeOut();
//     return false;
//   });

// });

/* 投稿編集モーダル（有効版） */

$(function () {

  $('.edit-btn').on('click', function () {

    $('.js-modal').fadeIn();

    let post = $(this).data('post');
    let post_id = $(this).data('id');

    $('.modal_post').val(post);
    $('.modal_post_id').val(post_id);

    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
