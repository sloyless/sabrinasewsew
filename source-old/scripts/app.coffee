'use strict'

jQuery(document).ready ($) ->
  didScroll = false
  lastScrollTop = 0
  delta = 170
  navbarHeight = $('#global-header').outerHeight()

  $(window).scroll ->
    didScroll = true
    false

  setInterval ->
    if (didScroll)
      hasScrolled()
      didScroll = false
      false
  , 250

  hasScrolled = ->
    st = $(@).scrollTop()
    if Math.abs(lastScrollTop - st) <= delta
      return

    if st > lastScrollTop && st > navbarHeight
      $('#global-header').addClass 'fixed'
    else
      if st < lastScrollTop && st < navbarHeight
        $('#global-header').removeClass 'fixed'

    lastScrollTop = st
    false

  # Smooth anchor scrolling
  $('a[href^="#"]').on 'click.smoothscroll', (e) ->
    e.preventDefault()

    target = @hash
    $target = $(target)

    $('html, body').stop().animate {
      'scrollTop': $target.offset().top-80
    }, 500, 'swing', ->
      window.location.hash = target
      false