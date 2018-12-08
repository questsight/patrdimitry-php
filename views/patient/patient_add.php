<?php site_header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title">Добавить подопечного</h1>
  </div>
  <div class="page__content profile">
    <form action="" method="POST" class="form profile-form" enctype="multipart/form-data" >
      <section class="profile__section">
        <div class="profile__photo"><img id="img-preview" src="default-preview.jpg" class="profile__image" style="display:none"></div>
        <h2 class="profile__title">Общие сведения</h2>
        <ul class="profile__list">
          <li class="profile__item"><span class="profile__name">Фотография:</span> <input id="photo" type="file"  accept="image/jpeg,image/png" name="photo"></li>
          <li class="profile__item"><span class="profile__name">Фамилия:</span> <input class="profile-form__input" type="text" maxlength="30" name="lastname" required></li>
          <li class="profile__item"><span class="profile__name">Имя:</span> <input class="profile-form__input" type="text" name="firstname" maxlength="30" required></li>
          <li class="profile__item"><span class="profile__name">Отчество:</span> <input class="profile-form__input" type="text" name="patronymic" maxlength="30" required></li>
          <li class="profile__item"><span class="profile__name">Дата рождения:</span> <input class="profile-form__date" type="date" name="birthday"></li>
          <li class="profile__item">
            <span class="profile__name">Краткая история:</span>
            <textarea class="profile-form__description" name="description" maxlength="255"></textarea>
          </li>
          <li class="profile__item"><span class="profile__name">Мобильный телефон:</span> <input class="profile-form__input" type="tel" name="mobile"></li>
          <li class="profile__item"><span class="profile__name">Дополнительный телефон:</span> <input class="profile-form__input" type="tel" name="phone"></li>
          <li class="profile__item"><span class="profile__name">E-mail:</span> <input class="profile-form__input" type="email" name="email" maxlength="30"></li>
          <li class="profile__item"><span class="profile__name">Facebook:</span> <input class="profile-form__input" type="text" name="fb" maxlength="30"></li>
          <li class="profile__item"><span class="profile__name">ВКонтакте:</span> <input class="profile-form__input" type="text" name="vk" maxlength="30"></li>
          <li class="profile__item">
            <span class="profile__name">Адрес:</span>
            <textarea class="profile-form__description" name="address" maxlength="255"></textarea>
          </li>
          <li class="profile__item"><span class="profile__name">Метро:</span> <input class="profile-form__input" type="text" name="metro" maxlength="30"></li>
          <li class="profile__item"><span class="profile__name">Контактное лицо:</span> <input class="profile-form__input" type="text" name="contact_person" maxlength="90"></li>
          <li class="profile__item"><span class="profile__name">Старшая сестра поста:</span> <input class="profile-form__input" type="text" name="head_nurse" maxlength="90"></li>
          <li class="profile__item"><span class="profile__name">Начало ухода:</span> <input class="profile-form__date" type="date" name="core_begin"></li>
          <li class="profile__item"><span class="profile__name">Окончание ухода:</span> <input class="profile-form__date" type="date" name="core_end"></li>
          <li class="profile__item">
            <span class="profile__name">Дополнительная информация:</span>
            <textarea class="profile-form__description" name="comment" maxlength="255"></textarea>
          </li>
        </ul>
      </section>
      <section class="profile__section">
        <h2 class="profile__title">Медицинская карта</h2>
        <ul class="profile__list">
          <li class="profile__item"><span class="profile__name">Диагноз:</span> <input class="profile-form__input" type="text" name="diagnosis" maxlength="90"></li>
          <li class="profile__item"><span class="profile__name">Тяжесть ухода</span> <input class="profile-form__input" type="text" name="difficulty_care" maxlength="30"></li>
          <li class="profile__item">
            <span class="profile__name">Сопутствующие заболевания:</span>
            <textarea class="profile-form__description" name="concomitant_disease" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Описание состояния:</span>
            <textarea class="profile-form__description" name="situation" maxlength="255"></textarea>
          </li>
          <!--<li class="profile__item">
            <span class="profile__name">План ухода:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>-->
          <li class="profile__item">
            <span class="profile__name">Рекомендации врача:</span>
            <textarea class="profile-form__description" name="recommendation" maxlength="255"></textarea>
          </li>
          <!--<li class="profile__item">
            <span class="profile__name">Выписки:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>-->
          <li class="profile__item">
            <span class="profile__name">Дополнительная информация:</span>
            <textarea class="profile-form__description" name="medical_comment" maxlength="255"></textarea>
          </li>
        </ul>
      </section>
      <section class="profile__section">
        <h2 class="profile__title">Посещения врача</h2>
        <ul class="profile__list">
          <!--<li class="profile__item">
            <span class="profile__name">Отчеты о посещениях:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>-->
          <li class="profile__item">
            <span class="profile__name">Рекомендации врача:</span>
            <textarea class="profile-form__description" name="doctor_recommendation" maxlength="255"></textarea>
          </li>
        </ul>
      </section>
      <!--<section class="profile__section">
        <h2 class="profile__title">Посещения старшей сестры</h2>
        <ul class="profile__list">
          <li class="profile__item">
            <span class="profile__name">Анкета первого визита:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Отчеты о посещениях:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Календарь посещений:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>
        </ul>
      </section>-->
      <section class="profile__section">
        <h2 class="profile__title">Посещения социального работника</h2>
        <ul class="profile__list">
          <li class="profile__item">
            <span class="profile__name">Потребность в средствах ухода:</span>
            <textarea class="profile-form__description" name="need_products" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Потребность в лекарственных препаратах и лечебном питании:</span>
            <textarea class="profile-form__description" name="need_medicament" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Прочие потребности:</span>
            <textarea class="profile-form__description" name="need_etc" maxlength="255"></textarea>
          </li>
          <!--<li class="profile__item">
            <span class="profile__name">Индивидуальная программа предоставления социальных услуг (ИППСУ):</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Отчеты сестры по социальной работе:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>
          <li class="profile__item">
            <span class="profile__name">Календарь посещений:</span>
            <textarea class="profile-form__description" name="" maxlength="255"></textarea>
          </li>-->
        </ul>
      </section>
      <section class="profile__section">
        <h2 class="profile__title">Объем помощи</h2>
        <ul class="profile__list">
          <li class="profile__item"><span class="profile__name">Объем ухода наших сестер(часов в месяц):</span> <input class="profile-form__input" type="float" name="hours_nurse" maxlength="5"></li>
          <li class="profile__item"><span class="profile__name">Объем ухода, предоставлямый привлеченными организациями(часов в месяц):</span> <input class="profile-form__input" type="float" name="hours_organizations" maxlength="5"></li>
        </ul>
      </section>
      <section class="profile__section">
        <h2 class="profile__title">Стоимость ухода</h2>
        <ul class="profile__list">
          <li class="profile__item"><span class="profile__name">Расходны на привлеченные организации:</span> <input class="profile-form__input" type="float" name="cost_organizations" maxlength="5"></li>
          <li class="profile__item"><span class="profile__name">Размер компенсации со стороны подопечного:</span> <input class="profile-form__input" type="float" name="compensations_ward" maxlength="5"></li>
          <li class="profile__item"><span class="profile__name">Другие компенсации:</span> <input class="profile-form__input" type="float" name="compensations_etc" maxlength="5"></li>
        </ul>
      </section>
      <div class="button-group text-center"><input type="submit" value="Добавить" class="button button_bg_theme button_size_large"></div>
    </form>
  <div class="page__footer">

  </div>
</div>

<?php site_footer(); ?>

