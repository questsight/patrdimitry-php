<?php site__header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title"><?php echo $workerProfile[ 'lastname' ]; ?> <?php echo $workerProfile[ 'firstname' ] ?> <?php echo $workerProfile[ 'patronymic' ]; ?></h1>
  </div>
  <div class="page__content profile">
    <section class="profile__section">
      <?php if($workerProfile[ 'photo' ]):?>
      <div class="profile__photo"><img src="<?php echo $workerProfile[ 'photo' ] ?>" alt="<?php echo $workerProfile[ 'lastname' ]; ?> <?php echo $workerProfile[ 'firstname' ] ?> <?php echo $workerProfile[ 'patronymic' ]; ?>" class="profile__image"></div>
      <?php endif; ?>
      <h2 class="profile__title">Общие сведения</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Дата рождения:</span> <?php echo $workerProfile[ 'birthday' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Возраст:</span> <?php echo age( $workerProfile[ 'birthday' ] ); ?></li>
        <li class="profile__item"><span class="profile__name">Мобильный телефон:</span> <?php echo $workerProfile[ 'mobile' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Дополнительный телефон:</span> <?php echo $workerProfile[ 'phone' ]; ?></li>
        <li class="profile__item"><span class="profile__name">E-mail:</span> <?php echo $workerProfile[ 'email' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Facebook:</span> <a href="<?php echo $workerProfile[ 'fb' ]; ?>" target="_blank"><?php echo $workerProfile[ 'fb' ]; ?></a></li>
        <li class="profile__item"><span class="profile__name">ВКонтакте:</span> <a href="<?php echo $workerProfile[ 'fb' ]; ?>" target="_blank"><?php echo $workerProfile[ 'vk' ]; ?></a></li>
        <li class="profile__item"><span class="profile__name">Адрес:</span> <?php echo $workerProfile[ 'address' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Метро:</span> <?php echo $workerProfile[ 'metro' ]; ?></li>
      </ul>
    </section>
    <section class="profile__section">
      <h2 class="profile__title">Данные кадрового учета</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Должность:</span> <?php echo $workerProfile[ 'post' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Табельный номер:</span> <?php echo $workerProfile[ 'personnel_number' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Образование:</span> <?php echo $workerProfile[ 'education' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Занимаемая ставка:</span> <?php echo $workerProfile[ 'rate' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Часовая тарифная ставка:</span> <?php echo $workerProfile[ 'hour_rate' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Режим работы:</span> <?php echo $workerProfile[ 'operating_mode' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Медицинские осмотры:</span> <?php echo $workerProfile[ 'medical_examination' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Дополнительная информация:</span> <?php echo $workerProfile[ 'comment' ]; ?></li>
      </ul>
    </section>
  <div class="page__footer">
    <div class="button-group text-center">
      <a href="#" class="button button_bg_theme button_size_small">Редактировать</a>
      <a href="/worker/<?php echo $workerProfile[ 'id' ]; ?>/delete" class="button button_bg_accent button_size_small">Удалить</a>
      <a href="/worker/" class="button button_bg_light button_size_small">Отмена</a>
    </div>
  </div>
</div>

<?php site__footer(); ?>
