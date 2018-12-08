<?php site_header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title"><?php echo $patientProfile[ 'lastname' ]; ?> <?php echo $patientProfile[ 'firstname' ] ?> <?php echo $patientProfile[ 'patronymic' ]; ?></h1>
  </div>
  <div class="page__content profile">
    <section class="profile__section">
      <?php if($patientProfile[ 'photo' ]):?>
      <div class="profile__photo"><img src="<?php echo $patientProfile[ 'photo' ] ?>" alt="<?php echo $patientProfile[ 'lastname' ]; ?> <?php echo $patientProfile[ 'firstname' ] ?> <?php echo $patientProfile[ 'patronymic' ]; ?>" class="profile__image"></div>
      <?php endif; ?>
      <h2 class="profile__title">Общие сведения</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Дата рождения:</span> <?php echo $patientProfile[ 'birthday' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Возраст:</span> <?php echo age( $patientProfile[ 'birthday' ] ); ?></li>
        <li class="profile__item"><span class="profile__name">Краткая история:</span> <?php echo $patientProfile[ 'description' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Мобильный телефон:</span> <?php echo $patientProfile[ 'mobile' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Дополнительный телефон:</span> <?php echo $patientProfile[ 'phone' ]; ?></li>
        <li class="profile__item"><span class="profile__name">E-mail:</span> <?php echo $patientProfile[ 'email' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Facebook:</span> <a href="<?php echo $patientProfile[ 'fb' ]; ?>" target="_blank"><?php echo $patientProfile[ 'fb' ]; ?></a></li>
        <li class="profile__item"><span class="profile__name">ВКонтакте:</span> <a href="<?php echo $patientProfile[ 'fb' ]; ?>" target="_blank"><?php echo $patientProfile[ 'vk' ]; ?></a></li>
        <li class="profile__item"><span class="profile__name">Адрес:</span> <?php echo $patientProfile[ 'address' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Метро:</span> <?php echo $patientProfile[ 'metro' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Контактное лицо:</span> <?php echo $patientProfile[ 'contact_person' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Старшая сестра поста:</span> <?php echo $patientProfile[ 'head_nurse' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Начало ухода:</span> <?php echo $patientProfile[ 'core_begin' ]; ?></li>
        <li class="profile__item">
          <span class="profile__name">Окончание ухода:</span>
          <?php
          if ( $patientProfile[ 'core_end' ] != "0000-00-00" ) {
            echo $patientProfile[ 'core_end' ];
          } else {
            echo 'По настоящее время';
          }
          ?>
        </li>
        <li class="profile__item"><span class="profile__name">Дополнительная информация:</span> <?php echo $patientProfile[ 'comment' ]; ?></li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Медицинская карта</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Диагноз:</span><?php echo $patientProfile[ 'diagnosis' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Тяжесть ухода:</span><?php echo $patientProfile[ 'difficulty_care' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Сопутствующие заболевания:</span><?php echo $patientProfile[ 'concomitant_disease' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Описание состояния:</span><?php echo $patientProfile[ 'situation' ]; ?></li>
        <li class="profile__item"><span class="profile__name">План ухода:</span> </li>
        <li class="profile__item"><span class="profile__name">Рекомендации врача:</span><?php echo $patientProfile[ 'recommendation' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Выписки:</span> </li>
        <li class="profile__item"><span class="profile__name">Дополнительная информация:</span><?php echo $patientProfile[ 'medical_comment' ]; ?></li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Посещения врача</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Отчеты о посещениях:</span> </li>
        <li class="profile__item"><span class="profile__name">Рекомендации врача:</span><?php echo $patientProfile[ 'doctor_recommendation' ]; ?></li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Посещения старшей сестры</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Анкета первого визита:</span> </li>
        <li class="profile__item"><span class="profile__name">Отчеты о посещениях:</span> </li>
        <li class="profile__item"><span class="profile__name">Календарь посещений:</span> </li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Посещения социального работника</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Потребность в средствах ухода:</span><?php echo $patientProfile[ 'need_products' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Потребность в лекарственных препаратах и лечебном питании:</span><?php echo $patientProfile[ 'need_medicament' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Прочие потребности:</span><?php echo $patientProfile[ 'need_etc' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Индивидуальная программа предоставления социальных услуг (ИППСУ):</span> </li>
        <li class="profile__item"><span class="profile__name">Отчеты сестры по социальной работе:</span> </li>
        <li class="profile__item"><span class="profile__name">Календарь посещений:</span> </li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Объем помощи</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Объем ухода наших сестер:</span><?php 
          if($patientProfile[ 'hours_nurse' ] > 0)
          {echo $patientProfile[ 'hours_nurse' ] . " часов в месяц";} ?></li>
        <li class="profile__item"><span class="profile__name">Объем ухода, предоставлямый привлеченными организациями:</span><?php
          if($patientProfile[ 'hours_organizations' ] > 0){echo $patientProfile[ 'hours_organizations' ] . " часов в месяц";} ?></li>
        <li class="profile__item"><span class="profile__name">Общий объем ухода:</span>
        <?php
          $hours_result = $patientProfile[ 'hours_nurse' ] + $patientProfile[ 'hours_organizations' ];
          if($hours_result > 0){echo $hours_result . " часов в месяц";} ?>
        </li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Стоимость ухода</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Стоимость ухода в месяц:</span>
        <?php
          $cost = $patientProfile[ 'hours_nurse' ] * 250 + $patientProfile[ 'cost_organizations' ];
          if($cost > 0){echo $cost . " руб/мес";} ?>
        </li>
        <li class="profile__item"><span class="profile__name">Размер компенсации со стороны подопечного:</span><?php echo $patientProfile[ 'compensations_ward' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Другие компенсации:</span><?php echo $patientProfile[ 'compensations_etc' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Затраты Сестричества:</span>
        <?php
          $expenses = $cost - $patientProfile[ 'compensations_ward' ] - $patientProfile[ 'compensations_etc' ];
          if($expenses > 0){echo $expenses . " руб/мес";} ?>
        </li>
      </ul>
    </section>
  <div class="page__footer">
    <div class="button-group text-center">
      <a href="#" class="button button_bg_theme button_size_small">Редактировать</a>
      <a href="/patient/<?php echo $patientProfile[ 'id' ] ?>/delete" class="button button_bg_accent button_size_small">Удалить</a>
      <a href="/patient/" class="button button_bg_light button_size_small">Отмена</a>
    </div>
  </div>
</div>

<?php site_footer(); ?>
