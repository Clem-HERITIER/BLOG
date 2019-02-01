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
