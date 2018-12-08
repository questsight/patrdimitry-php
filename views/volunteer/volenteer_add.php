<?php site_header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title">Добавить добровольца в базу данных</h1>
  </div>
  <div class="page__content profile">
    <form action="" method="POST" class="form profile-form" enctype="multipart/form-data">
      <section class="profile__section">
        <div class="profile__photo"><img id="img-preview" src="default-preview.jpg" class="profile__image" style="display:none"></div>
        <h2 class="profile__title">Общие сведения</h2>
        <ul class="profile__list">
          <li class="profile__item"><span class="profile__name">Фотография:</span> <input id="photo" type="file"  accept="image/jpeg,image/png" name="photo"></li>
          <li class="profile__item"><span class="profile__name">Фамилия:</span> <input class="profile-form__input" type="text" name="lastname" maxlength="30" required></li>
          <li class="profile__item"><span class="profile__name">Имя:</span> <input class="profile-form__input" type="text" name="firstname" maxlength="30" required></li>
          <li class="profile__item"><span class="profile__name">Отчество:</span> <input class="profile-form__input" type="text" name="patronymic" maxlength="30"></li>
          <li class="profile__item"><span class="profile__name">Дата рождения:</span> <input class="profile-form__date" type="date" name="birthday"></li>
          <li class="profile__item"><span class="profile__name">Мобильный телефон:</span> <input class="profile-form__input" type="tel" name="mobile"></li>
          <li class="profile__item"><span class="profile__name">Дополнительный телефон:</span> <input class="profile-form__input" type="tel" name="phone"></li>
          <li class="profile__item"><span class="profile__name">E-mail:</span> <input class="profile-form__input" type="email" name="email" maxlength="30" required></li>
          <li class="profile__item"><span class="profile__name">Пароль:</span> <input class="profile-form__input" type="password" name="password" maxlength="20" required></li>
          <li class="profile__item"><span class="profile__name">Facebook:</span> <input class="profile-form__input" type="text" name="fb" maxlength="30"></li>
          <li class="profile__item"><span class="profile__name">ВКонтакте:</span> <input class="profile-form__input" type="text" name="vk" maxlength="30"></li>
          <li class="profile__item">
            <span class="profile__name">Образование:</span>
            <textarea class="profile-form__description" name="education" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Вид помощи:</span>
            <select class="profile-form__select" name="specialization">
              <option class="profile-form__option">Помощь в перевозках</option>
              <option class="profile-form__option">Помощь в больницах</option>
              <option class="profile-form__option">Помощь в ремонтах</option>
              <option class="profile-form__option">Другая помощь</option>
            </select>
          </li>
          <li class="profile__item">
            <span class="profile__name">Дополнительная информация:</span>
            <textarea class="profile-form__text" name="comment"></textarea>
          </li>
        </ul>
      </section>
      <div class="button-group text-center"><input type="submit" value="Добавить" class="button button_bg_theme button_size_large"></div>
    </form>
  <div class="page__footer">

  </div>
</div>

<?php site_footer(); ?>
