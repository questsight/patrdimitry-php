<?php site_header(); ?>

<div class="page">
  <div class="page__header">
    <h1 class="page__title"><?php echo $volunteerProfile[ 'lastname' ]; ?> <?php echo $volunteerProfile[ 'firstname' ] ?> <?php echo $volunteerProfile[ 'patronymic' ]; ?></h1>
  </div>
  <div class="page__content profile">
    <section class="profile__section">
      <?php if($volunteerProfile[ 'photo' ]):?>
      <div class="profile__photo"><img src="<?php echo $volunteerProfile[ 'photo' ] ?>" alt="<?php echo $volunteerProfile[ 'lastname' ]; ?> <?php echo $volunteerProfile[ 'firstname' ] ?> <?php echo $volunteerProfile[ 'patronymic' ]; ?>" class="profile__image"></div>
      <?php endif; ?>
      <h2 class="profile__title">Общие сведения</h2>
      <ul class="profile__list">
        <li class="profile__item"><span class="profile__name">Дата рождения:</span> <?php echo $volunteerProfile[ 'birthday' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Возраст:</span> <?php echo age( $volunteerProfile[ 'birthday' ] ); ?></li>
        <li class="profile__item"><span class="profile__name">Мобильный телефон:</span> <?php echo $volunteerProfile[ 'mobile' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Дополнительный телефон:</span> <?php echo $volunteerProfile[ 'phone' ]; ?></li>
        <li class="profile__item"><span class="profile__name">E-mail:</span> <?php echo $volunteerProfile[ 'email' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Facebook:</span> <a href="<?php echo $volunteerProfile[ 'fb' ]; ?>" target="_blank"><?php echo $volunteerProfile[ 'fb' ]; ?></a></li>
        <li class="profile__item"><span class="profile__name">ВКонтакте:</span> <a href="<?php echo $volunteerProfile[ 'fb' ]; ?>" target="_blank"><?php echo $volunteerProfile[ 'vk' ]; ?></a></li>
        <li class="profile__item"><span class="profile__name">Образование:</span> <?php echo $volunteerProfile[ 'education' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Вид помощи:</span> <?php echo $volunteerProfile[ 'specialization' ]; ?></li>
        <li class="profile__item"><span class="profile__name">Дополнительная информация:</span> <?php echo $volunteerProfile[ 'comment' ]; ?></li>
      </ul>
    </section>
  <div class="page__footer">
    <div class="button-group text-center">
      <a href="/volunteer/<?php echo $volunteerProfile[ 'id' ] ?>/edit" class="button button_bg_theme button_size_small">Редактировать</a>
      <a href="/volunteer/<?php echo $volunteerProfile[ 'id' ] ?>/delete" class="button button_bg_accent button_size_small">Удалить</a>
      <a href="/volunteer/" class="button button_bg_light button_size_small">Отмена</a>
    </div>
  </div>
</div>

<?php site_footer(); ?>
