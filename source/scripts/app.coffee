feed = new Instafeed
  get: 'user',
  userId: '286195458',
  accessToken: '3412123.1677ed0.3140ceda1d93427dbc1c0b15b4352b74',
  limit: 5,
  resolution: 'standard_resolution'
feed.run()

jQuery(document).ready ($) ->
  didScroll = false
  lastScrollTop = 0
  delta = 170
  navbarHeight = $('#global-header').outerHeight()

  $(window).scroll (event) ->
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
  false