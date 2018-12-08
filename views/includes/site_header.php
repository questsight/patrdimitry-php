<!DOCTYPE html>
<html>
  <?php site_head(); ?>
  <body class="body">
    <div class="site">
      <header class="site__header header">
        <div class="header__logo logo">
          <img class="logo__image" src="/assets/images/logo/logo.png" alt="Сестричество во имя благоверного царевича Димитрия">
        </div>
        <nav id="navigation" class="header__navigation navigation">
          <ul id="navigation__list" class="navigation__list">
            <li class="navigation__item">
              <a class="navigation__link" href="/worker/">Сотрудники</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="/patient/">Подопечные</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="/volunteer/">Добровольцы</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="/schedule/">График</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="/timesheet/">Табель</a>
            </li>
          </ul>
        </nav>
        <a href="/logout/" class="header__logout button button_border_light button_size_small">Выйти</a>
        <div class="header__hamburger hamburger" id="hamburger">
          <div class="hamburger__item"></div>
          <div class="hamburger__item"></div>
          <div class="hamburger__item"></div>
        </div>
      </header>
      <div class="site__content content">
