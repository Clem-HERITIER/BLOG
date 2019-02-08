// ANIMATION MENU BURGER

$('.nav-toggle').click(function()
  {
    $(this).toggleClass('opened');
    $('.menu-burger').toggleClass('visible');
  }
)

$('.close-nav').click(function()
  {
    $('.nav-toggle').toggleClass('opened');
    $('.menu-burger').toggleClass('visible');
  }
)

$('.login').click(function()
  {
    $('.connect').toggleClass('visible');
  }
)

$('.ask-delete').click(function()
   {
    event.preventDefault();
    var id = $(this).attr('data-id');
    $('.edit-delete-' + id).toggleClass('hidden');
    $('.confirm-' + id).toggleClass('hidden');
   }
)

$('.no-delete').click(function()
   {
    event.preventDefault();
    var id = $(this).attr('data-id');
    $('.edit-delete-' + id).toggleClass('hidden');
    $('.confirm-' + id).toggleClass('hidden');
   }
)